<?php
include 'assets/connection/connect.php';
$label = $_GET['label'];
$name = $_GET['name'];
$session = $_GET['session'] ;
$img = $_GET['img'];

echo "<img src='".$img."'>";

$sql = "UPDATE borrowers SET borrower_img='$img' WHERE id_num = '$label'";

if ($conn->query($sql) === TRUE) {
  header("location:borrow_qr.php?label=$label&name=$name&session=$session");
} else {
  echo "Error updating record: " . $conn->error;
}


?>