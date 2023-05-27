<?php 
 include 'assets/connection/connect.php';
session_start();

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
              <script src="html5-qrcode.min.js" ></script>
              <div class="card mb-12">
                <div class="card-body">
                   
                                       <audio id="myAudio1">
                                          <source src="success.mp3" type="audio/ogg">
                                          </audio>
                                          <audio id="myAudio2">
                                          <source src="failes.mp3" type="audio/ogg">
                                          </audio>

                                        <div class="row" style="padding: 30px 30px 30px;">
                                          <div class="col">
                                             <div class="responsive" id="reader">
                                            </div>
                                          </div>
                                          <div class="row">
                                             <div class="col" style="padding: 30px; position: relative;">
                                                   <form action="" >
                                                      <input type="text" id="search" name="qr" onkeyup="showHint(this.value)"  class="form-control" placeholder="Search Name....." />
                                                   </form>
                                                </div>
                                            </div>
                                                   <br>
                                                   <h4>RESULT:</h4>
                                                   <div class="row text-control" id="display">
                                                      <!-- Display Ajax -->
                                                   </div>

                </div>
              </div>
              </div>
              </div>
              </div>

         
</div>
              <div class="credits" style="text-align:center;">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by : Khen Felices
            
        </div>

      </section>

    
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

  <script src="assets/js/main.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script type="text/javascript">
         function onScanSuccess(qrCodeMessage) {
             document.getElementById("search").value = qrCodeMessage;
             showHint(qrCodeMessage);
            
         
         }
         function onScanError(errorMessage) {
           //handle scan error
         }
         var html5QrcodeScanner = new Html5QrcodeScanner(
             "reader", { fps: 10, qrbox: 250 });
         html5QrcodeScanner.render(onScanSuccess, onScanError);
         
      </script>
      <script>
         
         function showHint(str) {
                 if (str.length == 0) {
         document.getElementById("display").innerHTML = "";
         return;
         } else {
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {

            var think = this.responseText;

             if(this.responseText == "No Data "){
              document.getElementById("display").innerHTML = " <p class='alert alert-danger text-center' style='font-align:center;'>" + this.responseText + "</p>";
             }else{
              location.href = this.responseText;
             }

           }
         };
         xmlhttp.open("GET", "ajax.php?search=" + str, true);
         xmlhttp.send();
         }
         }
       
         
         
                 
      </script>

</body>

</html>