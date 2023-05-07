
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
  <style>
    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin:2% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
}
.title{
  margin:auto;
  font-size:20px;
  font-weight: bold;
}
.ds{
  margin:auto;
  font-size:15px;
}
/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  position:relative;
  left:95%;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
.but1{
  width:49%;
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:10px;
}
.but1:hover{
  background-color:skyblue;
  color:white;
}
.but2{
  width:49%;
  width:49%;
  border: none;
  color:black;
  background-color: #f4511e;
  opacity: 0.6;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:10px;
}
.but2:hover{
  opacity:1;
  color:white;
}
    </style>

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
        $position = $row["position"];
        $id_admin = $row["id"];
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
  <a class="nav-link collapsed" href="borrowers.php">
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Move In<span> </span></h5>

                  <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-success">
                      <i class="bi bi-person-check" style="color:white;"></i>
                    </div>
                    <div class="ps-3">
                      <?php 
                        $count = "SELECT COUNT(`transaction`) as count FROM gatepass where `transaction` = 'approved' AND `in/out` = 'in' ";
                        $result = mysqli_query($conn, $count);
                        $row  = mysqli_fetch_assoc($result); ?>
                      <h6><?php echo $row["count"];  ?></h6>
                   
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card ">


                <div class="card-body">
                  <h5 class="card-title">Move Out</h5>

                  <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-secondary">
                    <i class="bi bi-person" style="color:white;"></i>
                    </div>
                    <div class="ps-3">
                    <?php 
                        $count = "SELECT COUNT(`transaction`) as count FROM gatepass where `transaction` = 'approved' AND `in/out` = 'out' ";
                        $result = mysqli_query($conn, $count);
                        $row  = mysqli_fetch_assoc($result); ?>
                      <h6><?php echo $row["count"];  ?></h6>
               
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
              <!-- Sales Card -->
              <div class="col-xxl-3 col-md-3">
              <div class="card info-card ">


                <div class="card-body">
                  <h5 class="card-title">Declined</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-danger">
                      <i class="bi bi-person-x" style="color:white;"></i>
                    </div>
                    <div class="ps-3">
                      <?php 
                        $count = "SELECT COUNT(`transaction`) as count FROM gatepass where `transaction` = 'declined' ";
                        $result = mysqli_query($conn, $count);
                        $row  = mysqli_fetch_assoc($result); ?>
                      <h6><?php echo $row["count"];  ?></h6>
                    
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
             <!-- Sales Card -->
             <div class="col-xxl-3 col-md-3">
              <div class="card info-card ">


                <div class="card-body">
                  <h5 class="card-title">Pending</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-warning">
                      <i class="bi bi-gear" style="color:white;"></i>
                    </div>
                    <div class="ps-3">
                    <?php 
                        $count = "SELECT COUNT(`transaction`) as count FROM gatepass where `transaction` = 'pending' and not `gate_cat_2` = 'IN/OUT' ";
                        $result = mysqli_query($conn, $count);
                        $row  = mysqli_fetch_assoc($result); ?>
                      <h6><?php echo $row["count"];  ?></h6>

                    
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

