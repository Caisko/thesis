<?php
include 'assets/connection/connect.php';

echo $id = $_POST['id'];
echo $reason = $_POST['reason'];
echo $user_id = $_POST['user_id'];
$status = 'declined';
$sql = "UPDATE gatepass SET `comment` = '$reason' , `gatepass_status` = 'request',`transaction` = '$status',`fk_admins` = '$user_id' WHERE id = '$id'";
$conn->query($sql);

if ($conn->query($sql) === TRUE) {
    header("location:movein.php");

} else {
    echo "Error updating record: " . $conn->error;
}

?>
