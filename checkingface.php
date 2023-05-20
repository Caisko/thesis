<?php
include 'assets/connection/connect.php';


if(isset($_GET['name']) && isset($_GET['label']) && isset($_GET['print'])){
  $qr =  $_GET['print'];
  $name = $_GET['name'];
  $label =  $_GET['label'];
    $sql = "SELECT i.transaction as transaction,i.qr_print,b.id as id,i.borrower_id_num as i_num,b.id_num as id_num
     FROM item_borrow as i JOIN borrowers as b ON 
    i.borrower_id_num = b.id WHERE i.qr_print = '$qr';";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);  
$trans = $row['transaction'];

if($row['id_num'] == $label){

$sql = "UPDATE `item_borrow` SET `status` = 'pending' WHERE  transaction = '$trans'";
if ($conn->query($sql) === TRUE) {
    header("location:confirmation_borrow.php?name=$name&label=$label&print=$qr");
} else {
echo "Error updating record: " . $conn->error;
}
}else{


}
}

?>
