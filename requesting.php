<?php 
include 'assets/connection/connect.php';
session_start();
if(isset($_GET['submit'])){
  $id = $_GET['id_num'];
  strtolower($sname = $_GET['sname']);
  strtolower($mname = $_GET['mname']);
  strtolower($gname = $_GET['gname']);
  $status1 = $_GET['status1'];
  strtolower($dep = $_GET['dep']);
  $status = "SELECT id_num,veri_status as veri FROM borrowers where id_num = '$id'";
  $result = mysqli_query($conn, $status);
  $row    = mysqli_fetch_assoc($result);
 // $data = array($row['sname'],$row['mname'],$row['gname']);
//  $check = array($sname,$mname,$gname);
 // $check1 = implode($data);
 // $check2 = implode($check);

  if($row !== null && $row['id_num'] == $id ){
    echo "Existing Data";
  }else{
    $sql = "INSERT INTO `borrowers`(`id_num`, `sname`, `gname`, `mname`, `status`, `Deparment`) 
    VALUES ('$id','$sname','$gname','$mname','$status1','$dep')";
    if ($conn->query($sql) === TRUE) {
   
      header("location:http://localhost:5000/registerface.html?id=$id&sname=$sname&gname=$gname&mname=$mname");

      
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
  
}

?>