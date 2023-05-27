<?php 
  include 'assets/connection/connect.php';

//Search box value assigning to $Name variable.
$Name = $_REQUEST['search'];
if (!empty($Name)) {
  //Search query.
  $status = "SELECT * from gatepass where link = '$Name'";
  //Query execution
  $result = mysqli_query($conn, $status);
  $row = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    if ($row["link"] == $Name) {
    $pass = $row['passing_qr'];
    ECHO "register_gate.php?pass=$pass";
    }else{
      echo "No Data";
    }
  } else {
      echo "No Data"; 
  }
}
//Creating unordered list to display result.
?> 