
<?php
include 'assets/connection/connect.php';
session_start();


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
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
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
  <a class="nav-link collapsed" href="http://localhost:5000/scanface.html">
  <i class="bi bi-person-bounding-box"></i>
    <span>Borrowing Item</span>
  </a>
</li><!-- End Register gate pass Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" href="http://localhost:5000/return.html">
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
  <main id="main" class="main trans">

    <div class="pagetitle hidden">
      <h1>Borrowers Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Return Items</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard trans">
      <div class="row trans">

        <!-- Left side columns -->
        <div class="col-lg-12 trans">
          <div class="row trans"> 
  <!-- Recent Sales -->

              <div class="card recent-sales overflow-auto trans">

                <div class="card-body ">
                  <h5 class="card-title hidden">Return Items<h5>
                  <div class="row"> 
                  <div class="col-sm">

     
 </div>

<div class="row justify-content-end trans">
 
</div>
</div>
<img src="assets/img/logo.png"   style="margin:auto;width:500px;display:none;" class="show">
<div class="row">



<label for="yourName" class="form-label">Name: <?php if(isset($_GET['name'])){echo $name12 =$_GET['name'];}?></br>
   <label for="yourName" class="form-label">ID Number: <?php if(isset($_GET['label'])){echo $_GET['label'];}?></label>
   <?php if(isset($_GET['label'])){ $id =  $_GET['label'];}?>

<?php 
$sql = "SELECT b.id, b.id_num, b.Deparment as de, b.sname as sname, b.gname as gname, b.mname as mname,
i.borrower_id_num as bnum, i.transaction as transaction, i.id as id_del, i.qr_id_cvsu, i.date_borrow as date_borrow,
i.date_return as date_return,i.quantity as quan, i.status as status, ce.id as ced, ce.serial as se,sum(i.quantity) as counting
, ce.item_name as name1, ce.description as desc1, ce.quantity as quantity
FROM item_borrow as i
JOIN borrowers as b ON i.borrower_id_num = b.id
JOIN cvsu_equipment as ce ON ce.id = i.qr_id_cvsu
WHERE b.id_num = '$id' AND transaction != '' and i.status != 'return' and i.status != 'pending'
GROUP BY transaction, ce.id;
";
$result = $conn->query($sql);

$transactions = array();

if ($result->num_rows > 0) {
  // group rows by transaction ID
  while($row = $result->fetch_assoc()) {
      $trans = $row['transaction'];
     

      if (!isset($transactions[$trans])) {
        $transactions[$trans] = array(
          'header' => array(
            'transaction' => $trans,
          ),
          'items' => array()
        );
      }

      $transactions[$trans]['items'][] = array(
        'name' => $row['name1'],
        'quantity' => $row['quan'],
        'transac' => $row['transaction'],
        'cvsu_id' => $row['qr_id_cvsu']
       
      );
  }

  // display tables for each transaction ID
  foreach ($transactions as $trans_data) {
      
?>

<table class="table border table-hover" id="mytable">
<thead style="text-align:center;background-color:#43c964;color:white;">
  <tr>
  <th colspan="3">Transaction ID: <?php echo $transac_id1 = $trans_data['header']['transaction'];?></th>
  </tr>
</thead>

<thead>
  <tr>
    <th style="width:  33.3%;">Item</th>
    <th style="width: 33.3%;">Quantity</th>
    <th style="width:  33.3%;">Return</th>
  </tr>
</thead>

<tbody>
    <?php  foreach ($trans_data['items'] as $item_data) { ?>
  <tr>

  <td ><?php echo $item = $item_data['name'];?></td>
    <td ><?php echo $quan = $item_data['quantity'];?></td>
    <td><button class="btn btn-secondary open-modal" 
            data-transact-id="<?php echo $trans_data['header']['transaction']; ?>"
            data-item="<?php echo $item_data['name']; ?>"
            data-quantity="<?php echo $item_data['quantity']; ?>"
            label="<?php echo $_GET['label']; ?>"
            name="<?php echo $_GET['name']; ?>">
            <i class="bi bi-arrow-right"></i>
    </button>
</td>

  </tr>
  <?php }?>
</tbody>

</table>
<br>
<?php
  }
}
?>


<div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Transaction ID:</strong> <?php echo $transac_id1; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="return_process.php">
      <input type="hidden" name="id" value="<?php echo $id; ?>" readonly>
      <input type="hidden" name="transact_id" value="<?php echo $transac_id1; ?>">
      <input type="text" name="item" value="<?php echo $item; ?>" readonly>
    <input type="int" name="quantity" value="<?php echo $quan; ?>" max="<?php echo $quan; ?>" required>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Return</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
                </div>


              </div>
            </div><!-- End Recent Sales -->
            
 
          
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity 
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
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
  <footer id="footer" class="footer hidden">
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

 <!-- script to handle modal interactions -->
<script>
// get the modal element
var modal = document.querySelector('.modal');

// get the close button
var closeBtn = modal.querySelector('.close');

// get the form elements
var transactIdInput = modal.querySelector('input[name="transact_id"]');
var itemInput = modal.querySelector('input[name="item"]');
var quantityInput = modal.querySelector('input[name="quantity"]');
var labelInput = modal.querySelector('input[name="label"]');
var nameInput = modal.querySelector('input[name="name"]');
// add click event listener to all open-modal buttons
var openModalButtons = document.querySelectorAll('.open-modal');
openModalButtons.forEach(function(btn) {
  btn.addEventListener('click', function() {
    // set the values of the input elements in the modal based on the data attributes of the button
    transactIdInput.value = btn.dataset.transactId;
    itemInput.value = btn.dataset.item;
    quantityInput.value = btn.dataset.quantity;
    quantityInput.max = btn.dataset.quantity;
    
    
    // show the modal
    modal.style.display = 'block';
  });
});

// add click event listener to close button
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