
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
    table, th, td{
        text-align: center;
        font-size:15px;
    }
    @page{
      size:landscape;
    }

		@media print {
     
      .th{
        display: block !important;
      }
			.hidden{
				display: none !important;
			}
      .show{
        display: block !important;
    
      }
      .trans{
        background: transparent !important;
      }
      .card.recent-sales.overflow-auto.trans {
    overflow: visible !important;
    
    background-color: transparent !important;
    border: none !important;
    box-shadow: none !important;
  
   
  }
  .header {
    overflow: visible !important;
    
    background-color: transparent !important;
    border: none !important;
    box-shadow: none !important;
  }

		}

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

    <div class="d-flex align-items-center justify-content-between hidden">
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
          $sign =$row['sign'];
         ?>
         

        <li class="nav-item dropdown pe-3 hidden">
       
        <a class="nav-link nav-profile d-flex align-items-center pe-0 hidden" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile/<?php echo $row["profile_pic"]; ?>" alt="Profile" class="rounded-circle" style="width:40px;">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row["id_number"];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header hidden">
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


  <main id="main" class="main trans">

    <div class="pagetitle hidden">
      <h1>Borrowers Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Borrowers Records</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard trans">
      <div class="row trans">

        <!-- Left side columns -->
        <div class="col-lg-12 trans">
          <div class="row trans"> 
  <!-- Recent Sales -->

              <div class="card recent-sales overflow-auto trans "  style="height:500px;">

                <div class="card-body ">
                  <h5 class="card-title hidden">Borrowers Records<h5>
                  <div class="row"> 
                  <div class="col-sm">

     
 </div>
 <div class="col-sm hidden trans ">             
  <div class="input-group mb-3"> 
    <select class="form-select" id="searchCategory">
      <option value="0" default>Categories</option>
      <option value="1">Name</option>
      <option value="2">Department</option>
      <option value="3">Transaction ID</option>
      <option value="4">Month</option>
    </select>
    <input type="text" class="form-control"  id="searchInput" placeholder="Search...">
 

    <div class="input-group-append">
      <div class="input-group-text bg-primary">
        <button type="submit" class="btn btn-primary" onclick="searchTable()">Search</button>
      </div>
    </div>
  </div>
</div>
<div class="row justify-content-end trans">
  <div class="col-sm-2">
    <button onclick="window.print()" class="btn btn-success hidden" style="width: 100%;margin-bottom:5px;"><i class="bi bi-printer"></i></button>
  </div>
</div>
</div>
<img src="assets/img/logo.png"   style="margin:auto;width:250px;display:none;margin-top:-50px;position:relative;" class="show"><br>
<div class="row">
<div class="table-responsive">
<table class="table border table-hover " id="mytable">

  <thead class="center">
    <tr>
    <th scope="col">Transaction ID</th>
      <th scope="col">Borrowers Name</th>
      <th scope="col">Department</th>
      <th scope="col">Item</th>
      <th scope="col">QTY</th>
      <th scope="col">Date Borrowed</th>
      <th scope="col">End Date</th>
      <th scope="col"> Date Return</th>
      <th scope="col"> Remarks</th>
      <th scope="col">Status</th>
    
      
    </tr>
  </thead>
  <?php 
  $sql = "SELECT b.id, b.id_num, i.date_return_item,b.Deparment as de, b.sname as sname, b.gname as gname, b.mname as mname,
  i.borrower_id_num as bnum, i.transaction as transaction, i.id as id_del, i.qr_id_cvsu, i.date_borrow as date_borrow,
  i.date_return as date_return,i.quantity as quan, i.status as status, ce.id as ced, ce.serial as se
  ,ce.item_name as name1, ce.description as desc1, ce.quantity as quantity,ce.damage as damage,i.quantity_return as quantity_return
FROM item_borrow as i
JOIN borrowers as b ON i.borrower_id_num = b.id
JOIN cvsu_equipment as ce ON ce.id = i.qr_id_cvsu
WHERE transaction != '' 
ORDER BY i.status ASC;
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $trans = $row['transaction'];
        $all = implode(array($row['sname'], ",", $row['gname'], " ", $row['mname']));
         $ced = $row['ced'];
         $serial = $row['se'];
         $quan = $row['quan'];
         $damage = $row['damage'];
         $total_return = $quan - $damage;
        
?>

