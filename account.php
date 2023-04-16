
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

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.php" class=" d-flex align-items-center">
        <img src="assets/img/logo.png"   style="width:300px;height:60px;">
      
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

   
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

     
        <li class="nav-item dropdown">


        <?php
          $status = "SELECT * FROM admins where id_number = '" . $_SESSION["uname"] . "'";
          $result = mysqli_query($conn, $status);
          $row    = mysqli_fetch_assoc($result);
         ?>
         

        <li class="nav-item dropdown pe-3">
       
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile/<?php echo $row["profile_pic"]; ?>" alt="Profile" class="rounded-circle" style="width:40px;">
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
      <h1>Create Account</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Create Account</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    
    <div class="col-lg-12">
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
        <?php if(isset($_GET['error'])){ ?>
                        <p class="alert alert-danger text-center text-control">
                            <?php echo $_GET['error']; ?>
                        </p>
                        <?php } ?>

                        <?php if(isset($_GET['check'])){ ?>
                        <p class="alert alert-success text-center">
                            <?php echo $_GET['check']; ?>
                        </p>
                        <?php } ?>
                        
                      
            <div class="card recent-sales overflow-auto">
              
                <div class="card-body">
                    <div class="d-flex align-items-center">
                       
                        <form method="post" action="account_process.php" class="row g-3 needs-validation" novalidate>
<?php

$date = date("Y");
$random = substr(md5(mt_rand()), 0, 10);
$all = [$date, $random];

// Combine the elements of the $all array into a string
$combined = implode('', $all);

// Use preg_replace() to remove all non-numeric characters from the string
$numbers_only = preg_replace('/[^0-9]/', '', $combined);

 // Output: e.g. 2023056789
?>


                            <div class="form-group col-sm-12">
                                <label for="idnum1">ID Number :</label>
                                <input type="text" name="id_number" class="form-control" id="id1"  value='<?php echo $numbers_only; ?>'  minlength="5" disabled>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="lname1">Surname:</label>
                                <input type="text" name="lname" class="form-control"  minlength="3"  id="lname1" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="fname1">Firstname: </label>
                                <input type="text" name="fname" class="form-control" minlength="3"  id="fname1" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="mname1">Middle Name:</label>
                                <input type="text" name="mname" class="form-control"  minlength="3"  id="mname1" required>
                            </div>
                            
                            
      
    <div class="row">
      <div class="col-sm">
        <label for="yourName" class="form-label">Gender:</label>
        <select name="gender" class="form-select" id="yourName" required>
        <option value="" hidden default>Choose Gender </option>
          <option value="Male"> Male </option>
          <option value="Female"> Female </option>
     </select>
      </div>
      </div><br><!--End of row-->
      <div class="row">
 
 <div class="col-sm">
   <label for="yourName" class="form-label">User Category:</label>
   <select name="priority" class="form-select" id="yourName" required>
   <option value="" hidden default>Choose User Category</option>
     <option value="Unit Checker">Security Guard</option>
     <option value="Priority 2"> Property and Supply Officer </option>
     <option value="Priority 3"> Head Physical Facilities </option>
     <option value="Priority 4"> College Inspector </option>
     <option value="Priority 5"> Campus Administrator </option>
</select>
 </div>
 </div><br><!--End of row-->
    
 <div class="col-12">
        <button class="btn btn-primary w-100" type="submit" name="submit">Create Account</button>
      </div>    
                </div>
                </div>
              </div>
            </div><!-- End Recent Sales -->
            <!-- Sales Card -->
            <?php
       
       $sql = "SELECT * FROM admins where admin_status = 'Active' ORDER BY surname ASC";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
         
         while($row = $result->fetch_assoc()) {
       ?>
       <div class="col-xxl-4 col-md-6">
         <div class="card info-card sales-card">
        

           <div class="card-body">
           <h5 class="card-title">ID: <?php echo $row["id_number"];?></h5>
          
             <div class="d-flex align-items-center">
               <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                
               <img src="./assets/img/profile/<?= $row["profile_pic"]; ?>"  style = "width:60px;height:60px;" class="rounded-circle">
               </div>
               <div class="">
                <span class="text-muted small pt-2 ps-1"><?php echo $row["surname"]," , ",$row["given_name"]," ", $row["middle_name"] ;?></span><br>
               </div>
             </div>
             
           </div>


          
         </div>
       </div>
       
       <?php
         }
       }
     
           ?><!-- End Sales Card -->

           
          

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
  <footer id="footer" class="footer">
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
<script>
   var add = document.getElementById("id1");
   add.addEventListener("keypress", function(e){
        if(!add.value && e.keyCode === 32){
            e.preventDefault();
        }
    });
    var name1 = document.getElementById("lname1");
    name1.addEventListener("keypress", function(e){
        if(!name1.value && e.keyCode === 32){
            e.preventDefault();
        }
    });
    var name2 = document.getElementById("fname1");
    name2.addEventListener("keypress", function(e){
        if(!name2.value && e.keyCode === 32){
            e.preventDefault();
        }
    });
    var name3 = document.getElementById("mname");
    name3.addEventListener("keypress", function(e){
        if(!name3.value && e.keyCode === 32){
            e.preventDefault();
        }
    });
  </script>
</body>

</html>