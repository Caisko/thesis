<?php 
include 'assets/connection/connect.php';
session_start();
if(isset($_POST['submit'])){
  $id = $_POST['id_num'];
  $sname = $_POST['sname'];
  $mname = $_POST['mname'];
  $gname = $_POST['gname'];
  $status1 = $_POST['status1'];
  $dep = $_POST['dep'];
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
    $sql = "INSERT INTO `borrowers`(`id_num`, `sname`, `gname`, `mname`, `status`, `Deparment`,`veri_status`) 
    VALUES ('$id','$sname','$gname','$mname','$status1','$dep','not')";
    if ($conn->query($sql) === TRUE) {
   
      header("location: face_registration.php?modal=true&id=$id");
      
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
  
}

?>