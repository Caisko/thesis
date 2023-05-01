<?php
include "assets/connection/connect.php";
$trans = "Trans";
$random = substr(md5(mt_rand()), 0, 7);
$all = [$trans, $random];
 $sama = implode($all);
$label =  $_POST['label'];
$name =  $_POST['name'];
echo $name1 =  $_POST['name1'];
$date = date('Y-m-d');
$date_return = $_POST['date'];
if(isset($_POST['submit'])){
   
if(empty($name1)){
    //echo "walla ";
    header("location:borrow_qr.php?name=$name&label=$label");
}else{
    $sql_to_know ="SELECT i.qr_id_cvsu ,ce.quantity as cequan,ce.id,sum(i.quantity) as iquan,count(i.status) as status FROM `item_borrow` AS i join cvsu_equipment as ce on i.qr_id_cvsu = ce.id WHERE ce.id = '$item_id' and not status = 'return' ;";
    $result = mysqli_query($conn, $sql_to_know);
    $row = mysqli_fetch_assoc($result);
    $status = "SELECT * FROM `borrowers` WHERE id_num = '$label'";
//Query execution
$result = mysqli_query($conn, $status);
$row = mysqli_fetch_assoc($result);
if ($result->num_rows > 0) {
 
  if ($row["id_num"] == $label) {
  $id = $row['id'];
$sql = "UPDATE item_borrow SET `date_borrow` = '$date' WHERE borrower_id_num = '$id'";

if ($conn->query($sql) === TRUE) {
    $sql = "UPDATE item_borrow SET `transaction` = '$sama', `status` = 'borrow', `date_return` = '$date_return' WHERE date_borrow = '$date'";

    if ($conn->query($sql) === TRUE) {
        include "phpqrcode/qrlib.php";
     $PNG_TEMP_DIR = 'trans/';

     if (!file_exists($PNG_TEMP_DIR)) {
         mkdir($PNG_TEMP_DIR);
     }
     $filename = $PNG_TEMP_DIR . 'QR.png';
     $codeString =  $sama;
     $filename = $PNG_TEMP_DIR . 'Qr' . md5($codeString) . '.png';

     QRcode::png($codeString, $filename);
     
     echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" style="width:250px;margin:auto;" hidden>';
     $sql = "UPDATE item_borrow SET qr_print = '$filename' WHERE transaction = '$sama'";

     if ($conn->query($sql) === TRUE) {      
        header("location:trans_print.php?print=$filename");
     }else{

     }
    } else {
      echo "Error updating record: " . $conn->error;
    }

} else {
  echo "Error updating record: " . $conn->error;
}
  } else {
   
  }
}
}

}
?>