<?php 
include 'assets/connection/connect.php';

// Search box value assigning to $trans_id and $item variables.
echo "<br>", $trans_id = isset($_REQUEST['trans']) ? $_REQUEST['trans'] : null;
echo "<br>", $item = isset($_REQUEST['insert']) ? $_REQUEST['insert'] : null;

$success_message = null;

$sql_to_know = "SELECT i.transaction as transaction1, i.id as item_id,i.qr_id_cvsu, ce.quantity as cequan, ce.id as ced, SUM(i.quantity) as iquan, i.status as status, ce.qr_id as qr_id1 
                FROM `item_borrow` AS i 
                JOIN cvsu_equipment as ce ON i.qr_id_cvsu = ce.id 
                WHERE ce.qr_id = '$item' order by item_id desc limit 1";

$result = mysqli_query($conn, $sql_to_know);
$row = mysqli_fetch_assoc($result);


    IF($row['qr_id1'] == $item){
    echo "<br>", $ced = $row['ced'];
    echo "<br>", $trans = $row['transaction1'];
    
    $sql = "UPDATE `item_borrow` SET `scanned` = 'ok' WHERE qr_id_cvsu = '$ced'";

    if (mysqli_query($conn, $sql)) {
        echo "<br>Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}else{
    echo "Wrong item ID";
}


// Close the database connection
mysqli_close($conn);
?>
