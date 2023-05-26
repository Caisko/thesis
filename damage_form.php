<?php
include 'assets/connection/connect.php';
if(isset($_POST['submit'])){
  echo  $qr = $_POST['qr_id_in'];
  echo  $quantity = $_POST['quantity'];

    $sql = "UPDATE cvsu_equipment SET damage = '$quantity' WHERE qr_id = '$qr'";

    if ($conn->query($sql) === TRUE) {
     header("Location:inventory.php");
     echo "<script>alert('SUCCESSFULY UPDATED');</script>";
    } else {
      echo "Error updating record: " . $conn->error;
    }
}
?>