<?php
include 'assets/connection/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

 <!--  anti xss -->
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'">
  <meta http-equiv="X-Content-Security-Policy" content="default-src 'self'; script-src 'self'">
  <meta http-equiv="X-WebKit-CSP" content="default-src 'self'; script-src 'self'">


  

  <title>SCANINFO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/" rel="icon">  -->

  

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

<body class="index">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 col-md-6 d-flex flex-column align-items-center justify-content-center">


              <div class="card mb-3">

                <div class="card-body">
              
                  <div class="pt-4 pb-2">
                    
              <div class="d-flex justify-content-center py-4">
                <a href="#" class=" d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" class="logo" alt="">
                </a>
              </div><!-- End Logo -->
              

             
                    
                  </div>

                  

                
   <form autocomplete="off" class="form-control" role="form" action = "requesting.php" method="get">

<div class="row">
<div class="col-sm">
  <label for="yourName" class="form-label">Academics/Non Academic Category:</label>
  <select class="form-control" id="gate" name="cat"   >
  <option value="" selected disabled hidden>Choose User Category</option>
   <option value="academic" >Academic</option>
   <option value="non academic" >Non Academic</option>

</select>
</div>
</div>
<div class="row">

<div class="col-sm">
<?php
$sql = "SELECT Max(id) AS new_id FROM borrowers";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($row['new_id'])) {
     $id = $row['new_id'];
    $id_new = $id + 1;
    $year = date('Y');
    $m = date('m');
    $d = date('d');
    $batch = intval($year . $m . $d. $id_new);
} else {
    $id_new = 1; // Default ID number if there are no existing records
    $year = date('Y');
    $m = date('m');
    $d = date('d');
    $batch = intval($year . $m . $d. $id_new);
}
?>

<label for="yourName" class="form-label">ID Number:</label>
<input type="text" class="form-control" name="id_num" id="id" value="<?php echo $batch; ?>" readonly>

</div>
</div>
<div class="row">
<div class="col-sm">
  <label for="yourName" class="form-label">Surname: </label>
  <input type="text" class="form-control" id="yourName" name="sname"  required>
</div>

<div class="col-sm">
  <label for="yourName" class="form-label">Given Name:</label>
  <input type="text"  class="form-control" name="gname"  required >
</div>
<div class="col-sm">
  <label for="yourName" class="form-label">Middle Name:</label>
  <input type="text"  class="form-control" name="mname"   required>
</div>
</div>

<div class="row">

<div class="col-sm">
<label for="yourEmail" class="form-label">Status:</label>
   <select class="form-control"  name="status1" required>
   <option value="" selected disabled hidden>Choose Status</option>
   <option value="Permanent">Permanent</option>
   <option value="Temporary">Temporary</option>
   <option value="Contractual">Contractual</option>
   <option value="Contractual of Service">Contractual of Service</option>
</select>
</div>


</div><!--End of row-->
<div class="row">

<div class="col-sm">
<label for="yourEmail" class="form-label">Department:</label>
<input type="text"  class="form-control" name="dep" id="id" required >
</div>

</div><br>

 <div class="col-12">
   <button class="btn btn-primary w-100" type="submit"  name="submit">Register</button>
 </div>
</form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
               <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 
</body>

</html>