<tbody>
    <tr>
        <td><a href="show_trans.php?trans=<?php echo $trans;?>"><p style="color:black;font-weight:bold;"><?php echo $trans;?></p></a></td>
        <td><?php echo $all; ?></td>
        <td><?php echo $row['de'];?></td>
        <td><?php echo $row['name1']?></td>
      <?php if(!empty($row['quantity_return'])){ ?>
        <td><?php echo  $total_return?></td>
        <?php } else if(empty($row['quantity_return'])){ ?>
          <td><?php echo  $quan; ?></td>
      <?php  } ?>
        <td><?php echo date('F j, Y', strtotime($row['date_borrow'])); ?></td>
        <td><?php echo date('F j, Y', strtotime($row['date_return'])); ?></td>
        <td><?php
        if(!empty($row['date_return_item'])  || $row['quantity_return'] == 0 ){
        echo date('F j, Y', strtotime($row['date_return_item'])); }else{}?></td>
         <?php if($row['status'] == 'borrowed' || $row['status'] == 'return_pending'){?>
    <td ><p style="color:orange;">IN USE</p></td>
    <?php }else if($row['status'] == 'return' || $row['status'] == 'checking' || $row['status'] == 'Damage' || $row['status'] == 'Good Condition'){ ?>
      <td ><p style="color:green;">RETURNED</p></td>

      <?php } ?>
        <td><?php if($row['status'] == 'checking') {?>

         <button class="btn default open-modal" style="padding:0;width:100px;height:25px;"
            data-transact-id="<?php echo $trans; ?>"
            data-item="<?php echo $row['name1']; ?>"
            data-quantity="<?php echo $row['quan']; ?>"
            data-ce_id="<?php echo $ced; ?>"
            data-serial="<?php echo $serial; ?>">
            <p class="text-primary">CHECKING</p>
    </button> 
     <?php }else if($row['status'] == 'Damage'){ ?>
        <p class="text-danger">DAMAGED</p>

      <?php }else if($row['status'] == 'Good Condition'){ ?>
            <p class="text-success">GOOD CONDITION</p>
      <?php } ?> 
      
     
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
        <form method="post" action="return_process.php">
      <input type="hidden" name="transact_id" >
      <input type="hidden" name="ced" >
      <input type="hidden" class="form-control" name="item"  readonly><br>
 
    <label class="form-label">Status:</label>
<select name="remarks" id="color" class="form-select">
	<option default value="Good Condition">Good Condition</option>
	<option value="Damage">Damaged</option>
</select>
<br>
<label class="form-label" style="display:none;" id="damage_d">Damaged Item Quantity:</label>
<input type="hidden"  name="quantity"   id="quant1" class="form-control"   min = "1"  required><br>
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
             
<div class="row show" style="float:right;position:relative;margin-top:50px;display:none;">
<img src="./assets/img/sign/<?php echo $sign; ?>">
<p style="position:absolute;top:100px;right:-120px;">Prepared by: Ms. Nelia Ocampo</p>
</div>

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

 <script>function searchTable() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("mytable");
  tr = table.getElementsByTagName("tr");
  var selectBox = document.getElementById("searchCategory");
  var selectedValue = selectBox.options[selectBox.selectedIndex].value;
  console.log(selectedValue);
  if (selectedValue == "0") {
    alert("Please select a category before searching.");
    return;
  }

  if (selectedValue == "3") {
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) { 
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  } else {
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[selectedValue - 1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1 || td.hasAttribute("colspan")) { 
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
}



// get the modal element
var modal = document.querySelector('.modal');

// get the close button
var closeBtn = modal.querySelector('#close');

// get the form elements
var transactIdInput = modal.querySelector('input[name="transact_id"]');
var transactIdInput1 = modal.querySelector('input[name="transact_id1"]');
var ced1 = modal.querySelector('input[name="ced"]');
var itemInput = modal.querySelector('input[name="item"]');
var quantityInput = modal.querySelector('input[name="quantity"]');
var labelInput = modal.querySelector('input[name="label"]');
// add click event listener to all open-modal buttons
var openModalButtons = document.querySelectorAll('.open-modal');
openModalButtons.forEach(function(btn) {
  btn.addEventListener('click', function() {
    // set the values of the input elements in the modal based on the data attributes of the button
  
    
    var sr = btn.dataset.serial
console.log(sr);
    if(sr !== null && sr !== undefined && sr !== ''){
      quantityInput.value = btn.dataset.quantity;
      itemInput.value = btn.dataset.item;
      transactIdInput.value = btn.dataset.transactId;
    ced1.value = btn.dataset.ce_id;
        
document.getElementById('color').addEventListener('change', function() {
  var selectedValue = this.value;

  if (selectedValue === 'Damage') {
    var quant1 = document.getElementById('quant1');
    quant1.type = 'hidden';
    var damage = document.getElementById('damage_d');
    damage.style.display = 'none';
  }
});
    }else{
      quantityInput.value = btn.dataset.quantity;
      itemInput.value = btn.dataset.item;
      transactIdInput.value = btn.dataset.transactId;
    ced1.value = btn.dataset.ce_id;
    
    
document.getElementById('color').addEventListener('change', function() {
  var selectedValue = this.value;

  if (selectedValue === 'Damage') {
    var quant1 = document.getElementById('quant1');
    var damage = document.getElementById('damage_d');
    quant1.type = 'number';
    damage.style.display = 'block';
  } else {
    var quant1 = document.getElementById('quant1');
    quant1.type = 'hidden';
    var damage = document.getElementById('damage_d');
    damage.style.display = 'none';
  }
});

    }
   
    
    
    // show the modal
    modal.style.display = 'block';
  });
});
const selectElement = document.getElementById('color');
// add click event listener to close button
closeBtn.addEventListener('click', function() {
  modal.style.display = 'none';
  selectElement.value = 'Good Condition';
  var quant1 = document.getElementById('quant1');
    quant1.type = 'hidden';
    var damage = document.getElementById('damage_d');
    damage.style.display = 'none';
});

// add click event listener to window to close modal if clicked outside modal
window.addEventListener('click', function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
    
    selectElement.value = 'Good Condition';
    var quant1 = document.getElementById('quant1');
    quant1.type = 'hidden';
    var damage = document.getElementById('damage_d');
    damage.style.display = 'none';
  }
});

</script>




</body>

</html>