<?php
include 'assets/connection/connect.php';
echo $trans = $_GET['trans_id'],"<br>";

$sql = "SELECT * from item_borrow WHERE status = 'return_pending' AND transaction ='$trans'";

$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);

if($row['status'] == 'return_pending' && $row['transaction'] == $trans){

$sql = "UPDATE item_borrow SET status='borrowed' WHERE transaction = '$trans'  and not status = 'checking'";

if ($conn->query($sql) === TRUE) {
    header("location:return_item.php");
} else {
  echo "Error updating record: " . $conn->error;
}
}
?>