
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
      <a class=" d-flex align-items-center">
        
<img src="assets/img/logo.png" style="width:300px;height:60px;"  onclick="myFunction(); return false;">
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

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile"  >
            <li class="dropdown-header">
              <h6><?php echo $row["given_name"], " ", $row["middle_name"], " ", $row["surname"]; ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider"  >
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" >
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" >
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center"">
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
    <a class="nav-link collapsed">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

<?php if ($row["position"] == "Priority 2") { ?>
  <li class="nav-item">
    <a class="nav-link collapsed" >
      <i class="bi bi-person-square"></i>
      <span>Create Accounts</span>
    </a>
  </li><!-- End Register gate pass Nav -->
  <li class="nav-item">
  <a class="nav-link collapsed" >
    <i class="bi bi-card-heading"></i>
    <span>Register Equipment</span>
  </a>
</li><!-- End Register gate pass Nav -->

<li class="nav-item">
  <a class="nav-link collapsed">
  <i class="bi bi-person-bounding-box"></i>
    <span>Register Face</span>
  </a>
</li><!-- End Register gate pass Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" >
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
  <a class="nav-link collapsed" >
    <i class="bi bi-archive"></i>
    <span>Records</span>
  </a>
</li><!-- End Register gate pass Nav -->
<li class="nav-item">
  <a class="nav-link collapsed" >
  <i class="bi-list-check"></i>
    <span>Inventory</span>
  </a>
</li><!-- End Register gate pass Nav -->

  <?php } else if ($row["position"] == "Unit Checker") {  ?>
  <li class="nav-item">
    <a class="nav-link collapsed" >
      <i class="bi bi-credit-card-2-front"></i>
      <span>Register Gate Pass</span>
    </a>
  </li><!-- End Register gate pass Nav --> 

  <?php } ?>
  <li class="nav-item">
    <a class="nav-link collapsed" >
      <i class="bi bi-check-square"></i>
      <span>Move In  Gate Pass</span>
    </a>
  </li><!-- End Register gate pass Nav --> 
  
  <li class="nav-item">
    <a class="nav-link collapsed" >
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
      <h1>Gatepass Register</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a >Home</a></li>
          <li class="breadcrumb-item active">Gatepass Register</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
         <!-- Customers Card -->

<div class="row">
    <div class="col">
        <div class="card info-card customers-card">
            <div class="card-body">
        <?php 
       $eto = $_GET["id"];
          $checking = "SELECT gatepass.id,unit_number.id as unitid, unit_number.unit_num_serial as serial_num, unit_number.quantity as quan, unit_number.description as description,gatepass.gatepass_id as gate_id  FROM gatepass INNER JOIN unit_number ON gatepass.id = unit_number.user_id where unit_number.id = '$eto'";
      $result = mysqli_query($conn, $checking);
      $row = mysqli_fetch_assoc($result);
    $gated=  $row["gate_id"];
      ?>
                <h5 class="card-title"></h5>
                    <a href="item.php?id=<?php echo $gated;?>"class="btn btn-danger " type="submit" name="submit" ><i class="bi-arrow-left"></i> Cancel</a>
                <br>
                <br>

                <?php 
                if(isset($_POST["update"])){
               $unit = $_POST["unit"];
               $quan =  $_POST["quantity"];
               $desc =  $_POST["desc"];


               if($row["serial_num"] !== $unit || $row["quan"] !== $quan || $row["description"] !==  $desc){
                $status = "SELECT * FROM unit_number where unit_num_serial = '$unit'";
                $result = mysqli_query($conn, $status);
                $row = mysqli_fetch_assoc($result);

                  if ($row["unit_num_serial"] == $unit) {
                    header("location:item.php?error=$gated");
                  }else{
                    $sql = "UPDATE `unit_number` SET `unit_num_serial`='$unit',`quantity`='$quan',`description`='$desc' WHERE `id` = '$eto'";
                    if ($conn->query($sql) === TRUE) {
                        header("location:item.php?check=$gated");
                        
                    } else {
                      echo "Error updating record: " . $conn->error;
                    }
                  }

                  if(empty($unit)){
                    $sql = "UPDATE `unit_number` SET `unit_num_serial`='$unit',`quantity`='$quan',`description`='$desc' WHERE `id` = '$eto'";
                    if ($conn->query($sql) === TRUE) {
                        header("location:item.php?check=$gated");
                        
                    } else {
                      echo "Error updating record: " . $conn->error;
                    }
                  
                }
                
            }else{
                    header("location:item.php?error=$gated");
                }

               
            
                
            }
                ?>

                <form autocomplete="off" class="form-control" role="form"  method="post">
                    <div class="form-group">
                    <?php if (!empty($_GET["id"])){ ?>
                    <input type="hidden" name="id" class="form-control" value ="<?php echo $_GET["id"];  ?>">
                <?php } ?>
                    <?php   if (!empty($_GET["error"])){ ?>
                    <input type="hidden" name="error" class="form-control" value ="<?php echo $_GET["error"];  ?>">
                    <?php } ?>
                    <?php if (!empty($_GET["check"])){ ?>
                    <input type="hidden" name="check" class="form-control" value ="<?php echo $_GET["check"]; ?>">
                    <?php } ?>
                        <label for="unit">Unit/ Serial number:</label>
                        <input type="text" id="unit1" class="form-control" name="unit" pattern="[^\s]+"  placeholder="Optional" value="<?php echo $row["serial_num"];?>">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quan1" class="form-control" name="quantity" min ="1" value="<?php echo $row["quan"];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description:</label>
                        <textarea class="form-control" name="desc" id="desc1" required><?php echo $row["description"];?></textarea>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <button class="btn btn-primary w-100" type="submit" name="update" >Update</button>
                     
                    </div>
                </form>
                <script>
    var unit = document.getElementById("unit1");
    var quan = document.getElementById("quan1");
    var desc = document.getElementById("desc1");
    if(unit.value){
        quan.readOnly = true;
        quan.value = 1;
    }

    unit.addEventListener("input", function(){
        if(unit.value){
            quan.readOnly = true;
            quan.value = 1;
        }else{
            quan.readOnly = false;
            quan.value = "";
        }
    });
    if(!unit.value){
        unit.addEventListener("keypress", function(e){
            if(e.keyCode === 32){
                e.preventDefault();
            }
        });
    }

    unit.addEventListener("input", function(){
        if(unit.value){
            unit.removeEventListener("keypress", preventSpace);
        }else{
            unit.addEventListener("keypress", preventSpace);
        }
    });

    desc.addEventListener("input", function(){
        if(desc.value){
            desc.removeEventListener("keypress", preventSpace);
        }else{
            desc.addEventListener("keypress", preventSpace);
        }
    });


    function preventSpace(e){
        if(e.keyCode === 32){
            e.preventDefault();
        }
    }
</script>

        <br>
    
   

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
 
</body>

</html>

