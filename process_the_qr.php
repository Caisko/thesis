<?php 
 include 'assets/connection/connect.php';

 //Search box value assigning to $Name variable.
 $qr_gen = $_GET['qr_gen'];
 if (!empty($qr_gen)) {
   //Search query.
   $status = "SELECT * from gatepass where gatepass_id = '$qr_gen'";
   //Query execution
   $result = mysqli_query($conn, $status);
   $row = mysqli_fetch_assoc($result);
 
   if ($result->num_rows > 0) {
     if ($row["gatepass_id"] == $qr_gen) {
     echo $pass = $row['passing_qr'];
     header("location:register_gate.php?pass=$pass");
     }else{
        echo "not valid";
     }
   } else {
        echo "NO data";
   }
 }
?>
