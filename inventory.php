
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

  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 10px;
  border: 1px solid #888;
  width: 80%;
  height:10%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
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
      <h1>Inventory</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Inventory</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
         <!-- Customers Card -->
         <div class="col-xxl">

<div class="card info-card customers-card">

  <div class="card-body">
    <h5 class="card-title">Inventory Items</h5>
        
  
 
  <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
          <div class="table-responsive">
          <table class="table table-hover table-bordered"  id="itemTable" style=" text-align: center;">
  <thead >
    <tr>
    <th scope="col">QR Code ID</th>
    <th scope="col">Item</th>
    <th scope="col" style="display:none;">Category</th>
    <th scope="col">Serial</th>
    <th scope="col">Description</th>
    <th scope="col">QTY</th>
    <th scope="col"> Damaged&nbsp;QTY </th>
      <th scope="col">Total </th>
      <th scope="col" colspan=2>Available&nbsp;QTY</th>
    

    
     
    </tr>
  </thead>
  <?php
$sql = "SELECT * FROM cvsu_equipment Order By equipment ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $quantity = $row['quantity'];
   $qr = $row['qr_id'];
    $serial = $row['serial'];
    $damage = $row['damage'];
   $des = $row['description'];
    $total_quantity = $quantity - $damage;

    // Query para sa total na quantity na natira
    $status = "SELECT SUM(quantity) AS borrowed_quantity
    FROM item_borrow WHERE qr_id_cvsu = $id AND(status = 'borrowed' OR status = 'borrow' OR status = 'checking') ORDER BY borrowed_quantity asc";
    $borrowedResult = $conn->query($status);
    $borrowedRow = $borrowedResult->fetch_assoc();
    $borrowedQuantity = $borrowedRow['borrowed_quantity'];
    $total =  $total_quantity - $borrowedQuantity;
    
      ?>
      <tbody>
        <tr>
        <td><?php echo $qr; ?></td>

          <td><?php echo strtoupper($row['item_name']); ?></td>
          <td style="display:none;" ><?php echo strtoupper($row['equipment']); ?></td>
          <td><?php echo $serial; ?></td>
          <td><?php echo $des; ?></td>
          <td><?php echo $quantity; ?></td>
          <td> 
            
          <button class="btn default open-modal" style="padding:0;width:100px;height:25px;"
            data-transact-id="<?php echo $qr; ?>"
            data-damage_quan="<?php echo $damage; ?>"
            data-quantity="<?php echo $quantity; ?>"
             >
            <p class=""><?php echo $damage; ?></p>
    </button> </td>
          <td><?php echo $total_quantity; ?></td>

          <td><?php if($total < 0){}else{ echo $total;} ?></td>
        </tr>
      </tbody>
      <?php
    }
  }

?>
</table> 


<div class="modal"  id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <strong><input type="hidden" name="transact_id1" class="no-outline" style="border:none" readonly></strong>
      <div >
        <form method="post" action="damage_form.php">
      <input type="hidden" name="qr_id" >
 
      <input type="hidden" class="form-control" name="qr_id_in"  readonly><br>

      <label class="form-label"  id="damage_d">Damaged Item Quantity:</label>
      <input type="number"  name="quantity"   id="quantity_max" class="form-control"   required><br>
          </div>
     <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary" >Done</button>
        </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="close" aria-label="Close"  >Cancel</button>
        </div>
    </div>
  </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>

<script>
   

// get the modal element
var modal = document.querySelector('.modal');

// get the close button
var closeBtn = modal.querySelector('#close');

// get the form elements

var ced1 = modal.querySelector('input[name="qr_id_in"]');
var quantityInput = modal.querySelector('input[name="quantity"]');

// add click event listener to all open-modal buttons
var openModalButtons = document.querySelectorAll('.open-modal');
openModalButtons.forEach(function(btn) {
  btn.addEventListener('click', function() {
    // set the values of the input elements in the modal based on the data attributes of the button
  
      quantityInput.value = btn.dataset.damage_quan;
      ced1.value = btn.dataset.transactId;
     var quan =  btn.dataset.quantity;
      // show the modal
      var max1 = btn.dataset.damage_quan;
     var checking_mac = document.getElementById("quantity_max").max = quan;
     document.getElementById("quantity_max").min = 0;
     console.log(checking_mac);
      modal.style.display = 'block';
  });
}); 
closeBtn.addEventListener('click', function() {
  modal.style.display = 'none';
 
});

// add click event listener to window to close modal if clicked outside modal
window.addEventListener('click', function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
});

  </script>
</body>

</html>

