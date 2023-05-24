<?php
include 'assets/connection/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

 <!--  anti xss -->
 

  <title>SCANINFO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/" rel="icon">  -->

  <style>

    </style>

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
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>QR ID: <span id="qrid"></span></p>
    <p>Label: <span id="label"></span></p>
    <p>Name: <span id="name"></span></p>
    <p>Item Name: <span id="itemname"></span></p>
  </div>
</div>
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

<label for="yourName" class="form-label">ID Number:<sup>*</sup></label>
<input type="number" class="form-control number" name="id_num" min="0" id="id">

</div>
</div>
<div class="row">
<div class="col-sm">
  <label for="yourName" class="form-label">Academics/Non Academic Category: <sup>*<sup></label>
  <select class="form-select" id="cat_acad" name="cat"   >
  <option value="" selected disabled hidden>Choose User Category</option>
   <option value="academic" >Academic</option>
   <option value="non academic" >Non Academic</option>
</select>
</div>
</div>
<div class="row">
<div class="col-sm">
  <label for="yourName" class="form-label">Surname: <sup>*<sup></label>
  <input type="text" class="form-control" id="yourName" name="sname"  required>
</div>

<div class="col-sm">
  <label for="yourName" class="form-label">Given Name:<sup>*<sup></label>
  <input type="text"  class="form-control" name="gname"  required >
</div>
<div class="col-sm">
  <label for="yourName" class="form-label">Middle Name:</label>
  <input type="text"  class="form-control" name="mname"   >
</div>
</div>

<div class="row">

<div class="col-sm">
<label for="yourEmail" class="form-label">Status:<sup>*</sup></label>
   <select  class="form-select"  name="status1" required>
   <option value="" selected disabled hidden>Choose Status</option>
   <option value="Permanent">Permanent</option>
   <option value="Temporary">Temporary</option>
   <option value="Contractual">Contractual</option>
   <option value="Contractual of Service">Contract of Service</option>
</select>
</div>


</div><!--End of row-->
<div class="row">

<div class="col-sm">
<!-- acad -->
<label for="yourEmail" class="form-label label_dept" id="show_label">Department:<sup>*</sup></label>
<select class="form-select acad-department" name="dep" id="acad" >
  <option value="" selected disabled hidden>Choose Department</option>
  <option value="Department of Computer Studies">Department of Computer Studies</option>
  <option value="Department of Hospitality Management">Department of Hospitality Management</option>
</select>

<!-- non acad -->
<select class="form-select non-acad-department" name="dep" id="non" >
  <option value="" selected disabled hidden>Choose Department</option>
  <option value="Guard">Guard</option>
  <option value="MIS">MIS</option>
</select>
</div>


</div><!--End of row--><br>

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
  <script>
 var catAcadSelect = document.getElementById('cat_acad');
var acadDepartmentSelect = document.getElementById('acad');
var nonAcadDepartmentSelect = document.getElementById('non');
var show = document.getElementById('show_label');

catAcadSelect.addEventListener('change', function() {
  if (catAcadSelect.value === 'academic') {
    acadDepartmentSelect.style.display = "block";
    show.style.display = "block";
    nonAcadDepartmentSelect.style.display = "none";
  } else if (catAcadSelect.value === 'non academic') {
    nonAcadDepartmentSelect.style.display = "block";
    acadDepartmentSelect.style.display = "none";
    show.style.display = "block";
  } else {
    acadDepartmentSelect.style.display = "none";
    nonAcadDepartmentSelect.style.display = "none";
    show.style.display = "none";
  }
});
</script>
</body>

</html>