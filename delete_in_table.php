<?php
include 'assets/connection/connect.php';
session_start();
// sql to delete a record
$id = $_GET['id']; // palitan ng POST
$name = $_GET['name']; // palitan ng POST
$label = $_GET['label']; // palitan ng POST
$ced = $_GET['ced'];
$status = "SELECT * FROM borrowers where id_num = '$label'";
$result = mysqli_query($conn, $status);
$row = mysqli_fetch_assoc($result);
$id_borrower = $row['id'];

$sql = "DELETE FROM `item_borrow` WHERE id = '$id' OR qr_id_cvsu = '$ced' AND borrower_id_num = '$id_borrower' and transaction = '' ";

if ($conn->query($sql) === TRUE) {
 header("location:borrow_qr.php?name=$name&label=$label");
} else {
 
}

$conn->close();

?>
