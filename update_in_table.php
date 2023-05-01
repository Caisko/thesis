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

$sql = "SELECT i.qr_id_cvsu ,count(i.quantity) as quan, ce.id as ce_id,ce.serial as serial , ce.item_name as name1, ce.description as desc1,ce.quantity as quantity FROM item_borrow as i  JOIN cvsu_equipment as ce ON ce.id = i.qr_id_cvsu where ce.id = '$ced'";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);  
$ced = $row['ce_id'];
$success = "Item Successfully Added";
$error = "This item not added";
if($row['quan'] < $row['quantity'] && empty($row['serial'])){
    $sql = "INSERT INTO `item_borrow`( `borrower_id_num`, `qr_id_cvsu`,`quantity`) 
    VALUES ('$id','$ced','1')";
      if ($conn->query($sql) === TRUE) { 
        header("Location: borrow_qr.php?name=$name&label=$label&success=$success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
    header("Location: borrow_qr.php?name=$name&label=$label&error=$error");
  
}

?>