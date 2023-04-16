<?php 
include 'assets/connection/connect.php';
$eto = $_GET["id"];
   $checking = "SELECT gatepass.id,unit_number.id as unitid, unit_number.unit_num_serial as serial_num, unit_number.quantity as quan, unit_number.description as description,gatepass.gatepass_id as gate_id  FROM gatepass INNER JOIN unit_number ON gatepass.id = unit_number.user_id where unit_number.id = '$eto'";
$result = mysqli_query($conn, $checking);
$row = mysqli_fetch_assoc($result);
$gated=  $row["gate_id"];
$sql = "DELETE FROM unit_number WHERE `id` = $eto";

if ($conn->query($sql) === TRUE) {
    header("location:item.php?check=$gated");
} else {
  echo "Error deleting record: " . $conn->error;
}

?>