<?php if ($position == "Priority 2"){?>
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card ">


                <div class="card-body">
                  <h5 class="card-title">Item Borrow This Month</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-warning">
                     <i class="bi bi-basket" style="color:white;"></i>
                    </div>
                    <div class="ps-3">
                    <?php 
                        $count = "SELECT COUNT(`transaction`) as count FROM gatepass where `transaction` = 'pending' and not `gate_cat_2` = 'IN/OUT' ";
                        $result = mysqli_query($conn, $count);
                        $row  = mysqli_fetch_assoc($result); ?>
                      <h6><?php echo $row["count"];  ?></h6>
                    
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card ">


                <div class="card-body">
                  <h5 class="card-title">Item Return This Month</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-success">
                     <i class="bi bi-basket" style="color:white;"></i>
                    </div>
                    <div class="ps-3">
                    <?php 
                        $count = "SELECT COUNT(`transaction`) as count FROM gatepass where `transaction` = 'pending' and not `gate_cat_2` = 'IN/OUT' ";
                        $result = mysqli_query($conn, $count);
                        $row  = mysqli_fetch_assoc($result); ?>
                      <h6><?php echo $row["count"];  ?></h6>

                    
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            <div class="col-xxl-3 col-md-4">
              <div class="card info-card ">


                <div class="card-body">
                  <h5 class="card-title">Unreturn Item This Month</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-danger">
                     <i class="bi bi-basket" style="color:white;"></i>
                    </div>
                    <div class="ps-3">
                    <?php 
                        $count = "SELECT COUNT(`transaction`) as count FROM gatepass where `transaction` = 'pending' and not `gate_cat_2` = 'IN/OUT' ";
                        $result = mysqli_query($conn, $count);
                        $row  = mysqli_fetch_assoc($result); ?>
                      <h6><?php echo $row["count"];  ?></h6>

                    
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
<?php }?>

     
  <!-- Recent Sales -->
  <div class="col-12">
              <div class="card recent-sales overflow-auto">

              
              <?php
            
                   if ($position == "Priority 2"){
                    $status = "SELECT `id`,`veri_status`, `id_num`, `sname`, `gname`, `mname`, `status`, `Deparment`
                    FROM borrowers
                    ORDER BY `id` DESC
                    LIMIT 1;";
                    $result = mysqli_query($conn, $status);
                    $row    = mysqli_fetch_assoc($result);
                  
                    if($row['veri_status'] == 'not'){
                   
                    ?>
                    <!-- The Modal -->
                    
                        <div id="myModal" class="modal" id="moodal" style="display:block;">
                        <!-- Modal content -->
                        <div class="modal-content" >
                      
                          
                          <p class="title"><i class="bi bi-question-diamond-fill"></i>  Requesting</p>
                          <p class="ds">Do you want to accept a new borrower?</p>

                         <br>
                          <form method="post" action = "veri_path.php">
                          
                            <input type="hidden" class="form-control" value="<?php echo $last;?>" name="id" readonly><br>
                            <label for="yourName" class="form-label">ID:</label>
                            <input type="text"  class="form-control"  value="<?php echo $row['id_num'];?>" readonly ><br>
                            <label for="yourName" class="form-label">SURNAME:</label>
                            <input type="text"  class="form-control"  value="<?php echo $row['sname'];?>" readonly ><br>
                            <label for="yourName" class="form-label">GIVEN NAME:</label>
                            <input type="text"  class="form-control"  value="<?php echo $row['gname'];?>" readonly ><br>
                            <label for="yourName" class="form-label">MIDDLE NAME:</label>
                            <input type="text"  class="form-control"  value="<?php echo $row['mname'];?>" readonly ><br>
                            <label for="yourName" class="form-label">STATUS:</label>
                            <input type="text"  class="form-control"  value="<?php echo $row['status'];?>" readonly ><br>
                            <label for="yourName" class="form-label">DEPARTMENT:</label>
                            <input type="text"  class="form-control"  value="<?php echo $row['Deparment'];?>" readonly ><br>
                            <input type="submit" value="Yes" name="submit" class="but1">
                            <input type="submit" value="No" name="cancel" class="but2">
                          </form>
                        </div>
                        </div>
                          <script>
                          var modalq = document.getElementById('myModal');
                          console.log(modalq)
                          modalq.style.display = 'block';
                          </script> 
                 <?php
                    }
                   }
                  ?>
                  
                <div class="card-body">
                  <h5 class="card-title">Gate Pass <span>| Move In/Out </span></h5>
            
<div class="input-group mb-3">
<input type="text" class="form-control" id="searchInput" placeholder="search" style="height: 40px;">
  <div class="input-group-append">
    <div class="input-group-text bg-primary" style="height: 40px; border-top-left-radius:0;border-bottom-left-radius:0;">    
                  <a onclick="searchTable()" class="btn btn-primary" >Search</a></div>
  </div>
