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
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


              <div class="card mb-3">

                <div class="card-body">
              
                  <div class="pt-4 pb-2">
                    
              <div class="d-flex justify-content-center py-4">
                <a href="#" class=" d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" class="logo" alt="">
                </a>
              </div><!-- End Logo -->
              

              <?php

              if(isset($_POST['submit'])){
                $pin = $_POST['pin'];
                $status = "SELECT * FROM pin_default";
                $result = mysqli_query($conn, $status);
                $row = mysqli_fetch_assoc($result);
                if($row['pin'] == $pin){
                    header("location: face_registration.php");
                    $_SESSION['true'] = true;
                    
                }else{
                  ?>
                  <p class="alert alert-danger text-center" style="font-align:center;">
                    <?php echo "Incorrect Pin"; ?></p><?php
                }
                
              }
              
              ?>
                    
                  </div>

                  

                  <form class="row g-3 needs-validation" method="post">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Pin</label>
                      <div class="input-group has-validation">
              
                        <input type="password" name="pin" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Enter PIN Code.</div>
                      </div>
                    </div>

                    
                    <!--<div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label> 
                      </div>
                    </div>-->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Proceed</button>
                    </div>
                    <div class="col-12">
<!-- <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>--> 
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