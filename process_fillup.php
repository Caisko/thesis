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

 echo $qr_id = $_GET['id'];
 echo $label = $_GET['label'];
 echo $name = $_GET['name'];

 //kinuha ang laman ng item





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


$sql = "INSERT INTO `item_borrow` (`borrower_id_num`, `qr_id_cvsu`, `quantity`) VALUES ($id_bo, $qr_id, 1)";

if ($conn->query($sql) === TRUE) {
  header("location:borrow_qr.php?name=$name&label=$id_num");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



?> 