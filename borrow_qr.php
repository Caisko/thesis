

<?php
include 'assets/connection/connect.php';
session_start();

if (!isset($_SESSION['pincode']) && !isset($_SESSION['true'])) {
session_destroy();
header("location:borrowers.php");
}

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
<style>
  .responsive video#qrScanner {
    transform: scaleX(-100%);
}
  </style>
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
    <li class="nav-item dropdown pe-3">
    <a class="dropdown-item d-flex align-items-center" href="pin_exit.php">
      <span class="d-none d-md-block ps-2">
       <i class="bi bi-box-arrow-right"></i>Sign Out</span>
</a>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->



 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">




<li class="nav-item">
  <a class="nav-link collapsed" href="face_registration.php">
  <i class="bi bi-person-bounding-box"></i>
    <span>Add Borrowers</span>
  </a>
</li><!-- End Register gate pass Nav -->


<li class="nav-item">
  <a class="nav-link collapsed" href="face_registration.php">
  <i class="bi bi-person-bounding-box"></i>
    <span>Borrowing Item</span>
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
      <h1>Borrowing Scanning</h1>
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
        <input type="text" class="form-control" id="searchInput" placeholder="Search QR Number" style="height: 40px;">
  <div class="input-group-append">
    <div class="input-group-text bg-primary" style="height: 40px; border-top-left-radius:0;border-bottom-left-radius:0;">    
                  <a onclick="searchTable()" class="btn btn-primary" style="color:white;" >Search</a></div>
                  </form>
                </div>
                <script src="html5-qrcode.min.js" ></script>

</div>
<form>
</form>

<div class="responsive" id="reader"></div><br>
<form action="" >
 <input type="text" id="get" name="qr" onkeyup="showHint(this.value)"  class="form-control" readonly/>
  </form>

  <div class="row text-control" id="display">
         <!-- Display Ajax -->
    </div>

        </div>
        <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0" style="margin-top:100px;">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">QTY</th>
      <th scope="col">Equipment</th>
      <th scope="col">Description</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>printer</td>
      <td>epson l300</td>
      
    </tr>
  
  </tbody>
</table>
            <button type="submit" class="btn btn-primary " style="margin-top: 240px;width:200px;float:right;">Proceed</button>
         </div>
  </div>
 

  
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

  <script src="assets/js/main.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script type="text/javascript">
         function onScanSuccess(qrCodeMessage) {
             document.getElementById("get").value = qrCodeMessage;
             showHint(qrCodeMessage);
        
         
         }
         function onScanError(errorMessage) {
           //handle scan error
         }
         var html5QrcodeScanner = new Html5QrcodeScanner(
             "reader", { fps: 5, qrbox: 250 });
         html5QrcodeScanner.render(onScanSuccess, onScanError);
         
      </script>
   <script>
  function showHint(str) {
    if (str.length == 0) {
      document.getElementById("display").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("display").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "borrow_item_process.php?id="<?php echo $_GET['label']; ?>"&insert=" + str, true);
      xmlhttp.send();
    }
  }
</script>

</body>

</html>

