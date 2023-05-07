<?php 
include 'assets/connection/connect.php';
session_start();
if(isset($_POST['submit2'])){
 echo $id = $_POST['id_num'];
 echo strtolower($sname = $_POST['sname']);
 echo strtolower($mname = $_POST['mname']);
 echo strtolower($gname = $_POST['gname']);
 echo $status1 = $_POST['status1'];
  strtolower($dep = $_POST['dep']);
  $status = "SELECT id_num,veri_status as veri FROM borrowers where id_num = '$id'";
  $result = mysqli_query($conn, $status);
  $row    = mysqli_fetch_assoc($result);
 // $data = array($row['sname'],$row['mname'],$row['gname']);
//  $check = array($sname,$mname,$gname);
 // $check1 = implode($data);
 // $check2 = implode($check);
 $name = implode(" ", array($gname, $mname, $sname));


  if($row !== null && $row['id_num'] == $id ){
    header("location: face_registration.php?");
  }else{
    $sql = "INSERT INTO `borrowers`(`id_num`, `sname`, `gname`, `mname`, `status`, `Deparment`,`veri_status`) 
    VALUES ('$id','$sname','$gname','$mname','$status1','$dep','not')";
    if ($conn->query($sql) === TRUE) {
   
      header("location: face_registration.php?modal=true&id=$id&name=$name");
      
    } else {
      
      header("location: face_registration.php?modal=false&id=$id");
      
    }
    $conn->close();
  }
  
}

?>
