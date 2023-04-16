<?php
include 'assets/connection/connect.php';
if(isset($_POST["submit"])){

 $id = $_POST["id"];
  $error = $_POST["error"];
 $check = $_POST["check"];

$status = "SELECT * FROM gatepass where `gatepass_id` = '$id' || `gatepass_id` = '$error' || `gatepass_id` = '$check'";
$result = mysqli_query($conn, $status);
$row = mysqli_fetch_assoc($result);

echo $eto = $row["id"];

  $sql = "DELETE FROM unit_number WHERE user_id = '$eto' ";
  if ($conn->query($sql) === TRUE) {
    $sql = "DELETE  FROM gatepass WHERE id = '$eto' ";
    if ($conn->query($sql) === TRUE) {
      header("Location: gadget.php");
    }else {
      echo "Error deleting record: " . $conn->error;
    }
  } else {
    echo "Error deleting record: " . $conn->error;
  }
 
}
?>
