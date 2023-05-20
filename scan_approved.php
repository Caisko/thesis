<?php 
  include 'assets/connection/connect.php';

//Search box value assigning to $Name variable.
$id = isset($_REQUEST['trans']) ? $_REQUEST['trans'] : null;
$item = isset($_REQUEST['insert']) ? $_REQUEST['insert'] : null;
$item_id = null;
$id_num = null;
$id = $_REQUEST['trans'];
$item = $_REQUEST['insert'];
$success_message = null;

    $sql_to_know = "SELECT i.transaction as transaction, i.qr_id_cvsu, ce.quantity as cequan, ce.id as ced,
     SUM(i.quantity) as iquan, i.status as status,ce.qr_id as qr_id FROM `item_borrow` AS i JOIN cvsu_equipment as ce ON i.qr_id_cvsu = ce.id 
     WHERE transaction = '$id' and qr_id = '$item'";
    $result = mysqli_query($conn, $sql_to_know);
    $row = mysqli_fetch_assoc($result);
if($row['transaction'] == $id && $row['qr_id'] == $item){
   echo  $ced = $row['ced'];
   echo $id;
    $sql = "UPDATE `item_borrow` SET `scanned`='ok' WHERE transaction = '$id' and qr_id_cvsu = '$ced'";

        if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
        }

}else{
    echo "wrong item id";
}

//Creating unordered list to display result.
?> 