
<?php
include 'assets/connection/connect.php';
session_start();

if (!isset($_SESSION['pincode']) && !isset($_SESSION['true'])) {
session_destroy();
header("location:borrowers.php");
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

  <style>
    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
text-align: center;
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 100px;
  border: 1px solid #888;
  width: 50%;
  height:250px;
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
      <h1>Register Borrowers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Register Borrowers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
         <!-- Customers Card -->
         <div class="col-xxl">

<div class="card info-card customers-card">

  <div class="card-body">
    <h5 class="card-title"><span></span></h5>

    <!-- The Modal -->
 <div id="myModal" class="modal">
<!-- Modal content -->
<div class="modal-content">
  <p>SUCCESSFULLY REGISTER WAIT FOR ADMIN APPROVAL</p>
</div>
</div>
<?php
// Set the time interval for refreshing the database (in milliseconds)
$refreshInterval = 10000; // 10 seconds

// Define an empty query string
$query_string = "";

// Check if the 'id' parameter is set in the URL
if(isset($_GET['id'])){
  $id = $_GET['id'];

  // Query the database for the status of the borrower
  $status = "SELECT * FROM borrowers where id_num = '$id'";
  $result = mysqli_query($conn, $status);
  $row = mysqli_fetch_assoc($result);
  $stats = $row['veri_status'];

  // Output the borrower ID
  $id = $row['id_num'];
  $gname = $row['gname'];
  $sname = $row['sname'];
  $mname = $row['mname'];
  $query_string = http_build_query(array(
    'id' => $id,
    'sname'  =>  $sname,
    'gname'  =>  $gname,
    'mname'  =>  $mname
  ));
  
  // Check if the borrower is verified
  if($stats == 'verified'){
    // Set a flag to force a page refresh
    echo "<script>window.refreshPage = true;</script>";
  }
}

// Check if the 'modal' parameter is set in the URL
if(isset($_GET['modal']) && $_GET['modal'] == 'true'){
  echo "<script>
    var modalq = document.getElementById('myModal');
    modalq.style.display = 'block';
    var stats = '$stats';
  </script>";
  
} elseif(isset($stats) && $stats == 'verified'){
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Redirect the user to registerface.html with form data
    $query_string = http_build_query(array(
      'id' => $id,
      'sname'  =>  $sname,
      'gname'  =>  $gname,
      'mname'  =>  $mname
    ));
    header("Location: http://Localhost:5000/registerface.html?" . $query_string);
    exit;
  }
}

// Periodically refresh the page
echo "<script>
  var refreshIntervalId = setInterval(function(){
    if(window.refreshPage) {
      // Reload the page with the updated query string
      window.location.href = 'http://localhost:5000/registerface.html?" . $query_string . "';
    
    } else {
      clearInterval(refreshIntervalId);
    }
  }, $refreshInterval);
</script>";
?>

    <div class="d-flex align-items-center">

 
   <form autocomplete="off" class="form-control" role="form" action = "requesting.php" method="post">

     <div class="row">
   <div class="col-sm">
       <label for="yourName" class="form-label">Academics/Non Academic Category:</label>
       <select class="form-control" id="gate" name="cat" onclick="gatepass1()"   >
       <option value="" selected disabled hidden>Choose User Category</option>
        <option value="academic" >Academic</option>
        <option value="non academic" >Non Academic</option>
     
     </select>
     </div>
     </div>
     <div class="row">
  
   <div class="col-sm">
       <label for="yourName" class="form-label">ID Number:</label>
       <input type="text"  class="form-control" name="id_num" id="id" required >
     </div>
    
     </div>
     <div class="row">
     <div class="col-sm">
       <label for="yourName" class="form-label">Surname: </label>
       <input type="text" class="form-control" id="yourName" name="sname"  required>
     </div>
     
   <div class="col-sm">
       <label for="yourName" class="form-label">Given Name:</label>
       <input type="text"  class="form-control" name="gname"  required >
     </div>
     <div class="col-sm">
       <label for="yourName" class="form-label">Middle Name:</label>
       <input type="text"  class="form-control" name="mname"   required>
     </div>
     </div>
   
     <div class="row">
 
   <div class="col-sm">
   <label for="yourEmail" class="form-label">Status:</label>
        <select class="form-control"  name="status1" required>
        <option value="" selected disabled hidden>Choose Status</option>
        <option value="Permanent">Permanent</option>
        <option value="Temporary">Temporary</option>
        <option value="Contractual">Contractual</option>
        <option value="Contractual of Service">Contractual of Service</option>
     </select>
     </div>
  
     
     </div><!--End of row-->
     <div class="row">
 
     <div class="col-sm">
   <label for="yourEmail" class="form-label">Department:</label>
   <input type="text"  class="form-control" name="dep" id="id" required >
     </div>
     
     </div><br>
      <div class="col-12">
        <button class="btn btn-primary w-100" type="submit"  name="submit">Register</button>
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
  <script src="assets/js/main.js"></script>
  <script>
           
           function gatepass1() {
              var gate1 = document.getElementById("gate").value;
             
              console.log(gate1); 
              if(gate1 == "Teacher"){
                document.getElementById("course1").disabled = true;
                document.getElementById("yr1").disabled = true;
                document.getElementById("section1").disabled = true;
                document.getElementById("store").disabled = true;
              }else if(gate1 == "Owner"){
                document.getElementById("course1").disabled = true;
                document.getElementById("yr1").disabled = true;
                document.getElementById("section1").disabled = true;
                document.getElementById("store").disabled = false;
              } else if(gate1 == "Student"){
                document.getElementById("store").disabled = true;
                document.getElementById("course1").disabled = false;
                document.getElementById("yr1").disabled = false;
                document.getElementById("section1").disabled = false;
              }
            }
            
                  
            function serial(){
              var serial1 = document.getElementById("serial1").value;
              if(serial1 == 1){
                document.getElementById("unit").readOnly = false;
                
              }else{
                document.getElementById("unit").readOnly = true;
                
              }
            }

            function tech(){
              var tech2 = document.getElementById("technical").value;
              if(tech2 == 1){
                document.getElementById("tech1").readOnly = false;
                
              }else{
                document.getElementById("tech1").readOnly = true;
                
              }
            }
                       
                       
            function cat(){
              var cat = document.getElementById("gate_cat").value;
              if(cat == "VALID UNTIL"){
                document.getElementById("valid").readOnly = false;
                
              }else{
                document.getElementById("valid").readOnly = true;
                
              }
            }

        </script>
</body>

</html>

