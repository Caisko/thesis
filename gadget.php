
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
 
  </style>
</head>

<body onload="document.getElementById('valid').min = new Date().toISOString().split('T')[0];">

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
  <a class="nav-link collapsed" href="return_item.php">
  <i class="bi bi-person-bounding-box"></i>
    <span>Returning Item</span>
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
      <h1>Register Gate Pass</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Register Gate Pass</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php
     include 'assets/connection/connect.php';
     include "phpqrcode/qrlib.php";
     $PNG_TEMP_DIR = 'temp/';

     if (!file_exists($PNG_TEMP_DIR)) {
         mkdir($PNG_TEMP_DIR);
     }
     $filename = $PNG_TEMP_DIR . 'QR.png';
     if (isset($_POST["submit"])) {
         if (empty($_POST["store"]) && $_POST["gatepass"] == "Student") {
             $_POST["store"] = null;
             $codeString =  $_POST["gate_id"];
            

             $filename = $PNG_TEMP_DIR . 'Qr' . md5($codeString) . '.png';

             QRcode::png($codeString, $filename);
             $gate_id = $_POST["gate_id"];
             $tc = $_POST["technical_check"];
             $gatepass = $_POST["gatepass"];
             $gatepass2 = $_POST["gatepass_cat"];
             $id = $_POST["id_num"];
             $fname = $_POST["fname"];
             $course = $_POST["course"];
             $yr = $_POST["yr"];
             $section = $_POST["section"];
             $address = $_POST["address"];
             $store = $_POST["store"];
             $date = $_POST["date"];
             $valid_until = $_POST["valid"];
             $phone = $_POST["phone"];
            
             echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" style="width:250px;margin:auto;" hidden>';
             $sql = "INSERT INTO `gatepass`(`gatepass_id`,`gatepass_cat`,`gate_cat_2`, `id_number`, `name`, `course`, `yr`, `section`, `address`, `date_register`,`valid_until`, `phone_number`, `qr`,`name_store`,`gatepass_status`,`transaction`,`in/out`,`fk_admins`,`technical_name`) 
  VALUES ('$gate_id','$gatepass','$gatepass2','$id','$fname','$course','$yr','$section','$address','$date','$valid_until','$phone','$filename',NULL,NULL,NULL,NULL,(SELECT id FROM admins where id =  '$id_admin'),'$tc')";
             if ($conn->query($sql) === true) {
                       header("Location: item.php?id=$gate_id");
                   } else {
                     echo "Error: " . $sql . "<br>" . $conn->error;
                   }
                 
         } elseif (empty($_POST["store"]) && empty($_POST["course"]) && empty($_POST["yr"]) && empty($_POST["section"]) && $_POST["gatepass"] == "Teacher") {
             $_POST["store"] = null;
             $_POST["course"] = null;
             $_POST["yr"] = null;
             $_POST["section"] = null;
             $codeString =  $_POST["gate_id"];
             $filename = $PNG_TEMP_DIR . 'Qr' . md5($codeString) . '.png';
             QRcode::png($codeString, $filename);
             $tc = $_POST["technical_check"];
             $gate_id = $_POST["gate_id"];
             $gatepass = $_POST["gatepass"];
             $gatepass2 = $_POST["gatepass_cat"];
             $id = $_POST["id_num"];
             $fname = $_POST["fname"];
             $address = $_POST["address"];
             $date = $_POST["date"];
             $valid_until = $_POST["valid"];
             $phone = $_POST["phone"];
           
             echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" style="width:250px;margin:auto;" hidden>';

           
                 $sql = "INSERT INTO `gatepass`(`gatepass_id`,`gatepass_cat`,`gate_cat_2`, `id_number`, `name`, `course`, `yr`, `section`, `address`, `date_register`,`valid_until`, `phone_number`, `qr`,`name_store`,`gatepass_status`,`transaction`,`in/out`,`fk_admins`,`technical_name`) 
VALUES ('$gate_id','$gatepass','$gatepass2','$id','$fname',NULL,NULL,NULL,'$address','$date','$valid_until','$phone','$filename',NULL,NULL,NULL,NULL,(SELECT id FROM admins where id =  '$id_admin'),'$tc')";
                 if ($conn->query($sql) === true) {
                    header("Location: item.php?id=$gate_id");
                 } else {
                     echo "Error: " . $sql . "<br>" . $conn->error;
                 }
           
         } elseif (empty($_POST["course"]) && empty($_POST["yr"]) && empty($_POST["section"]) && $_POST["gatepass"] == "Owner") {
             $_POST["course"] = null;
             $_POST["yr"] = null;
             $_POST["section"] = null;

             $codeString =  $_POST["gate_id"];
            

             $filename = $PNG_TEMP_DIR . 'Qr' . md5($codeString) . '.png';

             QRcode::png($codeString, $filename);
             $tc = $_POST["technical_check"];
             $gate_id = $_POST["gate_id"];
             $gatepass = $_POST["gatepass"];
             $gatepass2 = $_POST["gatepass_cat"];
             $id = $_POST["id_num"];
             $fname = $_POST["fname"];
             $store = $_POST["store"];
             $address = $_POST["address"];
             $date = $_POST["date"];
             $valid_until = $_POST["valid"];
             $phone = $_POST["phone"];
         
             echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" style="width:250px;margin:auto;" hidden>';
         
                 $sql = "INSERT INTO `gatepass`(`gatepass_id`,`gatepass_cat`,`gate_cat_2`, `id_number`, `name`, `course`, `yr`, `section`, `address`, `date_register`,`valid_until`, `phone_number`, `qr`,`name_store`,`gatepass_status` ,`transaction`,`in/out`,`fk_admins`,`technical_name`) 
VALUES ('$gate_id','$gatepass','$gatepass2','$id','$fname',NULL,NULL,NULL,'$address','$date','$valid_until','$phone','$filename','$store',NULL,NULL,NULL,(SELECT id FROM admins where id =  '$id_admin'),'$tc')";
                 if ($conn->query($sql) === true) {
                    header("Location: item.php?id=$gate_id");
                 } else {
                     echo "Error: " . $sql . "<br>" . $conn->error;
                 }
           
            
         }
      
}
     ?>

    <section class="section">
         <!-- Customers Card -->
         <div class="col-xxl">

