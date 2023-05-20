<?php 
include 'assets/connection/connect.php';
session_start();


// //Initialize variables
// $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
// $item = isset($_REQUEST['insert']) ? $_REQUEST['insert'] : null;
// $item_id = null;
// $id_num = null;
// $success_message = null;
// //Search box value assigning to $Name variable.
//  $id = $_REQUEST['id'];
//  $item = $_REQUEST['insert'];

if(isset($_POST['submit'])){
 echo $quantity =  $_POST['quantity'];
 echo $qr_id = $_POST['qr_id'];
 echo $label = $_POST['label'];
 echo $item = $_POST['item'];
 echo $id_item = $_POST['id_item'];
 echo $total = $_POST['totat1'];
 //kinuha ang laman ng item

 $status = "SELECT * FROM `cvsu_equipment` WHERE `qr_id` = '$qr_id'";
 //Query execution
 $result = mysqli_query($conn, $status);
 $row = mysqli_fetch_assoc($result);
 if ($result->num_rows > 0) {
 
   if ($row["qr_id"] == $qr_id) {
     $serial = $row['serial'];
      $item_id = $row['id'];
      $cequan = $row['quantity'];
      $equipment  = $row['equipment'];
   } else {
    echo "wala";
   }

}

// kinuha laman ng borrowers
$status = "SELECT * FROM `borrowers` WHERE id_num = '$label'";
//Query execution
$result = mysqli_query($conn, $status);
$row = mysqli_fetch_assoc($result);
if ($result->num_rows > 0) {
 
  if ($row["id_num"] == $label) {
   $id_bo = $row['id'];
   $id_num = $row['id_num'];
   echo "<br>", $name = implode(' ',[$row['sname'],$row['gname'],$row['mname']]);
  } else {
   
  }
}

if($quantity <= $total){
  $status = "SELECT * FROM `item_borrow` WHERE transaction = '' and qr_id_cvsu = '$item_id'";
  //Query execution
  $result = mysqli_query($conn, $status);
  $row = mysqli_fetch_assoc($result);
  if(empty($row['qr_id_cvsu'])){
$sql = "INSERT INTO `item_borrow` (`borrower_id_num`, `qr_id_cvsu`, `quantity`) VALUES ($id_bo, $id_item, $quantity)";

if ($conn->query($sql) === TRUE) {
  header("location:borrow_qr.php?name=$name&label=$id_num&category=$equipment");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  }else{
    $status = "SELECT * FROM `item_borrow` WHERE transaction = '' and qr_id_cvsu = '$item_id'";
    //Query execution
    $result = mysqli_query($conn, $status);
    $row = mysqli_fetch_assoc($result);
    $quan = $row['quantity'];
    $quantity_total = $quan + $quantity;
    $sql = "UPDATE item_borrow SET quantity='$quantity_total' WHERE transaction = '' and borrower_id_num = $id_bo and qr_id_cvsu = $item_id";

if ($conn->query($sql) === TRUE) {
  header("location:borrow_qr.php?name=$name&label=$id_num");
} else {
  echo "Error updating record: " . $conn->error;
}

  }
}else{
 
$status = "SELECT * FROM `item_borrow` WHERE transaction = '' and qr_id_cvsu = '$item_id'";
//Query execution
$result = mysqli_query($conn, $status);
$row = mysqli_fetch_assoc($result);
if(empty($row['qr_id_cvsu'])){
$sql = "INSERT INTO `item_borrow` (`borrower_id_num`, `qr_id_cvsu`, `quantity`) VALUES ($id_bo, $id_item, $total)";

if ($conn->query($sql) === TRUE) {
header("location:borrow_qr.php?name=$name&label=$id_num&category=$equipment");
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}else{
  $status = "SELECT * FROM `item_borrow` WHERE transaction = '' and qr_id_cvsu = '$item_id'";
  //Query execution
  $result = mysqli_query($conn, $status);
  $row = mysqli_fetch_assoc($result);
  $quan = $row['quantity'];
  $quantity_total = $quan + $total;
  $sql = "UPDATE item_borrow SET quantity='$quantity_total' WHERE transaction = '' and borrower_id_num = $id_bo and qr_id_cvsu = $item_id";

if ($conn->query($sql) === TRUE) {
header("location:borrow_qr.php?name=$name&label=$id_num");
} else {
echo "Error updating record: " . $conn->error;
}

}

}
}
?> 