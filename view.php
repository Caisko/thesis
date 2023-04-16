
<?php
include 'assets/connection/connect.php';
session_start();
$name = $_SESSION["uname"];
$pass = $_SESSION["password"];

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
session_destroy();
header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CVSU</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel='stylesheet' href='bootstrap-3.3.7-dist/css/bootstrap.min.css'>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
</head>

<body style="overflow-x: hidden;">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.php" class=" d-flex align-items-center">
        <img src="assets/img/logo.png" class="hidden-print"  style="width:300px;height:60px;">
      
      </a>
      <i class="bi bi-list toggle-sidebar-btn hidden-print"></i>
    </div><!-- End Logo -->

   
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

     
        <li class="nav-item dropdown">


        <?php
          $status = "SELECT * FROM admins where id_number = '" . $_SESSION["uname"] . "'";
          $result = mysqli_query($conn, $status);
          $row    = mysqli_fetch_assoc($result);
          $user_id = $row["id"];

         ?>
         

        <li class="nav-item dropdown pe-3">
       
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile/<?php echo $row["profile_pic"]; ?>" alt="Profile" class="rounded-circle hidden-print" style="width:40px;">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row["id_number"];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <h6><?php echo $row["given_name"]," ",$row["middle_name"]," ",$row["surname"];?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="dashboard.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

<?php if ($row["position"] == "Priority 2") { ?>
  <li class="nav-item">
    <a class="nav-link collapsed" href="account.php">
      <i class="bi bi-person-square"></i>
      <span>Register Accounts</span>
    </a>
  </li><!-- End Register gate pass Nav -->
  <li class="nav-item">
  <a class="nav-link collapsed" href="cvsu_equipment.php">
    <i class="bi bi-card-heading"></i>
    <span>Add Equipment</span>
  </a>
</li><!-- End Register gate pass Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" href="face_registration.php">
  <i class="bi bi-person-bounding-box"></i>
    <span>Borrowers</span>
  </a>
</li><!-- End Register gate pass Nav -->

<!-- <li class="nav-item">
  <a class="nav-link collapsed" href="borrow_scan.php">
  <i class="bi bi-arrow-bar-right"></i>
    <span>Borrowing Scanning</span>
  </a>
</li> End Register gate pass Nav 
<li class="nav-item">
  <a class="nav-link collapsed" href="return_scanning.php">
  <i class="bi bi-arrow-bar-left"></i>
    <span>Return Scanning</span>
  </a>
</li>End Register gate pass Nav -->
<li class="nav-item">
  <a class="nav-link collapsed" href="records.php">
    <i class="bi bi-archive"></i>
    <span>Records</span>
  </a>
</li><!-- End Register gate pass Nav -->
<li class="nav-item">
  <a class="nav-link collapsed" href="inventory.php">
  <i class="bi-list-check"></i>
    <span>Inventory</span>
  </a>
</li><!-- End Register gate pass Nav -->

  <?php } else if ($row["position"] == "Unit Checker") {  ?>
  <li class="nav-item">
    <a class="nav-link collapsed" href="gadget.php">
      <i class="bi bi-credit-card-2-front"></i>
      <span>Register Gate Pass</span>
    </a>
  </li><!-- End Register gate pass Nav --> 

  <?php } ?>
  <li class="nav-item">
    <a class="nav-link collapsed" href="movein.php">
      <i class="bi bi-check-square"></i>
      <span>Move In  Gate Pass</span>
    </a>
  </li><!-- End Register gate pass Nav --> 
  
  <li class="nav-item">
    <a class="nav-link collapsed" href="moveout.php">
      <i class="bi bi-x-square"></i>
      <span>Move Out Gate Pass</span>
    </a>
  <!--</li> End Register gate pass Nav 
  <li class="nav-item">
    <a class="nav-link collapsed" href="check.php">
      <i class="bi bi-folder2"></i>
      <span>View Approve Gatepass</span>
    </a>
  </li> End Register gate pass Nav -->



 <!-- <li class="nav-heading">Pages</li>-->

 
 <!--  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-faq.html">
      <i class="bi bi-question-circle"></i>
      <span>F.A.Q</span>
    </a>
  </li> --><!-- End F.A.Q Page Nav -->

 
