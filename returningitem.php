<?php 
include 'assets/connection/connect.php';
$_GET['name'];
$label = $_GET['label'];
$sql = "SELECT * FROM borrowers where `id_num` = '$label'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];

$sql = "SELECT * FROM item_borrow where `borrower_id_num` = '$id' and `status` = 'borrowed'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($id == $row['borrower_id_num']){
    
$sql = "UPDATE item_borrow SET `status` = 'return_pending' WHERE `borrower_id_num` = '$id' and `status` = 'borrowed'";

if ($conn->query($sql) === TRUE) {
  //echo "Record updated successfully";
  header("location: modal_update.php");
} else {
  echo "Error updating record: " . $conn->error;
}
}else{
    header("location: no_update.php");
}
?>