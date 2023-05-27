<?php
include 'assets/connection/connect.php';

if(isset($_POST["done"])){

  if (isset($_POST["id"]) ||isset($_POST["error"]) || isset($_POST["check"])){
  echo $id = $_POST["id"];
  echo  $error = $_POST["error"];
  echo  $check = $_POST["check"];}
  

      $status = "SELECT * FROM gatepass where `gatepass_id` = '$id' OR `gatepass_id` = '$error' OR `gatepass_id` = '$check'";
      $result = mysqli_query($conn, $status);
      $row = mysqli_fetch_assoc($result);
      echo $gate = $row["gate_cat_2"];
      if(!empty($id)){
        $status = "UPDATE `gatepass` SET `gatepass_status`='request',`transaction`='pending' where gatepass_id = '$id'";
        $result = mysqli_query($conn, $status);
        if ($result) {
          $new = "SELECT * FROM gatepass where gate_cat_2 = '$gate'";
          $result = mysqli_query($conn, $new);
          $row = mysqli_fetch_assoc($result);
          if($row["gate_cat_2"]== 'IN/OUT'){
            //header("Location: qrcode_print.php?id=$id");
          }else{
          header("Location: success_register.php");
          }
        } else {
          echo "Error updating record: " . $conn->error;
        }
      }
      elseif(!empty($error)){
        $status = "UPDATE `gatepass` SET `gatepass_status`='request',`transaction`='pending' where gatepass_id = '$error'";
        $result = mysqli_query($conn, $status);
        if ($result) {
          $new = "SELECT * FROM gatepass where gate_cat_2 = '$gate'";
          $result = mysqli_query($conn, $new);
          $row = mysqli_fetch_assoc($result);
          if($row["gate_cat_2"] == 'IN/OUT'){
            header("Location: success_register.php?id=$error");
          }else{
            header("Location: success_register.php?");
          }
        
        } else {
          echo "Error updating record: " . $conn->error;
        }
      }  
      elseif(!empty($check)){
        $status = "UPDATE `gatepass` SET `gatepass_status`='request',`transaction`='pending' where gatepass_id = '$check'";
        $result = mysqli_query($conn, $status);
        if ($result) {
          $new = "SELECT * FROM gatepass where gate_cat_2 = '$gate'";
          $result = mysqli_query($conn, $new);
          $row = mysqli_fetch_assoc($result);
          if($row["gate_cat_2"] == 'IN/OUT'){
            header("Location: success_register.php?id=$check");
          }else{
            header("Location: success_register.php");
          }
      }
      else{
        echo "Nothing to update";
      }
      

}
}
?>