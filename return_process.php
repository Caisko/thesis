<?php 
include 'assets/connection/connect.php';
session_start();


if(isset($_POST['submit'])){
echo  $trans =  $_POST['transact_id'],"<br>";
echo  $id =  $_POST['ced'],"<br>";
echo  $item =  $_POST['item'],"<br>";
echo  $quan =  $_POST['quantity'],"<br>";
echo  $status = $_POST['remarks'],"<br>";
 $current_date = date('Y-m-d');
   echo $current_date;

$sql = "SELECT b.id as id_num1, b.id_num , b.Deparment as de, b.sname as sname, b.gname as gname, b.mname as mname,
i.borrower_id_num as bnum, i.id as id_del, i.qr_id_cvsu, i.date_borrow as date_borrow,min(i.quantity_return) as quantity_return,
i.date_return as date_return,i.quantity as quan, i.status as status, ce.id as ced, ce.serial as se
, ce.item_name as name1, ce.description as desc1, ce.quantity as quantity, i.qr_print as qr
FROM item_borrow as i
JOIN borrowers as b ON i.borrower_id_num = b.id
JOIN cvsu_equipment as ce ON ce.id = i.qr_id_cvsu
WHERE i.transaction = '$trans' AND ce.id = '$id' ;
"; 
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);

echo $id_num = $row['id_num1'],"<br>";
echo $date_borrow = $row['date_borrow'],"<br>";
echo $date_return = $row['date_return'],"<br>";
$qr = $row['qr'];
$row['status'] ;

if($status == 'Good Condition'){
 
$sql = "UPDATE item_borrow SET quantity_return = quantity - $quan,date_return_item = '$current_date',status = '$status' WHERE transaction = '$trans' AND qr_id_cvsu = '$id'";

if ($conn->query($sql) === TRUE) {
    header("location:records.php");
    echo"update";
} else {
  echo "Error updating record: " . $conn->error;
}

  
}else if($status == 'Damage'){
  if(!empty($row['se'])){
    $sql = "UPDATE item_borrow SET quantity_return = quantity - $quan,date_return_item = '$current_date',status = '$status' WHERE transaction = '$trans' AND qr_id_cvsu = '$id'";
    if ($conn->query($sql) === TRUE) {
      $sql = "UPDATE cvsu_equipment SET `item_stats` = 'unavailable', damage = '1' where id = '$id'";
      if ($conn->query($sql) === TRUE) {
        header("location:records.php");
    } else {
      echo "Error updating record: " . $conn->error;
    }
    } else {
      echo "Error updating record: " . $conn->error;
    }
  }else{
    $sql = "UPDATE item_borrow SET quantity_return = quantity - $quan, date_return_item = '$current_date',status = 'Good Condition' WHERE transaction = '$trans' AND qr_id_cvsu = '$id'";
    if ($conn->query($sql) === TRUE) {

      $sql = "UPDATE cvsu_equipment SET `damage` = '$quan' where id = '$id'";

      
      if ($conn->query($sql) === TRUE) {
        
              $sql_insert ="INSERT INTO `item_borrow`(`borrower_id_num`, `qr_id_cvsu`, `quantity`, `transaction`, `date_borrow`, `date_return`, `qr_print`, `status`,`date_return_item`) VALUES 
                        ($id_num,$id,'$quan','$trans','$date_borrow','$date_return','$qr','$status','$current_date') ";
                        if ($conn->query($sql_insert) === TRUE) {
                          header("location:records.php");
                          echo "dagdag data";
                }else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
      
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