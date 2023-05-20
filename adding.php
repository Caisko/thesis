<?php
include "assets/connection/connect.php";
$trans = "Trans";
$random = substr(md5(mt_rand()), 0, 7);
$all = [$trans, $random];
echo $sama = implode($all);

$label =  $_POST['label'];
$name =  $_POST['name'];

$date = date('Y-m-d');
$date_return = $start_date = date('Y-m-d', strtotime('+7 days'));;

if(isset($_POST['submit'])){
  $sql_to_know ="SELECT
  count(i.qr_id_cvsu) AS count,
  ce.quantity AS cequan,
  b.id_num,
  ce.id,
  SUM(i.quantity) AS iquan,i.status AS
STATUS, i.transaction
FROM
  `item_borrow` AS i
JOIN cvsu_equipment AS ce
ON
  i.qr_id_cvsu = ce.id
JOIN borrowers AS b
ON
  b.id = i.borrower_id_num
WHERE
  i.status = 'borrow' AND i.transaction = '' and NOT i.status = 'return';";
  $result = mysqli_query($conn, $sql_to_know);
  $row = mysqli_fetch_assoc($result);

if($row['count'] == 0){
  header("location:borrow_qr.php?label=$label&name=$name");
  echo "balik";
}else{
    $sql_to_know ="SELECT i.qr_id_cvsu ,ce.quantity as cequan,ce.id,sum(i.quantity) as iquan,count(i.status) as status FROM `item_borrow` AS i join cvsu_equipment as ce on i.qr_id_cvsu = ce.id WHERE  not status = 'return' and not transaction = '$sama';";
    $result = mysqli_query($conn, $sql_to_know);
    $row = mysqli_fetch_assoc($result);
    $status = "SELECT * FROM `borrowers` WHERE id_num = '$label'";
    if(empty($row['transaction'])){
//Query execution
$result = mysqli_query($conn, $status);
$row = mysqli_fetch_assoc($result);
if ($result->num_rows > 0) {
 
  if ($row["id_num"] == $label && empty($row['transaction'])) {
  $id = $row['id'];
$sql = "UPDATE item_borrow SET `date_borrow` = '$date' WHERE borrower_id_num = '$id' and transaction = ''";

if ($conn->query($sql) === TRUE) {
    $sql = "UPDATE item_borrow SET `transaction` = '$sama', `status` = 'borrow', `date_return` = '$date_return' WHERE date_borrow = '$date' and transaction = ''";

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
     $sql = "UPDATE item_borrow SET `qr_print` = '$filename' WHERE transaction = '$sama'";

     if ($conn->query($sql) === TRUE) {      
        header("location:http://localhost:5000/scanface.html?print=$filename&name=$name&label=$label");
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

}
?>