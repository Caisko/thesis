<?php 
  include 'assets/connection/connect.php';

//Search box value assigning to $Name variable.
echo $item = $_REQUEST['insert'];
 echo $id = $_REQUEST['id'];
if (!empty($item) && !empty($id)){
    $status = "SELECT * FROM `cvsu_equipment` WHERE `qr_id` = '$item'";
    $result = mysqli_query($conn, $status);
    $row = mysqli_fetch_assoc($result);
  //Search query.
//*  $sql = "INSERT INTO MyGuests (firstname, lastname, email)
//*VALUES ('John', 'Doe', 'john@example.com')";

//* if ($conn->query($sql) === TRUE) {
   echo '<div class="alert alert-success"><strong>my laman! </strong></div>';
//*} else {
//*  echo "Error: " . $sql . "<br>" . $conn->error;
//*}

}
//Creating unordered list to display result.
?> 