<?php
include 'assets/connection/connect.php'; 

$status = "SELECT transaction FROM item_borrow WHERE status = 'pending'";
$result = mysqli_query($conn, $status);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo $row['transaction'] . ",";
  }
} else {
  echo "none";
}
?>