<div class="card info-card customers-card">

  <div class="card-body">
    <h5 class="card-title"><span></span></h5>

    <div class="d-flex align-items-center">
  
   <form autocomplete="off" class="form-control" role="form"  method="post" id="form">

  
<?php
$date = "CVSU";
$dash = "QR";
$random = substr(md5(mt_rand()), 0, 7);
$all = [$date, $dash, $random];
?>
                   <div class="row">
            
   <div class="col-sm">
       <label for="yourName" class="form-label">Gate Pass ID:</label>
       <input type="text" name="gate_id" class="form-control" id="yourName" value='<?php echo $all[0], $all[1], $all[2]; ?>' readonly>

      </div>
     </div>          
<div class="row">
   <div class="col-sm">
       <label for="yourName" class="form-label">Gatepass Category:</label>
       <select class="form-control" id="gate_cat" name="gatepass_cat" onclick="cat()" required >
       <option value="" selected disabled hidden>Choose Gatepass Category</option>
        <option value="VALID UNTIL" >VALID UNTIL</option>
        <option value="LONG TERM" >LONG TERM</option>
     </select>
     </div>
     </div>

     <div class="row">
   <div class="col-sm">
       <label for="yourName" class="form-label">User Category:</label>
       <select class="form-control" id="gate" name="gatepass" onclick="gatepass1()" required >
       <option value="" selected disabled hidden>Choose User Category</option>
        <option value="Student" >Student</option>
        <option value="Teacher" >Academic Staff Member</option>
        <option value="Teacher" >Non-Academic Staff Member</option>
        <option value="Owner" >Concessioners</option>
     </select>
     </div>
     </div><!--End of row-->
     <div class="row">
   <div class="col-sm">
       <label for="yourName" class="form-label">ID Number/Stall Number:</label>
       <input type="text"  class="form-control" name="id_num" id="id"  required>
     </div>
     <div class="col-sm">
       <label for="yourName" class="form-label">Name: </label>
       <input type="text" class="form-control" id="name"  name="fname" required>
     </div>
     
     </div><!--End of row-->
     <div class="row">
   <div class="col-sm">
       <label for="yourName" class="form-label" style="display:none;"  id="store1">Name Store: </label>
       <input type="text"  class="form-control" id="store2" name="store" disabled style="display:none;">
     </div>
    
     
     </div><!--End of row-->
     <div class="row">
     <div class="col-sm">
   <label for="yourEmail" class="form-label" style="display:none;" id="label_stud">Course:</label>
      
        <select class="form-select" id="course1" name="course" required  style="display:none;">
        <option value="" selected disabled hidden>Choose Course</option>
        <option value="Bachelor Of Arts In Journalism">Bachelor Of Arts In Journalism</option>
        <option value="Bachelor Of Early Childhood Education">Bachelor Of Early Childhood Education</option>
        <option value="Bachelor Of Elementary Education">Bachelor Of Elementary Education</option>
        <option value="Bachelor Of Science In Business Management">Bachelor Of Science In Business Management</option>
        <option value="Bachelor Of Science In Computer Science">Bachelor Of Science In Computer Science</option>
        <option value="Bachelor Of Science In Entrepreneurship">Bachelor Of Science In Entrepreneurship</option>
        <option value="Bachelor Of Science In Hospitality Management">Bachelor Of Science In Hospitality Management</option>
        <option value="Bachelor Of Science In Information Technology">Bachelor Of Science In Information Technology</option>
        <option value="Bachelor Of Science In Office Administration">Bachelor Of Science In Office Administration</option>
        <option value="Bachelor Of Science In Psychology">Bachelor Of Science In Psychology</option>
        <option value="Bachelor Of Secondary Education">Bachelor Of Secondary Education</option>
     </select>
     </div>
   <div class="col-sm">
   <label for="yourEmail" class="form-label" style="display:none;" id="label_stud2">Year:</label>
        <select class="form-select" id="yr1" name="yr" required  style="display:none;">
        <option value="" selected disabled hidden style="display:none;">Choose Year</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
     </select>
     </div>
     <div class="col-sm">
   <label for="yourEmail" class="form-label" style="display:none;" id="label_stud1">Section:</label>
        <select class="form-select" id="section1" name="section" style="display:none;">
        <option value="" selected disabled hidden>Choose Section</option>
        <option>A</option>
        <option>B</option>
        <option>C</option>
        <option>D</option>
        <option>E</option>
        <option>F</option>
        <option>G</option>
        <option>H</option>
     </select>
     </div>
     
     </div><!--End of row-->
     <div class="row">
      <div class="col-sm">
        <label for="yourAge" class="form-label">Address:</label>
        <input type="text"  class="form-control" id="add" name="address" required>
      </div>
     
      </div><!--End of row-->
      <div class="row">
      <div class="col-sm">
        <label for="yourEmail" class="form-label">Date Register:</label>
        <input type="date"   class="form-control"  value="<?php echo date('Y-m-d'); ?>" name="date" readonly>
      </div>
      </div>
      <div class="row">
      <div class="col-sm">
        <label for="yourEmail" class="form-label" style="display:none;" id="label_valid">Valid Until</label>
        <input type="date" id="valid"  class="form-control" name="valid" style="display:none;" readonly>
      </div>
      </div><!--End of row-->
      <div class="row">
      <div class="col-sm">
  <label for="yourName" class="form-label">Phone Number:</label>
  <input type="tel" class="form-control" value="09" id="phone1" name="phone" pattern="[0-9]*" minlength="11"  placeholder="09" maxlength="11" required>
