<?php
include 'assets/connection/connect.php';
if(isset($_POST["add"])){
  
   echo $id = $_POST["id"];
   echo  $error = $_POST["error"];
   echo  $check = $_POST["check"];
      $status = "SELECT * FROM gatepass where `gatepass_id` = '$id' || `gatepass_id` = '$error' || `gatepass_id` = '$check'";
      $result = mysqli_query($conn, $status);
      $row = mysqli_fetch_assoc($result);
    
      echo $id_gate = $row["id"],"<br>";
      echo $wew = $row["gatepass_id"],"<br>";
      echo   $unit = $_POST["unit"],"<br>";
      echo  $quan = $_POST["quantity"],"<br>";
      echo  $desc = $_POST["desc"],"<br>";

      $login = "SELECT * FROM unit_number where `unit_num_serial` = '$unit'";
      $result = mysqli_query($conn,$login);
      $row = mysqli_fetch_assoc($result);
    if($row["unit_num_serial"]== $unit){
        header("Location: item.php?error=$wew");
    }else{
      $sql = "INSERT INTO `unit_number`(`unit_num_serial`, `user_id`, `quantity`, `description`) VALUES ('$unit','$id_gate','$quan','$desc')";

      if ($conn->query($sql) === TRUE) {
        header("Location: item.php?check=$wew");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    if(empty($unit)){
        $sql = "INSERT INTO `unit_number`(`unit_num_serial`, `user_id`, `quantity`, `description`) VALUES ('$unit','$id_gate','$quan','$desc')";

        if ($conn->query($sql) === TRUE) {
          header("Location: item.php?check=$wew");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>