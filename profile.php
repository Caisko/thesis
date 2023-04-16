
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
  <style>
   .responsive {
  width: 100%;
  height: 55px;;
}

    </style>
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
      <span>Create Accounts</span>
    </a>
  </li><!-- End Register gate pass Nav -->
  <li class="nav-item">
  <a class="nav-link collapsed" href="cvsu_equipment.php">
    <i class="bi bi-card-heading"></i>
    <span>Register Equipment</span>
  </a>
</li><!-- End Register gate pass Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" href="face_registration.php">
  <i class="bi bi-person-bounding-box"></i>
    <span>Register Face</span>
  </a>
</li><!-- End Register gate pass Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" href="borrow_scan.php">
  <i class="bi bi-arrow-bar-right"></i>
    <span>Borrowing Scanning</span>
  </a>
</li><!-- End Register gate pass Nav 
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
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

          <?php 
if(empty($_GET["pop"] )){}else if ($_GET["pop"] == 'update') { ?>
<p class="alert alert-success text-center" style="font-align:center;">Profile Successfuly Changes</a>
<?php
} else { ?><p class="alert alert-danger text-center" style="font-align:center;">Profile Nothing Changes </a><?php } ?>
  


  <?php 
if(empty($_GET["pass"] )){}else if ($_GET["pass"] == 'pass') { ?>
<p class="alert alert-success text-center" style="font-align:center;">Password Successfuly Changes</a>

<?php
}else if ($_GET["pass"] == 'not') { ?>
  <p class="alert alert-warning text-center" style="font-align:center;">Password Not Match </a>
<?php  
} else { ?><p class="alert alert-danger text-center" style="font-align:center;">Current Password Invalid </a><?php } ?>
    
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile/<?php echo $row["profile_pic"]; ?>" alt="Profile" class="rounded-circle">
              <h2 style="text-align: center;"><?php echo $row["given_name"]," ",$row["middle_name"]," ",$row["surname"]; ?></h2>
              <?php if ($row["position"] == "Unit Checker") { ?>
              <h3><?php echo "Security Guard";
              } else if ($row["position"] == "Priority 2"){
                  echo "Property and Supply Officer";
            }else if ($row["position"] == "Priority 3"){
              echo "Head Physical Facilities";
            }
            else if ($row["position"] == "Priority 4"){
              echo "College Inspector";
            }else if ($row["position"] == "Priority 5"){
              echo "Campus Administrator";
            }
            ?>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

             
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                 
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Gender:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["gender"]?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Birthday:</div>
                    <div class="col-lg-9 col-md-8">
                      <?php 
                      $newDate = date("m-d-Y", strtotime($row["birthdate"]));  
                      echo $newDate;  
                      ?>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["address"]?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone Number:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["phone_number"]?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Facebook Link:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["link_fb"]?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email Address:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["email"]?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Signature:</div>
                    <div class="col-lg-9 col-md-8"> <img src="assets/img/sign/<?php echo $row["sign"]; ?>" width="300px" >
               </div>
                  </div>
 

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form id="updateForm" method="post" action="update_profile.php" id="form" enctype="multipart/form-data" class="row g-3 needs-validation">
                  <input name="idnum" type="hidden" class="form-control" id="fullName" value="<?php echo $row["id_number"];?>"> 

                 
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fname" type="text" class="form-control" id="fname1" value="<?php echo $row["given_name"];?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Middle Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mname" type="text" class="form-control" id="mname1" value="<?php echo $row["middle_name"];?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lname" type="text" class="form-control" id="lname1" value="<?php echo $row["surname"];?>">
                      </div>
                    </div>
                 
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                      <div class="col-md-8 col-lg-9">
                      <select class="form-select" name="gender" value='<?php echo $row["gender"]; ?>'>
                      <option value='<?php echo $row["gender"]; ?>' selected  hidden><?php echo $row["gender"]; ?></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Birthdate:</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="date" name="bday" class="form-control" id="Job" value="<?php echo $row["birthdate"]; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="add1" value="<?php  echo $row["address"]; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="phone1" value="<?php  echo $row["phone_number"]; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Email Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="email1" value="<?php  echo $row["email"]; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Facebook Link</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fb" type="text" class="form-control" id="fb1" value="<?php  echo $row["link_fb"]; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">SIGNATURE:</label>
                      <div class="col-md-8 col-lg-9">
                      <input  accept="png"  class="form-control" name="sig" id="imgIn" type="file" >
                        
                      </div>
                    </div>

               
                  
                    <div class="text-center">
                    <button type="submit" name="update" class="btn btn-primary" name="update">Update</button>
                    </div>
                  </form>
                  <!-- End Profile Edit Form -->
               <script>
                 document.getElementById("fname1").addEventListener("keypress", function(e){
                          if(!document.getElementById("fname1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
                      document.getElementById("mname1").addEventListener("keypress", function(e){
                          if(!document.getElementById("mname1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
                        document.getElementById("lname1").addEventListener("keypress", function(e){
                          if(!document.getElementById("lname1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
                        document.getElementById("email1").addEventListener("keypress", function(e){
                          if(!document.getElementById("email1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
                        document.getElementById("fb1").addEventListener("keypress", function(e){
                          if(!document.getElementById("fb1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
                        document.getElementById("add1").addEventListener("keypress", function(e){
                          if(!document.getElementById("add1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
                        document.querySelector("#phone1").addEventListener("keydown", function(e){
                          if(e.keyCode === 8 && this.value === '09'){
                            e.preventDefault();
                          }
                        });

                        document.querySelector("#phone1").addEventListener("keyup", function(){
                          if(this.value.length > 11 || isNaN(this.value) || (this.value.slice(0,2) != '09' && this.value.length>2)){
                            this.value = this.value.slice(0,11);
                          }
                        });
                        document.querySelector("#phone1").addEventListener("input", function(){
                          if(this.value.slice(0,2) !== '09'){
                            this.value = '09'+this.value.replace(/[^0-9]/g, "");
                          }else{
                            this.value = this.value.replace(/[^0-9]/g, "");
                          }
                        });
                        document.querySelector("#form").addEventListener("submit", function(e){
                          if(document.querySelector("#phone1").value.length !== 11){
                            e.preventDefault();
                            document.querySelector("#error-msg").style.display = "block";
                          }else{
                            document.querySelector("#error-msg").style.display = "none";
                          }
                        });
                </script>

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" value="Save Changes">
                    </div>
                  </form>
                  End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="post" action="password_update.php">
  <input name="idnum" type="hidden" class="form-control"  value="<?php echo $row["id_number"];?>">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password"  class="form-control" id="currentPassword1" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword1" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword1" required>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->
<script>
    document.getElementById("currentPassword1").addEventListener("keypress", function(e){
                          if(!document.getElementById("currentPassword1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
                        document.getElementById("newPassword1").addEventListener("keypress", function(e){
                          if(!document.getElementById("newPassword1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
                        document.getElementById("renewPassword1").addEventListener("keypress", function(e){
                          if(!document.getElementById("renewPassword1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
  </script>
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

              

          
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center bg-success"><i class="bi bi-arrow-up-short"></i></a>

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