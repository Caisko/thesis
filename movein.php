
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
        $user_id = $row["id"];
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
      <h1>Move In</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Move In</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
  <!-- Recent Sales -->
  <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Gate Pass <span>| Move In Approval</span></h5>
             
                  <table class="table table-borderless ">
                    <thead>
                      <tr>
                      <th scope="col">Gatepass ID</th>
                        <th scope="col">QR Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date Register</th>
                        <th scope="col">Valid Until</th>
                        <th scope="col" style="text-align:center;">Approval</th>
                      </tr>
                    </thead>
                    <?php 
if($row["position"]== "Unit Checker"){
$sql = "SELECT * FROM gatepass where gatepass_status = 'request'  and `transaction` = 'pending' AND `in/out` IS NULL and not gate_cat_2 = 'IN/OUT'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["id"];
   ?>
                    <tbody>
                      <tr >
                      <th scope="row"><a href="view.php?id=<?php echo $row["id"]; ?>" style="color:black;font-size:15px;"><?php echo $row["gatepass_id"]; ?></a></th>
      <td><img src = "<?php echo $row["qr"];?>" style="width:50px;"></a></td>
      <td><?php echo $row["name"]; ?></a></td>
      <td><?php echo $row["date_register"]; ?></td>
      <td><?php echo $row["valid_until"]; ?></td>
      <td>
  <form method="POST" action="approved.php">
    <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
    <input type="hidden" name="id1" value="<?php echo $row["id"]; ?>">
    <button type="submit" style="margin:5px;" class="btn btn-success" name="submit">Approve</button>
    <a href="#?id=<?php echo $row["id"];?>" style="margin:5px;" class="btn btn-warning" data-toggle="modal" data-target="#declineModal" data-id="<?php echo $row["id"];?>">Decline</a>
  </form>
</td>
       
                     </tr>                    
                    </tbody>
                    <?php
}
} else {
  //echo "0 results";
}
$conn->close();
}elseif($row["position"]== "Priority 2"){
  $sql = "SELECT * FROM gatepass where gatepass_status = 'transaction 1' and `transaction` = 'pending' AND `in/out` IS NULL and not gate_cat_2 = 'IN/OUT'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["id"];
   ?>
   <tbody>
   
   <tr data-href="view.php">

     <th scope="row"><a href="view.php?id=<?php echo $row["id"]; ?>" style="color:black;"><?php echo $row["gatepass_id"]; ?></a></th>
     <td><a href="#"><img src = "<?php echo $row["qr"];?>" style="width:50px;"></td>
     <td><?php echo $row["name"]; ?></td>
     <td><?php echo $row["date_register"]; ?></td>
     <td><?php echo $row["valid_until"]; ?></td>
     <td><a href="approved.php? id=<?php echo $row["id"];?>" style="margin:5px;" class="btn btn-success">Approve</a>
     <a href="#?id=<?php echo $row["id"];?>" style="margin:5px;" class="btn btn-warning" data-toggle="modal" data-target="#declineModal" data-id="<?php echo $row["id"];?>">Decline</a><td>
   </tr>

 </tbody>
 <?php
}
} else {
  //echo "0 results";
}
$conn->close();
}elseif($row["position"]== "Priority 3"){
  $sql = "SELECT * FROM gatepass where gatepass_status = 'transaction 2' and `transaction` = 'pending' AND `in/out` IS NULL and not gate_cat_2 = 'IN/OUT'   ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["id"];
   ?>

 
  <tbody>
    <tr>
      <th scope="row"><a href="view.php?id=<?php echo $row["id"]; ?>" style="color:black;"><?php echo $row["gatepass_id"]; ?></a></th>
      <td><img src = "<?php echo $row["qr"];?>" style="width:50px;"></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["date_register"]; ?></td>
      <td><?php echo $row["valid_until"]; ?></td>
      <td><a href="approved.php? id=<?php echo $row["id"];?>" style="margin:5px;" class="btn btn-success">Approve</a>
      <a href="#?id=<?php echo $row["id"];?>" style="margin:5px;" class="btn btn-warning" data-toggle="modal" data-target="#declineModal" data-id="<?php echo $row["id"];?>">Decline</a><td>
    </tr>
  </tbody>

<?php
}
} else {
  //echo "0 results";
}
$conn->close();
}elseif($row["position"]== "Priority 4"){
  $sql = "SELECT * FROM gatepass where gatepass_status = 'transaction 3' and `transaction` = 'pending' AND `in/out` IS NULL and not gate_cat_2 = 'IN/OUT'   ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["id"];
   ?>

 
  <tbody>
    <tr>
      <th scope="row"><a href="view.php?id=<?php echo $row["id"]; ?>" style="color:black;"><?php echo $row["gatepass_id"]; ?></a></th>
      <td><img src = "<?php echo $row["qr"];?>" style="width:50px;"></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["date_register"]; ?></td>
      <td><?php echo $row["valid_until"]; ?></td>
      <td><a href="approved.php? id=<?php echo $row["id"];?>" style="margin:5px;" class="btn btn-success">Approve</a>
      <a href="#?id=<?php echo $row["id"];?>" style="margin:5px;" class="btn btn-warning" data-toggle="modal" data-target="#declineModal" data-id="<?php echo $row["id"];?>">Decline</a><td>
    </tr>
  </tbody>

<?php
}
} else {
  //echo "0 results";
}
$conn->close();
}elseif($row["position"]== "Priority 5"){
  $sql = "SELECT * FROM gatepass where gatepass_status = 'transaction 4' and `transaction` = 'pending' AND `in/out` IS NULL and not gate_cat_2 = 'IN/OUT'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["id"];
   ?>

 
  <tbody>
    <tr>
      <th scope="row"><a href="view.php?id=<?php echo $row["id"]; ?>" style="color:black;"><?php echo $row["gatepass_id"]; ?></a></th>
      <td><img src = "<?php echo $row["qr"];?>" style="width:50px;"></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["date_register"]; ?></td>
      <td><?php echo $row["valid_until"]; ?></td>
      
      <td><a href="approved.php? id=<?php echo $row["id"];?>" style="margin:5px;" class="btn btn-success">Approve</a>
      <a href="#?id=<?php echo $row["id"];?>" style="margin:5px;" class="btn btn-warning" data-toggle="modal" data-target="#declineModal" data-id="<?php echo $row["id"];?>">Decline</a><td>
    </tr>
  </tbody>

<?php
}
} else {
  //echo "0 results";
}
$conn->close();
}elseif($row["position"]== "Priority 6"){
  $sql = "SELECT * FROM gatepass where gatepass_status = 'transaction 5'  and `transaction` = 'pending' and not gate_cat_2 = 'IN/OUT'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["id"];
   ?>

 
  <tbody>
    <tr>
      <th scope="row"><a href="view.php?id=<?php echo $row["id"]; ?>" style="color:black;"><?php echo $row["gatepass_id"]; ?></a></th>
      <td><img src = "<?php echo $row["qr"];?>" style="width:50px;"></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["date_register"]; ?></td>
      <td><?php echo $row["valid_until"]; ?></td>
      
      <td><a href="approved.php? id=<?php echo $row["id"];?>" style="margin:5px;" class="btn btn-success">Approve</a>
      <a href="#?id=<?php echo $row["id"];?>" style="margin:5px;" class="btn btn-warning" data-toggle="modal" data-target="#declineModal" data-id="<?php echo $row["id"];?>">Decline</a><td>
    </tr>
  </tbody>

<?php
}
} else {
  //echo "0 results";
}
$conn->close();
}
?>

                  </table>
             <!-- Modal -->
             <div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Decline Gatepass</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="decline.php">
          <div class="form-group">
            <label for="declineReason">Reason for decline</label>
            <input type="hidden" name="user_id" id="userID" value="<?php echo $user_id; ?>">
            <input type="hidden" name="id" id="declineId" value="">
            <textarea class="form-control" name="reason" id="declineReason" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-warning decline-button" onclick="updateDeclineReason()">Decline</button>
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
  <script src="assets/js/main.js">
  
</script>

<script>
  function updateDeclineReason() {
    var id = document.getElementById("declineId").value;
    var reason = document.getElementById("declineReason").value;
    var user_id = document.getElementById("userID").value;
    console.log(id);
    if (!$("#declineReason").val()) {
  alert("You need to fill up the input before proceeding");
}else{
    $.ajax({
        type: "POST",
        url: "decline.php",
        data: { id: id, reason: reason, user_id: user_id },
        success: function(data) {
            console.log(data);
            alert("Gatepass Declined");
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
      
    });}
  }
  $('#declineModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body #declineId').val(id)
})
</script>

</body>

</html>