</div>
<div id="error-msg" style="display: none; color: red;">Please enter a valid 11 digit phone number</div>
  
</div><!--End of row-->

   
      <div class="row">
      <div class="col-sm">
        <label for="yourName" class="form-label" >Technical:</label>
        <select class="form-control" id="technical" onclick="tech()" required >
       <option value="" selected disabled hidden>Choose Technical Category</option>
        <option value="1" >with Technical</option>
        <option value="0" >Without Technical</option>
   
     </select>
      </div>

    
      </div><!--End of row-->
      

      <div class="row">
      <div class="col-sm">
        <label for="yourName" class="form-label" id="name_tech" style="display: none;">Technical Name:</label>
        <input type="text" id="tech1" class="form-control" name="technical_check" readonly style="display: none;">
      </div> </div>

    
      </div><!--End of row-->
 
      <div class="col-12">
        <button class="btn btn-primary w-100" type="submit" name="submit">Proceed</button>
      </div>
      
     
    </form>
    <script>
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

                document.getElementById("label_stud").style.display = "none";
                document.getElementById("label_stud1").style.display = "none";
                document.getElementById("label_stud2").style.display = "none";
                document.getElementById("course1").style.display = "none";
                document.getElementById("yr1").style.display = "none";
                document.getElementById("section1").style.display = "none";
                document.getElementById("store1").style.display = "none";
                document.getElementById("store2").style.display = "none";

                document.getElementById("course1").disabled = true;
                document.getElementById("yr1").disabled = true;
                document.getElementById("section1").disabled = true;
                document.getElementById("store2").disabled = true;
                document.getElementById("store2").value="";
                document.getElementById("course1").value="";
                document.getElementById("yr1").value="";
                document.getElementById("section1").value="";
              }else if(gate1 == "Owner"){
                document.getElementById("label_stud").style.display = "none";
                document.getElementById("label_stud1").style.display = "none";
                document.getElementById("label_stud2").style.display = "none";
                document.getElementById("course1").style.display = "none";
                document.getElementById("yr1").style.display = "none";
                document.getElementById("section1").style.display = "none";
                document.getElementById("store1").style.display = "block";
                document.getElementById("store2").style.display = "block";
                document.getElementById("store2").disabled = false;

                document.getElementById("course1").value="";
                document.getElementById("yr1").value="";
                document.getElementById("section1").value="";
                
              } else if(gate1 == "Student"){
             
                document.getElementById("label_stud").style.display = "block";
                document.getElementById("label_stud1").style.display = "block";
                document.getElementById("label_stud2").style.display = "block";
                document.getElementById("course1").style.display = "block";
                document.getElementById("yr1").style.display = "block";
                document.getElementById("section1").style.display = "block";
                document.getElementById("store2").disabled = true;
                document.getElementById("course1").disabled = false;
                document.getElementById("yr1").disabled = false;
                document.getElementById("section1").disabled = false;
                document.getElementById("store2").value="";
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
                document.getElementById("tech1").style.display = "block";
                document.getElementById("name_tech").style.display = "block";
                
              }else{
                document.getElementById("tech1").readOnly = true;
                document.getElementById("tech1").style.display = "none";
                document.getElementById("name_tech").style.display = "none";
                document.getElementById("tech1").value = "";
              }
            }
                       
                       
            function cat(){
              var cat = document.getElementById("gate_cat").value;
              if(cat == "VALID UNTIL"){
                document.getElementById("valid").readOnly = false;
                document.getElementById("valid").style.display = "block";
                document.getElementById("label_valid").style.display = "block";
              }else{
                document.getElementById("valid").readOnly = true;
                document.getElementById("valid").value = "";
                document.getElementById("valid").style.display = "none";
                document.getElementById("label_valid").style.display = "none";
                
              }
            }
            
    document.getElementById("store2").addEventListener("keypress", function(e){
        if(!document.getElementById("store2").value && e.keyCode === 32){
            e.preventDefault();
        }
    });
    document.getElementById("tech1").addEventListener("keypress", function(e){
        if(!document.getElementById("tech1").value && e.keyCode === 32){
            e.preventDefault();
        }
    });


    var id = document.getElementById("id");
       var name1 = document.getElementById("name");
     

      id.addEventListener("keypress", function(e){
        if(!id.value && e.keyCode === 32){
            e.preventDefault();
        }
    });
   
      name1.addEventListener("keypress", function(e){
        if(!name1.value && e.keyCode === 32){
            e.preventDefault();
        }
    });
    var add1 = document.getElementById("add");
    add1.addEventListener("keypress", function(e){
        if(!add1.value && e.keyCode === 32){
            e.preventDefault();
        }
    });

 input.addEventListener('input', function(){
    var letterRegex = /^[a-zA-Z]+$/;
    if (!letterRegex.test(input.value)) {
      input.value = input.value.slice(0, -1);
    }
  });
    document.getElementById("valid").min = new Date().toISOString().split("T")[0];
    

       
        </script>
</body>

</html>

