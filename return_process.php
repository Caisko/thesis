<?php 
include 'assets/connection/connect.php';
session_start();


if(isset($_POST['submit'])){
  $trans =  $_POST['transact_id'];
   $remarks =  $_POST['remarks'];
   $item =  $_POST['item'];
   $quan =  $_POST['quantity'];
   $current_date = date('Y-m-d');
   echo $current_date;
  $sql = "SELECT b.id as id_num1, b.id_num , b.Deparment as de, b.sname as sname, b.gname as gname, b.mname as mname,
i.borrower_id_num as bnum, i.id as id_del, i.qr_id_cvsu, i.date_borrow as date_borrow,min(i.quantity_return) as quantity_return,
i.date_return as date_return,i.quantity as quan, i.status as status, ce.id as ced, ce.serial as se
, ce.item_name as name1, ce.description as desc1, ce.quantity as quantity, i.qr_print as qr
FROM item_borrow as i
JOIN borrowers as b ON i.borrower_id_num = b.id
JOIN cvsu_equipment as ce ON ce.id = i.qr_id_cvsu
WHERE i.transaction = '$trans' AND ce.item_name = '$item' ;
"; 


$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);
$all = implode(array($row['sname'], ",", $row['gname'], " ", $row['mname']));
$ced = $row['ced'];
$id_num = $row['id_num1'];
$date_borrow = $row['date_borrow'];
$date_return = $row['date_return'];
$qr = $row['qr'];
$status = $row['status'] ;

if($remarks == 'good_condition' || $remarks == 'slightly_damaged'){
  if($row['quan'] == $quan){
$sql = "UPDATE item_borrow SET quantity_return = quantity - $quan, status = 'return',date_return_item = '$current_date',remarks = '$remarks' WHERE transaction = '$trans' AND qr_id_cvsu = '$ced'";

if ($conn->query($sql) === TRUE) {
    header("location:return_item.php");
    echo"update";
} else {
  echo "Error updating record: " . $conn->error;
}
}else{
    $sql = "UPDATE item_borrow SET quantity_return = quantity - $quan, status = 'return',date_return_item = '$current_date',remarks = '$remarks' WHERE transaction = '$trans' AND qr_id_cvsu = '$ced'";
if ($conn->query($sql) === TRUE) {
  $sql = "SELECT min(quantity_return) as quantity_return from item_borrow WHERE transaction = '$trans';"; 
  
  $result = mysqli_query($conn, $sql);
  $row    = mysqli_fetch_assoc($result);
  
  echo $balance = $row['quantity_return'];

 
if($row['transaction'] == $trans || $balance != 0){
  $sql_insert ="INSERT INTO `item_borrow`(`borrower_id_num`, `qr_id_cvsu`, `quantity`, `transaction`, `date_borrow`, `status`, `date_return`, `qr_print`, `remarks`) VALUES 
  ($id_num,$ced,'$balance','$trans','$date_borrow','return_pending','$date_return','$qr','$remarks') ";
  
  if ($conn->query($sql_insert) === TRUE) {
    header("location:return_item.php");
    echo "dagdag data";
  }else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}else{
  header("location:return_item.php");
}

} else {
  echo "Error updating record: " . $conn->error;
}
  }
}else if($remarks == 'destroyed'){
  if(!empty($row['se'])){
    $sql = "UPDATE item_borrow SET quantity_return = quantity - $quan, status = 'return',date_return_item = '$current_date',remarks = '$remarks' WHERE transaction = '$trans' AND qr_id_cvsu = '$ced'";

    if ($conn->query($sql) === TRUE) {
      $sql = "UPDATE cvsu_equipment SET `item_stats` = 'unavailable' where id = '$ced'";
      if ($conn->query($sql) === TRUE) {
        header("location:return_item.php");
    } else {
      echo "Error updating record: " . $conn->error;
    }
    } else {
      echo "Error updating record: " . $conn->error;
    }
  }
}

}
?>