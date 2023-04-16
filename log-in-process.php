<?php
session_start();
include 'assets/connection/connect.php';
if(isset($_POST['login'])){
        $_SESSION["uname"] = $_POST["username"];
      echo $newname = $_SESSION["uname"] ,"<br>";
       echo $_SESSION["password"]  = $_POST["password1"],"<br>";
        $login = "SELECT * FROM `admins` WHERE id_number = '".$newname."'";
        $result = mysqli_query($conn,$login);
        $row = mysqli_fetch_assoc($result);
       echo $pass = $row["password_sec"],"<br>";
       echo $row["id_number"],"<br>";
       if( $row["id_number"] == $newname && password_verify($_SESSION["password"],$pass) == 1){
        $_SESSION['logged_in'] = true;
        header("Location: dashboard.php");
        echo "log in success";
        
        }else if($row["id_number"] == $newname && $row["password_sec"] == null ){
        header("Location: create_password.php");
        echo "log in pass";
        die;
        }else{
        header("Location: index.php?error=Invalid Username and Password");
        echo "not log in 0";
        die;
        }
}
?>