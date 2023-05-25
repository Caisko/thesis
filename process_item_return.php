<?php
include 'assets/connection/connect.php';
echo $trans = $_GET['trans_id'],"<br>";
echo $item = $_GET['item_id'];


$sql = "UPDATE item_borrow SET status='checking' WHERE qr_id_cvsu = '$item' and transaction = '$trans'";

if ($conn->query($sql) === TRUE) {
    header("location:return_item.php");
} else {
  echo "Error updating record: " . $conn->error;
}
?>