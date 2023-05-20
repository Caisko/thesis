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

// Access the session variables
$label = $_GET['label'];
$name = $_GET['name'];

// Continue with your code logic here
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Borrowing</title>
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
  width: 50%;
  height:50%;
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
<a href="borrow_qr.php?name=<?php echo $name; ?>&label=<?php echo $label; ?>" class=" d-flex align-items-center">
    
    
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
  <a class="nav-link collapsed" href="borrow_qr.php?label=<?php echo $label;?>&name=<?php echo $name;?>">
  <i class="bi bi-person-bounding-box"></i>
    <span>Borrowing</span>
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
      <h1>Borrowing</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Borrowing</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
    <?php if(isset($_GET['error'])) { ?> 
      <div class="card"><?php echo $_GET['error'];?></div>
      <?php }?>
</div>
      <div class="row">
        <div class="col-lg-6">
          
    
          <div class="card">
            
            <div class="card-body" style="padding:30px;">
                    <?php if (isset($_GET['category'])){ echo $category =  $_GET['category'];?>
                    
                  
<select class="form-select"  id="categorySelect" aria-label="Default select example" style="position:relative;">
<option hidden Default>Item Categories</option>
<?php   $sql = "SELECT * FROM  item_category where category_name = '$category'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
  ?>
 
  <option value="<?php echo strtoupper($row['category_name']);?>"><?php echo strtoupper($row['category_name']);?></option>
  
<?php } }?>
<?php } else{?>
  <select class="form-select"  id="categorySelect" aria-label="Default select example" style="position:relative;">
<option hidden Default>Item Categories</option>
<?php   $sql = "SELECT * FROM  item_category";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
  ?>
 
  <option value="<?php echo strtoupper($row['category_name']);?>"><?php echo strtoupper($row['category_name']);?></option>
  
<?php } }?>
  <?php } ?>
<div class="row" >
</select><br>

<table class="table table-hover"  id="itemTable">
  <thead>
    <tr>
  
    <th scope="col">Item Name</th>
    <th scope="col" style="display:none;">Category</th>
      <th scope="col">Available QTY</th>
      <th scope="col">Action</th>
    
     
    </tr>
  </thead>
  <?php
$sql = "SELECT * FROM cvsu_equipment WHERE item_stats = 'available' Order By equipment ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $quantity = $row['quantity'];

    // Query para sa total na quantity na natira
    $status = "SELECT SUM(quantity) AS borrowed_quantity FROM item_borrow WHERE qr_id_cvsu = $id";
    $borrowedResult = $conn->query($status);
    $borrowedRow = $borrowedResult->fetch_assoc();
    $borrowedQuantity = $borrowedRow['borrowed_quantity'];

    $total = $quantity - $borrowedQuantity;

    if ($total != 0) {
      
      ?>
      <tbody>
        <tr>
          <input type="hidden" value="<?php echo $row['qr_id'];?>">
          <input type="hidden" value="<?php echo $_GET['label'];?>">
          <input type="hidden" value="<?php echo $_GET['name'];?>">
          <td><?php echo strtoupper($row['item_name']); ?></td>
          <td style="display:none;"><?php echo strtoupper($row['equipment']); ?></td>
          <td><?php echo $total; ?></td>
          <?php if (empty($row['serial'])) { ?>
    <td>
        <button class="btn btn-success" id="myBtn" data-id="<?php echo $row['id']; ?>"
            data-qrid="<?php echo $row['qr_id']; ?>" data-label="<?php echo $_GET['label']; ?>"
            data-name="<?php echo $_GET['name']; ?>" data-quantity="<?php echo $total; ?>"
            data-knowing="<?php echo $total; ?>" data-itemname="<?php echo strtoupper($row['item_name']); ?>">
            <i class="bi bi-plus"></i>
        </button>
    </td>
<?php } else { ?>
    <td>
        <a style="background-color:#198754;color:white;padding:7px 13px;border-radius:4px;display: inline-block;" href="process_fillup.php?name=<?php echo $_GET['name']; ?>&label=<?php echo $_GET['label']; ?>&id=<?php echo $id; ?>">
            <i class="bi bi-plus"></i>
        </a>
    </td>
<?php } ?>

        </tr>
      </tbody>
      <?php
    }
  }
} else {
  // No results
}
?>
</table> 
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div id="modalData">
      <form method="post" action="borrow_item_process.php">
      <h1 style="text-align:center;" id="quantity">Enter Quantity</h1>
    <input type="hidden" id="id" name="id_item"><br>
     <input type="number" class="form-control" min= "0" id="quantity_" name="quantity" required><br>
     <input type="hidden" class="form-control"  id="total" name="totat1">
     <input type="hidden" style="display:none;" id="qrIdInput" name="qr_id">
      <input type="hidden" id="labelInput" name="label" >
      <input type="hidden" id="nameInput" name="name">
      <input type="hidden" id="itemNameInput" name="item">
     <button type="submit" id="submitBtn" class="btn btn-success"  name="submit" style="width:100%;">Submit</button>
      </form>
    </div>
  </div>
