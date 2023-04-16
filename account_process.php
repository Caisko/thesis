<?php
include 'assets/connection/connect.php';

if(isset($_POST["submit"])){
 echo  $id_number = $_POST["id_number"];
   $fname = $_POST["fname"];
   $priority = $_POST["priority"];
   $mname = $_POST["mname"];
   $lname = $_POST["lname"];
   $address = $_POST["address"] = null;
   $gender = $_POST["gender"];
   $birthdate = $_POST["birthdate"] = null;
   $phone = $_POST["phone"] = null;
   $email = $_POST["email"] = null;
   $link = $_POST["link"]= null;
   $profilemale = "male.png";
   $profilefemale = "female.png";
   $status = "Inactive";
 $password = NULL;
   $login = "SELECT * FROM admins WHERE id_number = '$id_number'; ";
   $result = mysqli_query($conn,$login);
   $row = mysqli_fetch_assoc($result);

   if ($row["id_number"] != $id_number) {
    $pri = "SELECT position, COUNT(position) as count FROM admins WHERE position IN ('Priority 2', 'Priority 3', 'Priority 4', 'Priority 5') AND position = '$priority' GROUP BY position; ";
    $result = mysqli_query($conn,$pri);
    $row = mysqli_fetch_assoc($result);
        if ($row["position"] == "Priority 3" || $row["position"] == "Priority 2" || $row["position"] == "Priority 4" || $row["position"] == "Priority 5") {

            header("Location: account.php?error=The position is limited to one account. However, you can add security to multiple accounts.");
        }else {
            if ($gender == "Male") {
                $sql = "INSERT INTO admins (id_number,password_sec, given_name, middle_name,surname,gender,birthdate,`address`,email,phone_number,link_fb,profile_pic,admin_status,position)
            VALUES ('$id_number','$password','$fname', '$mname','$lname','$gender','$birthdate','$address','$email','$phone','$link','$profilemale','$status','$priority')";
                if ($conn->query($sql) === TRUE) {
                    header("Location: account.php?check=Successfully Added");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else if ($gender == "Female") {
                $sql = "INSERT INTO admins (id_number, password_sec,given_name, middle_name,surname,gender,birthdate,`address`,email,phone_number,link_fb,profile_pic,admin_status,position)
        VALUES ('$id_number', '$password','$fname', '$mname','$lname','$gender','$birthdate','$address','$email','$phone','$link','$profilefemale','$status','$priority')";
                if ($conn->query($sql) === TRUE) {
                    header("Location: account.php?check=Successfully Added");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
    }
} else {
    header("Location: account.php?error=Data has been Existed");

}

 
    
    
}
?>