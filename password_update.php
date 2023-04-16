<?php 
include 'assets/connection/connect.php';
 $id = $_POST['idnum'];
$pass = $_POST['password'];
$newpass = $_POST['newpassword'];
$checkpass = $_POST['renewpassword'];


$status = "SELECT * FROM admins where id_number = '" . $id . "'";
$result = mysqli_query($conn, $status);
$row    = mysqli_fetch_assoc($result);
echo  $verify = $row["password_sec"], "<br>";

if (password_verify($pass,$verify) == 1) {
    if($newpass == $checkpass){
       $hash1 = password_hash($newpass, PASSWORD_DEFAULT);
$sql = "UPDATE `admins` SET `password_sec` = '$hash1' where `id_number` = '$id' ";
    echo password_verify($row["password_sec"], $pass);
if ($conn->query($sql) === TRUE) {
    
    header("location:profile.php?pass=pass");
    exit;
} else {
    $conn->close();
}

    }else{
        header("location:profile.php?pass=not");
    }
} else {
    //none of the input fields have changed, so display an alert message
    header("location:profile.php?pass=failed");
}
?>