</div>
</div>  
     
         
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <h5>Return date within 7days</h5>
              <table class="table table-striped" id="myTable" >
  <thead>
    <tr>
      <th scope="col">QTY</th>
      <th scope="col">Equipment</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <?php
  $label = $_GET['label'];
    $sql = "SELECT b.id, b.id_num, i.borrower_id_num as bnum,i.id as id_del, i.qr_id_cvsu ,SUM(i.quantity) as quan, ce.id as ced,ce.serial as se , ce.item_name as name1, ce.description as desc1,ce.quantity as quantity FROM item_borrow as i JOIN borrowers as b ON i.borrower_id_num = b.id JOIN cvsu_equipment as ce ON ce.id = i.qr_id_cvsu WHERE b.id_num ='$label' and transaction = '' group by ce.id ";
    
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

      <td>
   
    <a href="delete_in_table.php?name=<?php echo $_GET['name'];?>&label=<?php echo $_GET['label'];?>&id=<?php echo $row['id_del']; ?>&ced=<?php echo $row['ced'];?>" class="btn btn-danger" ><i class="bi bi-trash"></i></a>
    </tr>
  
  </tbody>
  <?php
   }
  } else {
    
  }
  ?>
</table>

<form method="post" action="adding.php" >


        <input type="hidden" name="label" value="<?php echo $_GET['label'];?>" >
        <input type="hidden" name="name" value="<?php echo $_GET['name'];?>" >
     
        <input type="hidden" name="name1" value="<?php if(isset($name1)){echo $name1;}?>" >
        <?php
?>
<input type="submit" name="submit" class="btn btn-primary " style="width:200px;float:right;position:relative;top:10px;" value="Proceed">

      </form>
            </div>
          </div>

        </div>
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
   // Get references to the select tag and table
   const categorySelect = document.getElementById('categorySelect');
  const itemTable = document.getElementById('itemTable');

  // Add event listener for the change event
  categorySelect.addEventListener('change', function() {
    const selectedCategory = categorySelect.value; // Get the selected category

    // Loop through each row in the table
    for (let i = 1; i < itemTable.rows.length; i++) {
      const categoryCell = itemTable.rows[i].cells[1]; // Assuming category is in the second cell (index 1)

      // Hide or show rows based on the selected category
      if (selectedCategory === 'All' || categoryCell.innerText === selectedCategory) {
        itemTable.rows[i].style.display = '';
      } else {
        itemTable.rows[i].style.display = 'none';
      }
    }
  });

  
  </script>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get all the buttons that open the modal
var buttons = document.getElementsByClassName("btn-success");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks a button, open the modal and set the data
for (var i = 0; i < buttons.length; i++) {
  buttons[i].onclick = function() {
    var quantity = this.getAttribute("data-quantity");
    var quantity2 = this.getAttribute("data-knowing");
    var id = this.getAttribute("data-id");
    var qrId = this.getAttribute("data-qrid");
    var label = this.getAttribute("data-label");
    var name = this.getAttribute("data-name");
    var itemName = this.getAttribute("data-itemname");
    document.getElementById("quantity_").value = quantity;

    document.getElementById("total").value = quantity2;
    document.getElementById("id").value = id;
    document.getElementById("qrIdInput").value = qrId;
    document.getElementById("labelInput").value = label;
    document.getElementById("nameInput").value = name;
    document.getElementById("itemNameInput").value = itemName;
    modal.style.display = "block";
  }
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Handle the submit button click
var submitBtn = document.getElementById("submitBtn");
submitBtn.onclick = function() {
  var quantity = document.getElementById("quantityInput").value;
  // Do something with the quantity value
  console.log("Quantity: " + quantity);
}

</script>
</body>

</html>