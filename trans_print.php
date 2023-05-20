
<?php

include 'assets/connection/connect.php'; // Include the connection file or establish a database connection
session_start();
if (!isset($_GET['label']) || $_GET['label'] == ''|| !isset($_GET['name'])|| $_GET['label'] == '' && empty($_GET['session']) != true) {
  $label = $_GET['label'];
$name = $_GET['name'];
session_destroy();
header("Location: borrowers.php");
exit();
}else{
  $label = $_GET['label'];
  $name = $_GET['name'];

  $sql_to_know ="SELECT * from borrowers where `id_num` = '$label';";
  $result = mysqli_query($conn, $sql_to_know);
  $row = mysqli_fetch_assoc($result);
  if($row['id_num'] != $label){
    session_destroy();
  header("Location: borrowers.php");
  exit();
  }
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


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body >

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between" class="hidden-print">
<a href="borrow_qr.php?name=<?php echo $name; ?>&label=<?php echo $label; ?>" class=" d-flex align-items-center">
    
<img src="assets/img/logo.png" style="width:300px;height:60px;" class="hidden-print">
  </a>

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
  <a class="nav-link collapsed" href="borrow_qr.php">
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
      <h1 class="hidden-print">QR Code</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item hidden-print"><a href="borrow_qr.php" class="hidden-print">Home</a></li>
          <li class="breadcrumb-item active hidden-print">QR Code</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
  <!-- Recent Sales -->
 
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title hidden-print">Borrower <span>| QR Code</span></h5>
                  <div class="row" style="width:400px;position:absolute;left:50px;">
<img src="assets/img/logo.png"  >
</div>
<div class="row">
 
    <?php  $qr = $_GET["print"];?>
    <?php
    $status = "SELECT * from item_borrow where `qr_print`= '$qr'";
     $result = mysqli_query($conn, $status);
     $row    = mysqli_fetch_assoc($result);
     $date_borrow = $row['date_borrow'];
     $date_return = $row['date_return'];
     $id_num = $row['borrower_id_num'];
    ?>
   <div style="position:relative; float:right;">
  <img src="<?php echo $qr; ?>" style="width:100px; position:absolute; right:0;"><br>
  <p style="text-align:right;margin-top:80px;">Transaction ID:</p><br>
  <p style="font-weight: bold; text-align:right;margin-top:-20px;">
    <?php echo $trans = $row['transaction']; ?>
  </p>
  <?php
   $status = "SELECT * from borrowers where `id`= '$id_num'";
   $result = mysqli_query($conn, $status);
   $row    = mysqli_fetch_assoc($result);
  ?>
  <p style="font-size:16px;">Borrowers Name: <?php echo $row['sname'],",",$row['gname']," ",$row['mname'];?></p>
  <p style="font-size:15px;">Date Borrow: <?php echo $date_borrow;?></p>
  <p style="font-size:15px;">Date Return: <?php echo $date_return;?></p>
</div>

    <table class="table" id="myTable" >
  <thead>
    <tr>
      <th scope="col">QTY</th>
      <th scope="col">Equipment</th>
      <th scope="col">Description</th>
    
     
    </tr>
  </thead>
  <?php

    $sql = "SELECT b.id, b.id_num, i.borrower_id_num as bnum,i.id as id_del,i.status as stats,i.qr_id_cvsu ,i.quantity as quan, ce.id as ced,ce.serial as se , ce.item_name as name1, ce.description as desc1,ce.quantity as quantity FROM item_borrow as i JOIN borrowers as b ON i.borrower_id_num = b.id JOIN cvsu_equipment as ce ON ce.id = i.qr_id_cvsu WHERE `transaction`= '$trans' group by ce.id ";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
  ?>
  <tbody>
    <tr>
      
      <th scope="row"><?php echo $row['quan'];?></th>
      <td><?php echo $name1 = $row['name1'];?></td>
      <td><?php echo $row['desc1'];?></td>

    </tr>
  
  </tbody>
  <?php
   }
  } else {
    
  }
  ?>
</table>
</div>

<input class="btn btn-primary w-100 hidden-print" type="button" onclick="printAndRedirect()" value="Print QR Code">

<script>
function printAndRedirect() {
  // Kunin ang reference sa current window
  var currentWindow = window;

  // I-print ang QR code
  window.print();
  
  // I-close ang popup window
  currentWindow.close();

  // I-redirect ang user sa desired URL
  window.location.href = "../thesis/borrow_qr.php";
}
</script>
   
      
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
  <script src="assets/js/main.js">
    // Kunin ang reference sa current window

  </script>

</body>

</html>