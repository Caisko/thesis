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
  


  <title>Account Confirmation </title>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
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

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="login-form.php" class=" d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" style="width:200px" alt="">
  
                </a>
              </div><!-- End Logo -->

              <div class="card mb-">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                  <?php if(isset($_GET['error'])){ ?>
                  <p class="alert alert-danger text-center" style="font-align:center;">
                   <?php echo $_GET['error']; ?></p> <?php } ?>
                   <?php if(isset($_GET['check'])){ ?>
                  <p class="alert alert-success text-center" style="font-align:center;">
                   <?php echo $_GET['check']; ?></p> <?php }
                   ?>

                   
                    <h5 class="card-title text-center pb-0 fs-4">Account Profile Confirmation</h5>
                    <p class="text-center small"></p>
                  </div>

                  <form  method="post" action="confirm.php"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate id="form">
                  

                   
                    <input type="hidden" name="uname" value='<?php echo $_SESSION["uname"]; ?>' class="form-control" id="yourName" placeholder="Juan" required>
                    <?php
                      $status = "SELECT * FROM admins where id_number = '".$_SESSION['uname']."'"  ;
                      $result = mysqli_query($conn,$status);
                      $row = mysqli_fetch_assoc($result);
                    ?>


                    <div class="row">
                        <div class="col-sm-5 mx-auto">
                        <img id="profile" src="./assets/img/profile/<?= $row["profile_pic"]; ?>" width="160" height="150" class="rounded-circle mx-auto shadow-sm mx-auto d-block">
                    </div>
                        </div>
                           
                   <div class="col-sm-5 mx-auto">
							<div class="d-flex flex-column gap-1">
								<div class="mb-3 px-3">
									<input  accept="png, jpeg,jpg,gif" required class="form-control form-control-sm" name="profile_pic" id="imgInp" type="file">
								</div>
							
						</div>
                   <script>
                            imgInp.onchange = evt => {
                        const [file] = imgInp.files
                        if (file) {
                            profile.src = URL.createObjectURL(file)
                        }
                        }
                    </script>
                   </div>

                  <div class="row">
                  
                    <h4>Personal Details</h4>
                    <hr style="border: 1px solid green;">
                  <div class="col-sm">
                      <label for="yourName" class="form-label">Firstname </label>
                      <input type="text" name="fname" value='<?php echo $row["given_name"]; ?>' class="form-control" id="fname1" required>
                  
                    </div>

                    <div class="col-sm">
                      <label for="yourName" class="form-label">Middle Name</label>
                      <input type="text" name="mname" value='<?php echo $row["middle_name"]; ?>' class="form-control" id="mname1"  required>
                    </div>


                    <div class="col-sm">
                      <label for="yourEmail" class="form-label">Lastname</label>
                      <input type="text" name="lname" value='<?php echo $row["surname"]; ?>' class="form-control" id="lname1"  required>

                    </div>
                    </div><br><!--End of row-->

                    <div class="row">
                 

                    <div class="col-sm-5">
                      <label for="yourEmail" class="form-label">Birthdate</label>
                      <input type="date"  name="date"  class="form-control" id="yourName" required>
                    </div>

                    <div class="col-sm">
                      <label for="yourEmail" class="form-label">Gender</label>
                      <select class="form-control" name="gender" value='<?php echo $row["gender"]; ?>'>
                      <option value='<?php echo $row["gender"]; ?>' selected  hidden><?php echo $row["gender"]; ?></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    </div>
                    </div><!--End of row-->

                    <h4>Contact Details</h4>
                  
                    <div class="row">
                    <div class="col-sm-3">
                      <label for="yourAge" class="form-label">Phone Number:</label>
                      <input type="tel" class="form-control" value="09" id="phone1" name="phone" pattern="[0-9]*" minlength="11"  placeholder="09" maxlength="11" required>
                      <div id="error-msg" style="display: none; color: red;">Please enter a valid 11 digit phone number</div>
                    </div>

                    <div class="col-sm">
                      <label for="yourAge" class="form-label">Email Address:</label>
                      <input type="email"  name="email" class="form-control" id="email1" required>
                    </div>

                    <div class="col-sm">
                      <label for="yourAge" class="form-label">Link of Fb Account:</label>
                      <input type="text"  name="fblink" class="form-control" id="fb1" required>
                    </div>

                    
                    </div><!--End of row-->

                    <h4>Address</h4>
                

                    <div class="row">
                    <div class="col-sm">
                      <label for="yourName" class="form-label">Complete Address:</label>
                      <input type="text" name="address"  class="form-control" id="add1" required>
                      <h4>Signature:</h4>
                        
                    </div>
                    </div><!--End of row-->
                    

                    <div class="row">
                        <div class="col-sm-5 mx-auto">
                        <img id="sign" src="" width="450" height="150" class=" mx-auto shadow-sm mx-auto d-block">
                    </div>
                        </div>
                           
                   <div class="col-sm-5 mx-auto">
							<div class="d-flex flex-column gap-1">
								<div class="mb-3 px-3">
									<input  accept="png" required class="form-control form-control-sm" name="signature" id="imgIn" type="file">
								</div>
								</div>
						</div>
                
                 
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Submit</button>
                    </div>
                    
                   
                  </form>
                  <script>
                            imgIn.onchange = evt => {
                        const [file] = imgIn.files
                        if (file) {
                            sign.src = URL.createObjectURL(file)
                        }
                        }

                        document.getElementById("fname1").addEventListener("keypress", function(e){
                          if(!document.getElementById("fname1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
                        document.getElementById("mname1").addEventListener("keypress", function(e){
                          if(!document.getElementById("mname1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
                        document.getElementById("lname1").addEventListener("keypress", function(e){
                          if(!document.getElementById("lname1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });

                        document.getElementById("add1").addEventListener("keypress", function(e){
                          if(!document.getElementById("add1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
                        document.getElementById("email1").addEventListener("keypress", function(e){
                          if(!document.getElementById("email1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });
                        document.getElementById("fb1").addEventListener("keypress", function(e){
                          if(!document.getElementById("fb1").value && e.keyCode === 32){
                              e.preventDefault();
                          }
                        });

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

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by : Khen Felices
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