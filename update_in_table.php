<?php
include 'assets/connection/connect.php';
session_start();
// sql to delete a record

ECHO $name = $_GET['name']; // palitan ng POST
ECHO $label = $_GET['label']; // palitan ng 
echo $ced = $_GET['ced'];
$status = "SELECT * FROM `borrowers` WHERE id_num = '$label'";
//Query execution
$result = mysqli_query($conn, $status);
$row = mysqli_fetch_assoc($result);
if ($result->num_rows > 0) {
 
  if ($row["id_num"] == $label) {
  echo $id= $row['id'];
  
  } else {
   
  }
}

$sql = "SELECT i.transaction as transaction, i.qr_id_cvsu as qr_id, ce.quantity as cequan, ce.id as id, SUM(i.quantity) as iquan, i.status as status FROM `item_borrow` AS i JOIN cvsu_equipment as ce ON i.qr_id_cvsu = ce.id WHERE ce.id = '$ced' and i.status != 'return'  GROUP BY i.qr_id_cvsu;";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);  
$ced = $row['ce_id'];
$success = "Item Successfully Added";
$error = "This item not added";
if($row['quan'] < $row['quantity']){
  $sql = "UPDATE `item_borrow` SET `quantity` = `quantity` + 1 WHERE  transaction = ''";
  if ($conn->query($sql) === TRUE) {
     header("Location: borrow_qr.php?name=$name&label=$label&success=$success");
  } else {
    echo "Error updating record: " . $conn->error;
  }
}else{
    header("Location: borrow_qr.php?name=$name&label=$label&error=$error");
  
}

?>