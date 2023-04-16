<?php 
include 'assets/connection/connect.php';
if (isset($_POST["submit"])) {
 echo $APP = $_POST["id1"];
echo $user_id = $_POST["user_id"];
$nice = "SELECT * FROM gatepass where id ='$APP'";
$result = mysqli_query($conn, $nice);
$row    = mysqli_fetch_assoc($result);
  if ($row["id"] == $APP && $row["gatepass_status"] == 'request') {

    $sql = " UPDATE `gatepass` SET `gatepass_status`='transaction 1',`fk_admins`='$user_id' WHERE id = '$APP'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
      header("location:movein.php");
    } else {
      echo "Error updating record: " . $conn->error;
    }
  }

$conn->close();
}

if (!empty($_GET["id"])) {
  $id = $_GET["id"];
  $approve = "SELECT * FROM gatepass where id ='$id'";
  $result = mysqli_query($conn, $approve);
  $row    = mysqli_fetch_assoc($result);
  if ($row["id"] == $id && $row["gatepass_status"] == 'transaction 1') {

    $sql = " UPDATE `gatepass` SET `gatepass_status`='transaction 2' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
      header("location:movein.php");
    } else {
      echo "Error updating record: " . $conn->error;
    }

    $conn->close();
  } else if ($row["id"] == $id && $row["gatepass_status"] == 'transaction 2') {

    $sql = " UPDATE `gatepass` SET `gatepass_status`='transaction 3' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
      header("location:movein.php");
    } else {
      echo "Error updating record: " . $conn->error;
    }

    $conn->close();
  } else if ($row["id"] == $id && $row["gatepass_status"] == 'transaction 3') {

    $sql = " UPDATE `gatepass` SET `gatepass_status`='transaction 4' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
      header("location:movein.php");
    } else {
      echo "Error updating record: " . $conn->error;
    }

    $conn->close();
  } else if ($row["id"] == $id && $row["gatepass_status"] == 'transaction 4') {

    $sql = " UPDATE `gatepass` SET `gatepass_status`='transaction 5',`transaction`='approved', `in/out` = 'in' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";

      $id = $row["id"];
      $gate_id = $row["gatepass_id"];
      $gate_cat = $row["gatepass_cat"];
      $gate_cat2 = $row["gate_cat_2"];
      $id_number = $row["id_number"];
      $name = $row["name"];
      $store = $row["name_store"];
      $course = $row["course"];
      $yr = $row["yr"];
      $section = $row["section"];
      $address = $row["address"];
      $date_reg = $row["date_register"];
      $valid = $row["valid_until"];
      $phone = $row["phone_number"];
      $desc = $row["description"];
      $qr = $row["qr"];
      $tc = $row["technical_name"];
      $in = "in";
      $admins = $row["fk_admins"];
      $all = "INSERT INTO `allrecords`(`gate_id`, `gatepass_id`, `gatepass_cat`, `gate_cat_2`, `id_number`, `name`, `name_store`, `course`, `yr`, `section`, `address`, `date_register`, `valid_until`, `phone_number`, `description`, `qr`, `technical_name`, `in/out`, `fk_admins`) 
    VALUES ('$id','$gate_id','$gate_cat','$gate_cat2','$id_number','$name','$store','$course','$yr','$section','$address','$date_reg','$valid','$phone','$desc','$qr','$tc','$in','$admins')";

      if ($conn->query($all) === TRUE) {

        header("location:movein.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();

    } else {
      echo "Error updating record: " . $conn->error;
    }
  }
}
?>