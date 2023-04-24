<?php
session_start();
include 'assets/connection/connect.php';
if(isset($_POST['submit'])){
    $status = "SELECT max(id) as identify FROM borrowers where `veri_status` = 'not'";
    $result = mysqli_query($conn, $status);
    $row    = mysqli_fetch_assoc($result);
    $last = $row['identify'];
  $sql = "UPDATE borrowers SET `veri_status`='verified' WHERE `id`='$last'";

    if ($conn->query($sql) === TRUE) {
     header("location: dashboard.php");
    } else {
      echo "Error updating record: " . $conn->error;
    }
}
?>