<?php
include 'assets/connection/connect.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
<script type="text/javascript">
  // Refresh the page every second
  setInterval(function(){
    location.reload();
  }, 1000);
</script> 
 
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

<body class="black">

  <main >
    <div class="container" >

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 col-md-6 d-flex flex-column align-items-center justify-content-center">


              <div class="card mb-3">

                <div class="card-body">
              
                  <div class="pt-4 pb-2">
                 
                    
              <div class="d-flex justify-content-center " >
<?php 
$refreshInterval = 10; // 10 seconds
$qr =  $_GET['print'];
$name =  $_GET['name'];
$label =  $_GET['label'];
$sql = "SELECT * from item_borrow WHERE qr_print = '$qr';";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);  
if($row['status'] == "borrowed"){
    header("Location: trans_print.php?print=$qr&name=$name&label=$label");
// echo "<script>window.refreshPage = true;</script>";
}else if($row['status'] == "borrow"){
    header("Location: borrow_qr.php?name=$name&label=$label");
}
if($row['status'] == null){
  header("Location: borrowers.php");
}


// Periodically refresh the page
// echo "<script>
//   var refreshIntervalId = setInterval(function(){
//     if(window.refreshPage) {
//       // Reload the page with the updated query string
//       window.location.href = 'http://trans_print.php?" . $qr . "';
    
//     } else {
//       clearInterval(refreshIntervalId);
//     }
//   }, $refreshInterval);
// </script>";
?>
            <p class="for_label">SCANNING FACE SUCCESSFULL.<p>
     
              </div><!-- End Logo -->
              <p class="for_label"> PLEASE WAIT FOR THE ADMIN'S APPROVAL<p>
                  
                  </div>

                  

    

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