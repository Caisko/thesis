<?php 
include 'assets/connection/connect.php';
session_start();


if(isset($_POST['submit'])){
   $id =  $_POST['id'];
   $trans =  $_POST['transact_id'];
   $item =  $_POST['item'];
   $quan =  $_POST['quantity'];
   $current_date = date('Y-m-d');
   echo $current_date;
  $sql = "SELECT b.id, b.id_num , b.Deparment as de, b.sname as sname, b.gname as gname, b.mname as mname,
i.borrower_id_num as bnum, i.id as id_del, i.qr_id_cvsu, i.date_borrow as date_borrow,
i.date_return as date_return,i.quantity as quan, i.status as status, ce.id as ced, ce.serial as se,sum(i.quantity) as counting
, ce.item_name as name1, ce.description as desc1, ce.quantity as quantity
FROM item_borrow as i
JOIN borrowers as b ON i.borrower_id_num = b.id
JOIN cvsu_equipment as ce ON ce.id = i.qr_id_cvsu
WHERE i.transaction = '$trans' AND ce.item_name = '$item';
"; 


$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);
$all = implode(array($row['sname'], ",", $row['gname'], " ", $row['mname']));
$ced = $row['ced'];
$sql = "UPDATE item_borrow SET quantity_return = quantity - $quan, status = 'pending' WHERE transaction = '$trans' AND qr_id_cvsu = '$ced'";

if ($conn->query($sql) === TRUE) {
    header("location:return_item.php?label=$id&name=$all");
} else {
  echo "Error updating record: " . $conn->error;
}

}
?>