<?php
include 'assets/connection/connect.php';
session_start();
// sql to delete a record
$id = $_GET['id']; // palitan ng POST
$name = $_GET['name']; // palitan ng POST
$label = $_GET['label']; // palitan ng POST
$sql = "DELETE FROM `item_borrow` WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
 header("location:borrow_qr.php?name=$name&label=$label");
} else {
 
}

$conn->close();

?>
