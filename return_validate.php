
<?php
include 'assets/connection/connect.php';
session_start();
$name = $_SESSION["uname"];
$pass = $_SESSION["password"];

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
session_destroy();
header("location:index.php");
}
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.php" class=" d-flex align-items-center">
        
<img src="assets/img/logo.png" style="width:300px;height:60px;">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

      <?php
      $status = "SELECT * FROM admins where id_number = '" . $_SESSION["uname"] . "'";
      $result = mysqli_query($conn, $status);
      $row = mysqli_fetch_assoc($result);
      $id_admin = $row["id"];
      ?>
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="assets/img/profile/<?php echo $row["profile_pic"]; ?>" alt="Profile" class="rounded-circle" style="width:40px;">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row["id_number"]; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $row["given_name"], " ", $row["middle_name"], " ", $row["surname"]; ?></h6>
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
              <a class="dropdown-item d-flex align-items-center" href="log-out.php">
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
      <h1>Borrowing Scanning    </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Borrowing Scanning</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
         <!-- Customers Card -->
         <div class="col-xxl">

<div class="card info-card customers-card">

  <div class="card-body">
    <h5 class="card-title">Scan QR Here</h5>
    <form method="post" action="validate_borrow.php">
    <div class="row">
        <div class="col-sm-5 col-md-6">
        <div class="input-group mb-3">
        <input type="text" class="form-control" id="searchInput" placeholder="Search QR number" style="height: 40px;">
  <div class="input-group-append">
    <div class="input-group-text bg-primary" style="height: 40px; border-top-left-radius:0;border-bottom-left-radius:0;">    
                  <a onclick="searchTable()" class="btn btn-primary" style="color:white;" >Search</a></div>
  </div>
</div>
 
 
 <img src="1.jpg" style="border:solid 2px; height: 400px; width: 100%;"><br>
 <br>
 <button type="button" class="btn btn-primary" style="width: 80px;">Back</button>
        </div>
        <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0" style="margin-top:100px;">
   <p>EQUIPMENT SUCCESSFULY RETURNED!</p> 
         </div>
  </div>
 
  </form>
  </div>
</div>

</div><!-- End Customers Card -->
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>CVSU SCANINFO</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
 
  <!-- Template Main JS File -->
 
</body>

</html>

