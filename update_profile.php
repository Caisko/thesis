<?php 
include 'assets/connection/connect.php';
echo $id = $_POST['idnum'];
echo $firstName = $_POST['fname'];
echo $middleName = $_POST['mname'];
echo $lastName = $_POST['lname'];
echo $gender = $_POST['gender'];
echo $birthdate = $_POST['bday'];
echo $address = $_POST['address'];
echo $phoneNumber = $_POST['phone'];
echo $email = $_POST['email'];
echo $fb = $_POST['fb'];
$status = "SELECT * FROM admins where id_number = '" . $id . "'";
$result = mysqli_query($conn, $status);
$row    = mysqli_fetch_assoc($result);
if (!empty($_FILES["sig"]["name"]) 
   
  ) {
              $file = $_FILES["sig"];
              $filename = $file["name"];
              $filetempname = $file["tmp_name"];
              $filesize = $file["size"];
              $fileerror = $file["error"];
              $filetype = $file["type"];
              $fileext = explode('.', $filename);
              $fileactual = strtolower(end($fileext));

              $allowed = array('image/jpg', 'image/jpeg', 'image/png');

              if (in_array($filetype, $allowed)) {
                  if ($fileerror === 0) {
                      if ($filesize < 1000000000) {
                          $filenamenew = uniqid('', true) . "." . $fileactual;
                          $folder = "./assets/img/sign/" . $filenamenew;
                          move_uploaded_file($filetempname, $folder);

                      $sql = "UPDATE `admins` SET `sign` = '$filenamenew',`surname`='$lastName',`given_name`='$firstName',`middle_name`='$middleName',
                      `address`='$address',`gender`='$gender',`birthdate`='$birthdate',`phone_number`='$phoneNumber',
                      `email`='$email',`link_fb`='$fb' where `id_number` = '$id'";

                      if ($conn->query($sql) === TRUE) {
                          header("location:profile.php?pop=update");
                          exit;
                      } else {
                        echo "Error updating record: " . $conn->error;
                      }

                      } else {
                        header("location:profile.php?error=File Too Large");
                      }
                      } else {
                      header("location:profile.php?error=File Error");
                      }
                      } else {
                      header("location:profile.php?error=File Format Error");
                      }

          }else {
              // none of the input fields have changed, so display an alert message
              header("location:profile.php?pop=failed");
            
            }
 
   
if(empty($_FILES["sig"]["name"]) || empty($_FILES["prof"]["name"]) && $row["given_name"] !== $_POST["fname"] ||
$row["middle_name"] !== $_POST["mname"] ||
$row["surname"] !== $_POST["lname"] ||
$row["gender"] !== $_POST["gender"] ||
$row["birthdate"] !== $_POST["bday"] ||
$row["address"] !== $_POST["address"] ||
$row["phone_number"] !== $_POST["phone"] ||
$row["email"] !== $_POST["email"]){
  
$sql = "UPDATE `admins` SET `surname`='$lastName',`given_name`='$firstName',`middle_name`='$middleName',
`address`='$address',`gender`='$gender',`birthdate`='$birthdate',`phone_number`='$phoneNumber',
`email`='$email',`link_fb`='$fb' where `id_number` = '$id'";

if ($conn->query($sql) === TRUE) {
    header("location:profile.php?pop=update");
    exit;
} else {
  echo "Error updating record: " . $conn->error;
}
}else {
  // none of the input fields have changed, so display an alert message
  header("location:profile.php?pop=failed");

}
?>