</div>
                  <table class="table align-middle" >
                    <thead>
                      <tr>
                      <th scope="col" >ID</th>
                        <th scope="col">QR Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Valid Until</th>
                        <th scope="col">Expiration</th>
                        <th scope="col" >Status</th>
                        <th scope="col" colspan="4">Transaction</th>
     
                      </tr>
                    </thead>
                      <?php 

                        $sql = "SELECT * FROM gatepass where NOT `gate_cat_2` = 'IN/OUT' order by `transaction` DESC;";
                        $result = $conn->query($sql);

                              if ($result->num_rows > 0) {
                                // output data of each row
                        while ($row = $result->fetch_assoc()) {
                          $id = $row["id"];
                          date_default_timezone_set('Asia/Kolkata');
                          $date1 = date_create(date("d-m-Y"));
                          $date2 = date_create($row["valid_until"]);
                          $exp = date_diff($date1, $date2);

                          $date_valid = date("m-d-Y", strtotime($row["valid_until"]));
                          ?>
                    <tbody>
                      <tr >
                                  <?php if ($row["in/out"] == "in" || $row["in/out"] == null && $row["transaction"] == "approved") { ?>
                                      <th scope="row"><a href="view.php?id=<?php echo $row["id"]; ?>" style="color:black;font-size:15px;"><?php echo $row["gatepass_id"]; ?></a></th>
                                      <?php } else if ($row["transaction"] == "declined" ) { ?>
                                        <td><a href="view.php?id=<?php echo $row["id"]; ?>" style="color:black;font-size:15px;  font-weight: bold;"><?php echo $row["gatepass_id"]; ?></a></td>
                                        <?php } else if ($row["transaction"] == "pending" ) { ?>
                                          <td><a href="#" style="color:black;font-size:15px;  font-weight: bold;"><?php echo $row["gatepass_id"]; ?></a></td>
                                          <?php }else { ?>
                                        <th scope="row"><a href="viewout.php?id=<?php echo $row["id"]; ?>" style="color:black;font-size:15px;"><?php echo $row["gatepass_id"]; ?></a></th>
                                        <?php } ?>

                                        
                                         <td><img src = "<?php echo $row["qr"]; ?>" style="width:50px;"></a></td>
                                      
                                      
                                      <td><?php echo $row["name"]; ?></a></td>

                                      <td><?php echo $row["valid_until"]; ?></a></td>
                                      <td><?php

                                      if ($row["gate_cat_2"] == "LONG TERM") {
                                        if ($row["transaction"] != "declined") {

                                          echo "N/A";
                                        } else {
                                          echo "Stop Transaction";
                                        }
                                      } else if ($date1 > $date2) {
                                        if ($row["transaction"] == "declined") {
                                          echo "Stop Transaction";
                                        } else {
                                          echo "Expired";
                                        }
                                      } else if ($date1 >= $date2 && $row["transaction"] == "declined") {
                                        echo "Stop Transaction";
                                      } else {
                                        if ($row["transaction"] == "declined") {
                                          echo "Stop Transaction";
                                        } else {
                                          if ($exp->format("%a") < 1) {
                                            echo "Expire today";
                                          } else {
                                            echo $exp->format("%a");
                                          }
                                        }

                                      }
                                      ?></a></td>
                                      <td ><strong><?php echo strtoupper($row["transaction"]); ?></strong></a></td>
                                      <?php if ($row["in/out"] == null || $row["in/out"] == "in") { ?>
                                        <td ><strong><?php echo strtoupper("in"); ?></strong></td>
                                    <?php } else { ?><td ><strong><?php echo strtoupper($row["in/out"]); ?></strong></a></td>
                                      <?php } ?>
                                <?php if ($position == "Unit Checker") {

                                  if ($row["in/out"] == "in") { ?>
                                      <td><a href="print_qr.php?id=<?php echo $row["id"]; ?>" style="margin:5px;" class="btn btn-success"><i class="bi bi-qr-code"></i></a></td>
                                  <?php } elseif ($row["in/out"] == "out") { ?>
                                    <?php if ($row["transaction"] == "pending") { ?>
                                      <td><a href="#?id=<?php echo $row["id"]; ?>" style="margin:5px;" class="btn btn-warning"><i class="bi bi-printer"></i></a></td>
                                    <?php } else { ?>
                                    <td><a href="viewout.php?id=<?php echo $row["id"]; ?>" style="margin:5px;" class="btn btn-secondary"><i class="bi bi-printer"></i></a></td>
                                    <?php } ?>
                                    <?php } elseif ($row["transaction"] == "declined") {
                                    if ($date1 <= $date2) {
                                      ?>
                              <td><form action="requestagain.php" method="POST">
                                <input type="hidden" name="id" value="<?php  echo $row["id"]; ?>">
                                <input type="hidden" name="admin" value="<?php echo $id_admin; ?>">
                                <button type="submit" style="margin:5px;" class="btn btn-danger" name="submit"><i class="bi bi-recycle"></i></a></td>
                                    </form>
                              <?php
                                    } else {
                                      ?>
   <td><a href="#id=<?php echo $row["id"]; ?>" style="margin:5px;" onclick="expiredrequest()" class="btn btn-danger"><i class="bi bi-recycle"></i></a></td>

<?php
                                    }
                                    ?>
                                      
                                      <?php } elseif ($row["in/out"] == null) { ?>
                                        <td><a href="#?id=<?php echo $row["id"]; ?>" style="margin:5px;" onclick= "pending()"class="btn btn-warning"><i class="bi bi-printer"></i></a></td>
                                        <?php } ?>
                     </tr>                    
                    </tbody>
                    <?php
                                }
                        }
} else {
  //echo "0 results";
}
$conn->close();
                              
?>
                  </table>
             
                </div>

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
<script>
  function pending(){
    alert("YOU CAN'T PRINT WHILE TRANSACTION IS PENDING!");
  }
  function expiredrequest(){
    alert("Request Has Ended! You cannot make another request.");
  }
  
  function searchTable() {
  // Get the search query
  var searchQuery = document.getElementById("searchInput").value;

  // Select all the rows of the tbody element
  var rows = document.querySelectorAll("table tbody tr");

  // Iterate through the rows
  for (var i = 0; i < rows.length; i++) {
    // Select all the cells of the row
    var cells = rows[i].querySelectorAll("td");

    // Check if any of the cells contain the search query
    var containsQuery = false;
    for (var j = 0; j < cells.length; j++) {
      if (cells[j].innerHTML.toLowerCase().includes(searchQuery.toLowerCase())) {
        containsQuery = true;
        break;
      }
    }

    // If the row contains the search query or has the thead class, display it, otherwise hide it
    if (containsQuery || rows[i].classList.contains("thead")) {
      rows[i].style.display = "";
    } else {
      rows[i].style.display = "none";
    }
  }
}
// Get the search input field
var searchInput = document.getElementById("searchInput");

// Add an event listener for the keydown event
searchInput.addEventListener("keydown", function(event) {
  // If the key that was pressed was the Enter key (keycode 13), call the searchTable function
  if (event.keyCode === 13) {
    searchTable();
  }
});


  </script>
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

<script src="assets/js/main.js">


</script>

  
</body>

</html>