</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1 class="hidden-print">Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item hidden-print"><a href="dashboard.php" class="hidden-print">Home</a></li>
          <li class="breadcrumb-item active hidden-print"  >Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
  <!-- Recent Sales -->
  <div class="col-12 ">
    <div class="card recent-sales ">
        <div class="card-body">
        <?php
            $status = "SELECT admins.position as position, gatepass.comment as comment,gatepass.date_register as register,gatepass.fk_admins as admins,gatepass.gatepass_status as status,gatepass.transaction as transaction,.gatepass.gatepass_id as gatepass_id,gatepass.id,unit_number.description as description,gatepass.technical_name as technical_name,admins.id,admins.given_name as fname,admins.surname as lname,admins.middle_name as mname,gatepass.name as name,unit_number.unit_num_serial as serialnum,unit_number.quantity as quan,admins.sign as sign FROM gatepass LEFT OUTER JOIN unit_number on gatepass.id = unit_number.user_id JOIN admins on gatepass.fk_admins = admins.id WHERE  gatepass.id = '" . $_GET["id"] . "'";
            $result = mysqli_query($conn, $status);
            $row    = mysqli_fetch_assoc($result);
        $com = $row["comment"];
        $admin = $row["admins"];
        $trans = $row["transaction"];

        ?>
         <img src="assets/img/Gatepass.png" style="width:900px;height:200px;position: relative; left:10px;" class="form-control-plaintext">
