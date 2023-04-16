<?php
include 'assets/connection/connect.php';
if(isset($_POST["submit"])){
echo $id = $_POST["id"];
echo $admin = $_POST["admin"];
$approve = "SELECT * FROM gatepass where id ='$id'";
$result = mysqli_query($conn, $approve);
$row    = mysqli_fetch_assoc($result);
if($row["id"] == $id){
   
    $sql = " UPDATE `gatepass` SET `transaction`='pending' , `gatepass_status` = 'transaction 1', `comment` = NULL,`fk_admins` = '$admin'  WHERE id = '$id'";
if ($conn->query($sql) === TRUE) {
  
    // Handle the request decline
    header("location:dashboard.php");
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}
}
?>
