<?php
session_start();
include 'assets/connection/connect.php';

#$name = $_SESSION["uname"];

#if (empty($name)) {
 #   session_destroy();
  #  header("location:index.php");
#}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Create Password</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/title.png" rel="icon"> 

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

              <div class="d-flex justify-content-center py-4">
                <a href="#" class=" d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" style="width:300px" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
              
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Security Form</h5>
                   
                  </div>
                  <?php if(isset($_GET['error'])){ ?>
            <p class="alert alert-danger text-center" style="font-align:center;">
            <?php echo $_GET['error']; ?></p> <?php } ?>
                  <form class="row g-3 needs-validation" method="post" action="security.php">
                  <input type="hidden" name="uname" value='<?php echo $_SESSION["uname"]; ?>' class="form-control" id="yourUsername" required>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Enter Password:</label>
                      <div class="input-group has-validation">
              
                        <input type="password" name="pass1"  class="form-control" minlength="8" id="passwod" required>
                      
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Confirmation Password:</label>
                      <input type="password" name="pass2" class="form-control" minlength="8" id="passwod1" required>
                    
                    </div>
                    <div class="col-12">
  <div class="form-check">
    <input type="checkbox" onclick="showPassword()" id="showPass">
    <label class="form-check-label" for="showPass" >Show Password</label>
  </div>
</div>
                    <!--<div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label> 
                      </div>
                    </div>-->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Create Password</button>
                    </div>
                    <div class="col-12">
<!-- <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>--> 
                    </div>
                  </form>
<script>
  function showPassword() {
  var pass = document.getElementById("passwod");
  var pass2 = document.getElementById("passwod1");
  if (pass.type === "password" && pass2.type === "password") {
    pass.type = "text";
    pass2.type = "text";
  } else {
    pass.type = "password";
    pass2.type = "password";
  }
}

document.getElementById("passwod").addEventListener("keypress", function(e){
        if(!document.getElementById("passwod").value && e.keyCode === 32){
            e.preventDefault();
        }
    });
    document.getElementById("passwod1").addEventListener("keypress", function(e){
        if(!document.getElementById("passwod1").value && e.keyCode === 32){
            e.preventDefault();
        }
    });

  </script>
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