<div class="container">
  <div class="row align-items-start">
    <div class="col">
    <h5 class="card-title hidden-print">Gate Pass Move In Form</h5>
    </div>
    <div class="col text-right">
    <p class="form-control-plaintext"> Date:  <?php echo $row["register"];?>
  
    </div>
   
  </div>
         <p class="form-control-plaintext">To The CVSU, Imus Campus Security Personel:</p>
         <p class="text-justify form-control-plaintext">&nbsp;&nbsp;&nbsp;&nbsp;Please Allow Mr./Mrs to <u><?php echo $row["name"]; ?></u> Move In personal Equipment/ Items from Cavite State University  
                   Imus Campus Today <?php echo date('m-d-Y');?>.</p>

                   <table class="table table-borderless ">
                    <thead>
                      <tr>
                      <th scope="col">#</th>
                        <th scope="col">UNIT</th>
                        <th scope="col">Description</th>
                        </tr>
                        <?php 
                        
                        ?>
                        </thead>
                        <tr>
                        <th scope="row"><?php echo $row["quan"] ?></th>
                        <td><?php echo $row["serialnum"];?></td>
                        <td><?php echo $row["description"];?></td>
                        </tr>
     
                    </tbody>
                  </table><br><br>
                  <div class="row align-items-start">
                    <div class="col">
                    <p class="form-control-plaintext">Requested By:</p>
                    </div>
                    <div class="col">
                    <p  class="form-control-plaintext">Checked By:</p>
                    </div>
                </div><!--ENDROW-->
                <?php if ($row["status"] == "transaction 1" || $row["status"] == "transaction 5" || $row["status"] == "transaction 2" || $row["status"] == "transaction 3" || $row["status"] == "transaction 4") { ?>
                <div class="row align-items-start">
                    <div class="col">
                    </div>
                    
                    <div class="col" style="position:absolute;top:410px;right:-420px;"><br>
                    <img src="assets/img/sign/<?php echo $row["sign"]; ?>" width="350px"  >
                    </div>
                </div><br>
<?php } ?>
                <!--ENDROW-->
                <div class="row align-items-start">
                    <div class="col">
                    <p  class="form-control-plaintext"><strong><u><?php echo $row["name"]; ?></u></strong></p>
                    </div>
                    <div class="col">
                  <p  class="form-control-plaintext"><strong ><u><?php echo $row["fname"], " ", $row["mname"], " ", $row["lname"]; ?></u></strong>
                    </div>
                </div><!--ENDROW-->
                <div class="row align-items-start">
                    <div class="col">
                    <p  class="form-control-plaintext">Name</p>
                    </div>
                    <div class="col">
                  <p  class="form-control-plaintext">Security Name </p>
                    </div>
                </div><!--ENDROW--><BR>
                <div class="row align-items-start">
                    <div class="col">
                 
                    </div>
                    <div class="col">
                    <p  class="form-control-plaintext">Technical Name: 
                        <?php if (empty($row["technical_name"])) {
                        echo "<strong><u>N/A</u></strong></p>";
                        }else{
                            echo "<strong><u>" . $row['technical_name'] . "</u></strong></p>";
                        }
                        ?>
                    </div>
                </div><!--ENDROW--><br><br>
                <div class="row align-items-start">
                    <div class="col">
                    <p class="form-control-plaintext">Recommending Approval:</p>
                    </div>
                    <div class="col">
                    </div>
                </div><!--ENDROW--><br><br>
                <div class="row align-items-start">
                    <div class="col">
                    <?php $status = $row["status"];

                    $sql = "SELECT * FROM admins WHERE position='Priority 3' ";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    if ($status == "transaction 2" && $row["position"] == 'Priority 3' ||$status== "transaction 5" ||$status == "transaction 3" || $status == "transaction 4") { ?>
                <div class="row align-items-start">
                    <div class="col">
                    </div>
                    
                    <div class="col" style="position:absolute;top:-50px;right:80px;"><br>
                    <img src="assets/img/sign/<?php echo $row["sign"]; ?>" width="350px"  >
                    </div>
                </div><br>
<?php } }
} else {
echo "No results found.";
}?>
                    </div>
                    <div class="col">
                    
                    <?php 
                    $sql = "SELECT * FROM admins WHERE position='Priority 2' ";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    if ( $row["position"] == 'Priority 2' && $status== "transaction 5" ||$status == "transaction 3" || $status == "transaction 4") { ?>
                <div class="row align-items-start">
                    <div class="col">
                    </div>
                    
                    <div class="col" style="position:absolute;top:-50px;right:50px;"><br>
                    <img src="assets/img/sign/<?php echo $row["sign"]; ?>" width="350px"  >
                    </div>
                </div><br>
<?php } }
} else {
echo "No results found.";
}?>
                    </div>
                    <div class="col">
                    <?php 
                    $sql = "SELECT * FROM admins WHERE position='Priority 4' ";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    if ( $row["position"] == 'Priority 4' && $status== "transaction 5"  || $status == "transaction 4") { ?>
                <div class="row align-items-start">
                    <div class="col">
                    </div>
                    
                       <div class="col" style="position:absolute;top:-50px;right:90px;"><br>
                    <img src="assets/img/sign/<?php echo $row["sign"]; ?>" width="400px"  >
                    </div>
                </div><br>
<?php } }
} else {
echo "No results found.";
}?>
                    </div>
                    <div class="col">
                    <?php $sql = "SELECT * FROM admins WHERE position='Priority 5' ";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    if ( $row["position"] == 'Priority 5'  && $status== "transaction 5"  ) { ?>
                <div class="row align-items-start">
                    <div class="col">
                    </div>
                    
                    <div class="col" style="position:absolute;top:-50px;right:90px;"><br>
                    <img src="assets/img/sign/<?php echo $row["sign"]; ?>" width="400px"  >
                    </div>
                </div><br>
<?php } }
} else {
echo "No results found.";
}?>
                    </div>
                </div><!--ENDROW-->
                <div class="row align-items-start">
  
                    <div class="col">
                    <?php
                        $status = "SELECT * from admins";
                        $result = $conn->query($status);

                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        ?>
                    <?php if($row["position"]== 'Priority 3'){?>
                   
                    <strong class="form-control-plaintext" style="font-size:12px"><?php echo $row["given_name"]," ",$row["middle_name"]," ",$row["surname"]; } ?></strong>
                    <?php }} ?>
                    </div>
                    <div class="col">
                    <?php
                        $status = "SELECT * from admins";
                        $result = $conn->query($status);

                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        ?>
                    <?php if($row["position"]== 'Priority 2'){?>
                        
                    <strong class="form-control-plaintext" style="font-size:12px"><?php echo $row["given_name"]," ",$row["middle_name"]," ",$row["surname"]; } ?></strong>
                    <?php }} ?>
                    </div>
                    <div class="col">
                    <?php
                        $status = "SELECT * from admins";
                        $result = $conn->query($status);

                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        ?>
                    <?php if($row["position"]== 'Priority 4'){?>
                    <strong class="form-control-plaintext" style="font-size:12px"><?php echo $row["given_name"]," ",$row["middle_name"]," ",$row["surname"]; } ?></strong>
                    <?php }} ?>
                    </div>
                    <div class="col">
                    <?php
                        $status = "SELECT * from admins";
                        $result = $conn->query($status);

                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        ?>
                    <?php if($row["position"]== 'Priority 5'){?>

                    <strong class="form-control-plaintext" style="font-size:12px"><?php echo $row["given_name"]," ",$row["middle_name"]," ",$row["surname"]; } ?></strong>
                    <?php }} ?>
                    </div>
                </div><!--ENDROW-->
                <div class="row align-items-start">
                    <div class="col">
                    <p class="form-control-plaintext" style="font-size:12px">Head Physical Facilities</p>
                    </div>
                    <div class="col">
                    <p class="form-control-plaintext" style="font-size:12px">Property and Supply Officer</p>
                    </div>
                    <div class="col">
                    <p class="form-control-plaintext" style="font-size:12px">College Inspector</p>
                    </div>
                    <div class="col">
                    <p class="form-control-plaintext" style="font-size:12px">Campus Administrator</p>
                    </div>
                </div><!--ENDROW--><br><br>
                <?php if (!empty($com) || $trans == "declined") { ?>
                <div class="row align-items-start">
                <div class="col">
                    <p class="form-control-plaintext" style="font-size:15px">COMMENT:     <STRONG><?php echo $com;?></STRONG></p>
                    </div>
                </div><!--ENDROW--><br><br>
                <?php $status = "SELECT * FROM admins where id = '$admin'";
                  $result = mysqli_query($conn, $status);
                  $row = mysqli_fetch_assoc($result);

                  ?>
                <div class="row align-items-start">
                <div class="col">
                    <p class="form-control-plaintext" style="font-size:15px">DECLINED BY: <STRONG><?php echo $row["given_name"]," ",$row["middle_name"]," ",$row["surname"];?></STRONG></p>
                    </div>
                </div><!--ENDROW--><br><br>
                      <?php } else if($trans == "approved") { ?>

    
                        <input  class="btn btn-primary w-100 hidden-print"  type="button" onclick="window.print()" value="Print">
    <?php }else{?>
         <!--PANG APPROVE TO AAYOSIN TO BUKAS -->

     <?php
     $status = "SELECT * FROM admins where id_number = '" . $_SESSION["uname"] . "'";
     $result = mysqli_query($conn, $status);
     $row = mysqli_fetch_assoc($result);
     $id_number = $_GET["id"];




     if ($row["position"] == "Unit Checker") {

       $sql = "SELECT * FROM gatepass where `id` = '$id_number'  ";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       if ($row["gatepass_status"] == "request") {
         ?>
         <div class="row">
         <div class="col">
         <form method="POST" action="approved.php">
    <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
    <input type="hidden" name="id1" value="<?php echo $id_number; ?>">
    <button type="submit"class="btn btn-success hidden-print w-100" name="submit">Approve</button>
    </form>     
  </div>

 
         <div class="col">
         <a href="#?id=<?php echo $row["id"];?>"  class="btn btn-warning w-100 hidden-print" data-toggle="modal" data-target="#declineModal" data-id="<?php echo $id_number;?>">Decline</a>
              </div>
              </div>
              <?php } else {
       } ?>
      <?php } else if ($row["position"] == "Priority 2") { ?>
        <?php $sql = "SELECT * FROM gatepass where `id` = '$id_number'  ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row["gatepass_status"] == "transaction 1") {
          ?>
         <div class="row">
         <div class="col">
         <a href="approved.php? id=<?php echo $id_number; ?>"  class="btn btn-success w-100 hidden-print">Approve</a>
         </div>
         <div class="col">
         <a href="#?id=<?php echo $row["id"];?>"  class="btn btn-warning w-100 hidden-print" data-toggle="modal" data-target="#declineModal" data-id="<?php echo $id_number;?>">Decline</a>
              </div>
              </div>
              <?php } else {
        } ?>
        <?php } else if ($row["position"] == "Priority 3") { ?>
          <?php $sql = "SELECT * FROM gatepass where `id` = '$id_number'  ";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          if ($row["gatepass_status"] == "transaction 2") {
            ?>
         <div class="row">
         <div class="col">
         <a href="approved.php? id=<?php echo $id_number; ?>"  class="btn btn-success w-100 hidden-print" >Approve</a>
         </div>
         <div class="col">
         <a href="#?id=<?php echo $row["id"];?>" class="btn btn-warning w-100 hidden-print" data-toggle="modal" data-target="#declineModal" data-id="<?php echo $id_number;?>">Decline</a>
              </div>
              </div>
              <?php } else {
          } ?>
        <?php } else if ($row["position"] == "Priority 4") { ?>
          <?php $sql = "SELECT * FROM gatepass where `id` = '$id_number'  ";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          if ($row["gatepass_status"] == "transaction 3") {
            ?>
         <div class="row">
         <div class="col">
         <a href="approved.php? id=<?php echo $id_number; ?>"  class="btn btn-success w-100 hidden-print" >Approve</a>
         </div>
         <div class="col">
         <a href="#?id=<?php echo $row["id"];?>"  class="btn btn-warning w-100 hidden-print" data-toggle="modal" data-target="#declineModal" data-id="<?php echo $id_number;?>">Decline</a>
              </div>
              </div>
              <?php } else {
          } ?>
        <?php } else if ($row["position"] == "Priority 5") { ?>
          <?php $sql = "SELECT * FROM gatepass where `id` = '$id_number'  ";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          if ($row["gatepass_status"] == "transaction 4") {
            ?>
         <div class="row">
         <div class="col">
         <a href="approved.php? id=<?php echo $id_number; ?>"  class="btn btn-success w-100 hidden-print" >Approve</a>
         </div>
         <div class="col">
         <a href="#?id=<?php echo $row["id"];?>" class="btn btn-warning w-100 hidden-print" data-toggle="modal" data-target="#declineModal" data-id="<?php echo $id_number;?>">Decline</a>
              </div>
              </div>
              <?php } else {
          } ?>
        <?php } ?>


        <!-- SA COMMENT TO-->
        <?php } ?>
        </div>
    <?php 
    
    ?>
   
   

  <!-- Modal -->
  <div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Decline Gatepass</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="decline.php">
          <div class="form-group">
            <label for="declineReason">Reason for decline</label>
            <input type="hidden" name="user_id" id="userID" value="<?php echo $user_id; ?>">
            <input type="hidden" name="id" id="declineId" value="">
            <textarea class="form-control" name="reason" id="declineReason" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-warning decline-button" onclick="updateDeclineReason()">Decline</button>
      </div>
    </div>
  </div>
  </div>


  <script>
  function updateDeclineReason() {
    var id = document.getElementById("declineId").value;
    var reason = document.getElementById("declineReason").value;
    var user_id = document.getElementById("userID").value;
    console.log(id);
    if (!$("#declineReason").val()) {
  alert("You need to fill up the input before proceeding");
}else{
    $.ajax({
        type: "POST",
        url: "decline.php",
        data: { id: id, reason: reason, user_id: user_id },
        success: function(data) {
            console.log(data);
            window.location.href = "movein.php";
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
      
    });}
  }
  $('#declineModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body #declineId').val(id)
})
</script>

  </div>
  

  
</div><!-- End Recent Sales -->
       

          

           

          

        

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <!-- <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>--> 

            <!--<div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                  </div>
                </div> End activity item

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Voluptatem blanditiis blanditiis eveniet
                  </div>
                </div> End activity item

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    Voluptates corrupti molestias voluptatem
                  </div>
                </div> End activity item

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                  </div>
                </div>End activity item

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    Est sit eum reiciendis exercitationem
                  </div>
                </div> End activity item

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                  </div>
                </div> End activity item

              </div>

            </div>
          </div> End Recent Activity -->

        
        
       

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer hidden-print">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>