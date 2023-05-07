
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
      $position = $row["position"];
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
      <h1>Add Equipment</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Add Equipment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
         <!-- Customers Card -->
         <div class="col-xxl">

<div class="card info-card customers-card">

  <div class="card-body">
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
             
                 <div id="myModal" class="modal">
                 <!-- Modal content -->
                 <div class="modal-content">
               
                   
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
    <h5 class="card-title"><span></span></h5>

    <div class="d-flex align-items-center">
  <?php 
  include "phpqrcode/qrlib.php";
  $PNG_TEMP_DIR = 'temp/';

  if (!file_exists($PNG_TEMP_DIR)) {
      mkdir($PNG_TEMP_DIR);
  }
  $filename = $PNG_TEMP_DIR . 'QR.png';
  if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $equipment = $_POST['equipment'];
    $new_cat = $_POST['new_cat'];
    $item = $_POST['item_name'];
    $serial = $_POST['serial'];
    $quantity = $_POST['quantity'];
    $description = $_POST['desc'];
    $codeString =  $_POST["id"];
            

    $filename = $PNG_TEMP_DIR . 'Qr' . md5($codeString) . '.png';

    QRcode::png($codeString, $filename);
      if(!empty($new_cat)){
        $check1 = "SELECT * FROM item_category";
        $result = mysqli_query($conn, $check1);
        $row = mysqli_fetch_assoc($result);
        if($row['category_name'] != $new_cat){
        $sql = "INSERT INTO item_category (category_name)
        VALUES ('$new_cat')";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
      else{
        echo "not";
      }
    }

    $check2 = "SELECT * from cvsu_equipment";
    $result = mysqli_query($conn, $check2);
    $row = mysqli_fetch_assoc($result);
    if($row['serial'] != $serial){
      $sql = "INSERT INTO `cvsu_equipment`(`qr_id`, `equipment`, `category`, `item_name`, `serial`, `quantity`, `description`,`qr`) VALUES 
      ('$id','$equipment','$new_cat','$item','$serial','$quantity','$description','$filename')";
      if ($conn->query($sql) === TRUE) {
        header("Location: cvsu_printqr.php?id=$id");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    

  }
  
  ?>
   <form autocomplete="off" class="form-control" role="form"  method="post">
   <?php
$date = "CVSU";
$dash = "QRprop";
$random = substr(md5(mt_rand()), 0, 7);
$all = [$date, $dash, $random];
?>

<div class="row">
   <div class="col-sm">
       <label for="yourName" class="form-label"> ID:</label>
       <input type="text" name="id" class="form-control" id="yourName" value='<?php echo $all[0], $all[1], $all[2]; ?>' readonly>
      </div>
     </div>          
     <div class="row">
  <div class="col-sm">
    <label for="yourName" class="form-label">Equipment Category:</label>
    <select class="form-control" id="equipt_cat" name="equipment" onclick="newca()" required>
      <option value="" selected disabled hidden>Choose Category</option>
      <?php 
      $sql = "SELECT * FROM item_category";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo $row["category_name"]; ?>"><?php echo $row["category_name"]; ?></option>
         <?php
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
      <option value="">Add New Category</option>
    </select>
  </div>
</div>



<div class="row">
  <div class="col-sm">
    <label for="yourName" class="form-label" id="label_cat" style="display: none;">Add new Category:</label>
    <input type="text" class="form-control" name="new_cat" id="new_cat" style="display: none;" >
  </div>
</div>

<div class="row">
  <div class="col-sm">
    <label for="yourName" class="form-label" >Item name:</label>
    <input type="text" class="form-control" name="item_name" id="item" required>
  </div>
</div>

 
      <div class="row">
      <div class="col-sm">
        <label for="yourName" class="form-label" >Serial:</label>
        <select class="form-control" id="serial1" onclick="unit3()" required >
       <option value="" selected disabled hidden>Choose Serial Category</option>
        <option value="serial" >with Serial Number</option>
        <option value="no serial" >Without Serial Number</option>
     </select>
      </div>

    
      </div><!--End of row-->
      

      <div class="row">
      <div class="col-sm">
        <label for="yourName" class="form-label" style="display: none;" id="unit1">Unit/ Serial number:</label>
        <input type="text" id="unit" class="form-control" name="serial" style="display:none;" readonly>
      </div>
   
      </div><!--End of row-->
      <div class="row">
      
      <div class="col-sm">
        <label for="yourName" class="form-label">Quantity:</label>
        <input type="text" id="unit" class="form-control" name="quantity" required>
      </div>
      </div><!--End of row-->

      <div class="col-sm">
        <label for="yourEmail" class="form-label">Description:</label>
       <textarea class="form-control" name="desc"></textarea>

      </div>
      </div><!--End of row--><br>
      <div class="col-12">
        <button class="btn btn-primary w-100" type="submit" name="submit">Generate</button>
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
  function newca() {
    var equipt_cat = document.getElementById("equipt_cat").value;
    console.log(equipt_cat);
    if (equipt_cat == "") {
      document.getElementById("label_cat").style.display = "block";
      document.getElementById("new_cat").style.display = "block";
    } else {
      document.getElementById("label_cat").style.display = "none";
      document.getElementById("new_cat").style.display = "none";
    }
  }
  function unit3(){
    var serial = document.getElementById("serial1").value;
    console.log(equipt_cat);
    if(serial == "serial"){
      document.getElementById("unit").style.display = "block";
      document.getElementById("unit1").style.display = "block";
      document.getElementById("unit").readOnly = false;
    }else{
      document.getElementById("unit").style.display = "none";
      document.getElementById("unit1").style.display = "none";
      document.getElementById("unit").readOnly = true;
      document.getElementById("unit").value = "";
    }
  }
</script>
</body>

</html>

