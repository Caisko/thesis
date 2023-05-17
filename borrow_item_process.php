<?php 
include 'assets/connection/connect.php';
session_start();

if (!isset($_SESSION['pincode']) && !isset($_SESSION['true'])) {
session_destroy();
header("location:borrowers.php");
}
//Initialize variables
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
$item = isset($_REQUEST['insert']) ? $_REQUEST['insert'] : null;
$item_id = null;
$id_num = null;
$success_message = null;
//Search box value assigning to $Name variable.
 $id = $_REQUEST['id'];
 $item = $_REQUEST['insert'];
if (!empty($id) && !empty($item)) {
  //Search query.
  $status = "SELECT * FROM `cvsu_equipment` WHERE `qr_id` = '$item'";
  //Query execution
  $result = mysqli_query($conn, $status);
  $row = mysqli_fetch_assoc($result);
  if ($result->num_rows > 0) {
   if($row['qr_id'] == $item){
    if ($row["qr_id"] == $item) {
      $serial = $row['serial'];
       $item_id = $row['id'];
    } else {
     
    }
  }else{
    echo "wala";
  }
   
}

$status = "SELECT * FROM `borrowers` WHERE id_num = '$id'";
//Query execution
$result = mysqli_query($conn, $status);
$row = mysqli_fetch_assoc($result);
if ($result->num_rows > 0) {
 
  if ($row["id_num"] == $id) {
   $id_num = $row['id'];
  } else {
   
  }
}
$if_have_in_cvsu = "SELECT * FROM `cvsu_equipment` WHERE `qr_id` = '$item'";
//Query execution
$result = mysqli_query($conn, $if_have_in_cvsu);
$row = mysqli_fetch_assoc($result);

      if($row && $row['qr_id'] == $item){
        if(!empty ($row['serial'])){
            $checking = "SELECT * FROM `item_borrow` WHERE `qr_id_cvsu` = '$item_id'";
            $result = mysqli_query($conn, $checking);
            $row = mysqli_fetch_assoc($result);
            
            if (!$row || !isset($row['qr_id_cvsu']) || $item_id != $row['qr_id_cvsu']) {
                // $row is not set or qr_id_cvsu is not set in $row, or $item_id is not equal to $row['qr_id_cvsu']
                $sql = "INSERT INTO `item_borrow`( `borrower_id_num`, `qr_id_cvsu`,`quantity`) 
                        VALUES ('$id_num','$item_id','1') ";
            
                if ($conn->query($sql) === TRUE) { 
                    echo "Successfully added";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Existing";
            }
        
      }else{
     
        $checking = "SELECT * FROM `item_borrow` WHERE `qr_id_cvsu` = ? AND `transaction` = ''";
        $stmt = $conn->prepare($checking);
        $stmt->bind_param("s", $item_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if(empty($row['qr_id_cvsu'])){
          $insert = "INSERT INTO `item_borrow` (`borrower_id_num`, `qr_id_cvsu`, `quantity`) VALUES (?, ?, 1)";
          $stmt = $conn->prepare($insert);
          $stmt->bind_param("ss", $id_num, $item_id);
          if ($stmt->execute()) {
              echo "Successfully added";
          } else {
              echo "Error inserting record: " . $conn->error;
          }
        }else{
        if ($result->num_rows > 0) {
          // Update the existing record
$sql_to_know = "SELECT i.transaction as transaction, i.qr_id_cvsu as qr_id, ce.quantity as cequan, ce.id as id, SUM(i.quantity) as iquan, i.status as status FROM `item_borrow` AS i JOIN cvsu_equipment as ce ON i.qr_id_cvsu = ce.id WHERE ce.id = '$item_id' and i.status != 'return'  GROUP BY i.qr_id_cvsu;";
$result = mysqli_query($conn, $sql_to_know);
$row = mysqli_fetch_assoc($result);

if ($row['iquan'] < $row['cequan']) {
    $update = "UPDATE `item_borrow` SET `quantity` = `quantity` + 1 WHERE `qr_id_cvsu` = ? AND `transaction` = ''";
    $stmt = $conn->prepare($update);
    $stmt->bind_param("s", $item_id);
    if ($stmt->execute()) {
        echo "Successfully updated";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "All items have been borrowed";
}

      } else {
          // Insert a new record
          $sql_to_know ="SELECT i.qr_id_cvsu as qr_id, ce.id as id , ce.quantity as cequan, SUM(i.quantity) as iquan, i.status as status FROM `item_borrow` AS i JOIN cvsu_equipment as ce ON i.qr_id_cvsu = ce.id WHERE ce.id = '$item_id' and  i.status != 'return'  GROUP BY i.qr_id_cvsu;";
          $result = mysqli_query($conn, $sql_to_know);
          $row = mysqli_fetch_assoc($result);
          if($row['iquan'] < $row['cequan']){
              $insert = "INSERT INTO `item_borrow` (`borrower_id_num`, `qr_id_cvsu`, `quantity`) VALUES (?, ?, 1)";
              $stmt = $conn->prepare($insert);
              $stmt->bind_param("ss", $id_num, $item_id);
              if ($stmt->execute()) {
                  echo "Successfully added";
              } else {
                  echo "Error inserting record: " . $conn->error;
              }
          } else {
              echo "All items have been borrowed";
          }
      }
      
        
    }     
    
  }
  }else{
    echo "no data";
  }

}
//Creating unordered list to display result.
?> 