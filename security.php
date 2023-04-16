<?php
session_start();
include 'assets/connection/connect.php';
if(isset($_POST["submit"])){
$uname = $_POST["uname"];
$pass1 = $_POST["pass1"];
$hash1 = password_hash($pass1, PASSWORD_DEFAULT);
$pass2  = $_POST["pass2"];
$login = "SELECT * FROM admins where id_number = '".$uname."'";
$result = mysqli_query($conn,$login);
$row = mysqli_fetch_assoc($result);
if( $pass1 === $pass2){
    $sql = "UPDATE admins SET password_sec = '$hash1' WHERE id_number = '".$uname."'";

            if ($conn->query($sql) === TRUE) {
                header("Location: profile_con.php");
            } else {
            echo "Error updating record: " . $conn->error;
            }
            
}else{
    header("Location: create_password.php?error=password not match");
}	
}
?>