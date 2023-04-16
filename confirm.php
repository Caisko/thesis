<?php
session_start();
include 'assets/connection/connect.php';

if(isset($_POST["submit"])){
   $uname =  $_POST["uname"];
   $fname =  $_POST["fname"];
   $mname = $_POST["mname"];
   $lname = $_POST["lname"];
   $age = $_POST["age"];
    $gender = $_POST["gender"];
    $block = $_POST["address"];

    $bday = $_POST["date"];
    $cp = $_POST["phone"];
    $email = $_POST["email"];
    $fb = $_POST["fblink"];
    
    $status = "Active";
    
    // Profile picture upload
    $file = $_FILES["profile_pic"];
    $filename =  $file["name"];
    $filetempname = $file["tmp_name"];
    $filesize = $file["size"];
    $fileerror = $file["error"];
    $filetype = $file["type"];
    $fileext = explode('.',$filename);
    $fileactual = strtolower(end($fileext));

    $allowed = array('image/jpg', 'image/jpeg', 'image/png');

    if(in_array($filetype, $allowed)){
        if($fileerror === 0){
            if ($filesize < 1000000000) {
                $filenamenew = uniqid('',true).".".$fileactual;
                $folder = "./assets/img/profile/" .$filenamenew;
                move_uploaded_file($filetempname,$folder);
                
                // Signature upload
                $file_sign = $_FILES["signature"];
                $filename_sign =  $file_sign["name"];
                $filetempname_sign = $file_sign["tmp_name"];
                $filesize_sign = $file_sign["size"];
                $fileerror_sign = $file_sign["error"];
                $filetype_sign = $file_sign["type"];
                $fileext_sign = explode('.',$filename_sign);
                $fileactual_sign = strtolower(end($fileext_sign));

                $allowed_sign = array('image/png');
                if(in_array($filetype_sign, $allowed_sign)){
                    if($fileerror_sign === 0){
                        if ($filesize_sign < 1000000000) {       
                            $sign = uniqid('',true).".".$fileactual_sign;
                            $folder_sign = "./assets/img/sign/" .$sign;
                            move_uploaded_file($filetempname_sign,$folder_sign);

                    $sql = "UPDATE admins SET profile_pic = '$filenamenew',`sign` = '$sign',given_name='$fname',middle_name ='$mname'
                    ,surname='$lname',gender = '$gender', `address`='$block',phone_number = '$cp'
                    ,email = '$email',link_fb = '$fb', admin_status = '$status',birthdate =  '$bday'
                     where id_number = '$uname';";      
                             if (mysqli_query($conn, $sql)) {
                                        header("location:index.php");
                                 } else {
                                    echo "Error updating record: " . mysqli_error($conn);
                                 }
                        } else {
                            header("location:profile_con.php?error=Signature File Too Large");
                        }
                    
                                } else {
                        header("location:profile_con.php?error=Signature File Error");
                        }
                } else {
                    header("location:profile_con.php?error=Signature File Format Error");
                }
                
                                }else{
                    header("location:profile_con.php?error=File Too Large");
                }
            
            
            }else{
                header("location:profile_con.php?error=File Error");
            }

        

        }else{
         
            header("location:profile_con.php?error=File Format Error");
        }
      
   
   }

?>
