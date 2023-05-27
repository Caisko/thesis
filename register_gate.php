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

              <div class="d-flex justify-content-center py-12">
                <a href="#" class=" d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" style="width:200px" alt="">
  
                </a>
              </div><!-- End Logo -->
                                       
<?php

if(isset($_GET['pass'])){
$pass = $_GET['pass'];
$status = "SELECT * from gatepass where passing_qr = '$pass'";
//Query execution
$result = mysqli_query($conn, $status);
$row = mysqli_fetch_assoc($result);
if ($result->num_rows > 0) {
if($row['passing_qr'] == $pass){
  $qr=$row['gatepass_id'];
}
else{
  header('location:pages-error-404.html');

}
}else{
  header('location:pages-error-404.html');
}
}
?>
              <div class="card align-items-center justify-content-center">
              
                <div class="card-body xl-12">
                   
  
                   <div class="row">
            
 
 <form  role="form"  method="post"  action="update_gate.php">

 <div class="row">
   <div class="col-sm">
       
        <input type="text"  value="<?php echo $qr; ?>" name="gate_id">
     </select>
     </div>
     </div>
<div class="row">
   <div class="col-sm">
       <label for="yourName" class="form-label">Gatepass Category:</label>
       <select class="form-control" id="gate_cat" name="gatepass_cat" onclick="cat()" required >
       <option value="" selected disabled hidden>Choose Gatepass Category</option>
        <option value="VALID UNTIL" >VALID UNTIL</option>
        <option value="LONG TERM" >LONG TERM</option>
     </select>
     </div>
     </div>

     <div class="row">
   <div class="col-sm">
       <label for="yourName" class="form-label">User Category:</label>
       <select class="form-control" id="gate" name="gatepass" onclick="gatepass1()" required >
       <option value="" selected disabled hidden>Choose User Category</option>
        <option value="Student" >Student</option>
        <option value="Teacher" >Academic Staff Member</option>
        <option value="Teacher" >Non-Academic Staff Member</option>
        <option value="Owner" >Concessioners</option>
     </select>
     </div>
     </div><!--End of row-->
     <div class="row">
   <div class="col-sm">
       <label for="yourName" class="form-label">ID Number/Stall Number:</label>
       <input type="text"  class="form-control" name="id_num" id="id"  required>
     </div>
     <div class="col-sm">
       <label for="yourName" class="form-label">Name: </label>
       <input type="text" class="form-control" id="name"  name="fname" required>
     </div>
     
     </div><!--End of row-->
     <div class="row">
   <div class="col-sm">
       <label for="yourName" class="form-label" style="display:none;"  id="store1">Name Store: </label>
       <input type="text"  class="form-control" id="store2" name="store" disabled style="display:none;">
     </div>
    
     
     </div><!--End of row-->
     <div class="row">
     <div class="col-sm">
   <label for="yourEmail" class="form-label" style="display:none;" id="label_stud">Course:</label>
      
        <select class="form-select" id="course1" name="course"   style="display:none;">
        <option value="" selected disabled hidden>Choose Course</option>
        <option value="Bachelor Of Arts In Journalism">Bachelor Of Arts In Journalism</option>
        <option value="Bachelor Of Early Childhood Education">Bachelor Of Early Childhood Education</option>
        <option value="Bachelor Of Elementary Education">Bachelor Of Elementary Education</option>
        <option value="Bachelor Of Science In Business Management">Bachelor Of Science In Business Management</option>
        <option value="Bachelor Of Science In Computer Science">Bachelor Of Science In Computer Science</option>
        <option value="Bachelor Of Science In Entrepreneurship">Bachelor Of Science In Entrepreneurship</option>
        <option value="Bachelor Of Science In Hospitality Management">Bachelor Of Science In Hospitality Management</option>
        <option value="Bachelor Of Science In Information Technology">Bachelor Of Science In Information Technology</option>
        <option value="Bachelor Of Science In Office Administration">Bachelor Of Science In Office Administration</option>
        <option value="Bachelor Of Science In Psychology">Bachelor Of Science In Psychology</option>
        <option value="Bachelor Of Secondary Education">Bachelor Of Secondary Education</option>
     </select>
     </div>
   <div class="col-sm">
   <label for="yourEmail" class="form-label" style="display:none;" id="label_stud2">Year:</label>
        <select class="form-select" id="yr1" name="yr"   style="display:none;">
        <option value="" selected disabled hidden style="display:none;">Choose Year</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
     </select>
     </div>
     <div class="col-sm">
   <label for="yourEmail" class="form-label" style="display:none;" id="label_stud1">Section:</label>
        <select class="form-select" id="section1" name="section" style="display:none;">
        <option value="" selected disabled hidden>Choose Section</option>
        <option>A</option>
        <option>B</option>
        <option>C</option>
        <option>D</option>
        <option>E</option>
        <option>F</option>
        <option>G</option>
        <option>H</option>
     </select>
     </div>
     
     </div><!--End of row-->
     <div class="row">
      <div class="col-sm">
        <label for="yourAge" class="form-label">Address:</label>
        <input type="text"  class="form-control" id="add" name="address" required>
      </div>
     
      </div><!--End of row-->
      <div class="row">
      <div class="col-sm">
        <label for="yourEmail" class="form-label">Date Register:</label>
        <input type="date"   class="form-control"  value="<?php echo date('Y-m-d'); ?>" name="date" readonly>
      </div>
      </div>
      <div class="row">
      <div class="col-sm">
        <label for="yourEmail" class="form-label" style="display:none;" id="label_valid">Valid Until</label>
        <input type="date" id="valid"  class="form-control" name="valid" style="display:none;" readonly>
      </div>
      </div><!--End of row-->
      <div class="row">
      <div class="col-sm">
  <label for="yourName" class="form-label">Phone Number:</label>
  <input type="tel" class="form-control" value="09" id="phone1" name="phone" pattern="[0-9]*" minlength="11"  placeholder="09" maxlength="11" required>
</div>
<div id="error-msg" style="display: none; color: red;">Please enter a valid 11 digit phone number</div>
  
</div><!--End of row-->

   
      <!-- <div class="row">
      <div class="col-sm">
        <label for="yourName" class="form-label" >Technical:</label>
        <select class="form-control" id="technical" onclick="tech()" required >
       <option value="" selected disabled hidden>Choose Technical Category</option>
        <option value="1" >with Technical</option>
        <option value="0" >Without Technical</option>
   
     </select>
      </div>

    
      </div>End of row -->
      

      <div class="row">
      <div class="col-sm">
        <label for="yourName" class="form-label" id="name_tech" style="display: none;">Technical Name:</label>
        <input type="text" id="tech1" class="form-control" name="technical_check" readonly style="display: none;">
      </div> </div>
<br>
    
      <!--End of row-->
    <div class="row">
      <div class="col-sm">
        <button class="btn btn-primary w-100" type="submit" name="submit">Proceed</button>
      </div>
      </div>
      
     
    </form>

    <script>
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
              </div>
              </div>
              </div>
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
     
      </script>
   
   <script>
           
           function gatepass1() {
              var gate1 = document.getElementById("gate").value;
             
              console.log(gate1); 
              if(gate1 == "Teacher"){

                document.getElementById("label_stud").style.display = "none";
                document.getElementById("label_stud1").style.display = "none";
                document.getElementById("label_stud2").style.display = "none";
                document.getElementById("course1").style.display = "none";
                document.getElementById("yr1").style.display = "none";
                document.getElementById("section1").style.display = "none";
                document.getElementById("store1").style.display = "none";
                document.getElementById("store2").style.display = "none";

                document.getElementById("course1").disabled = true;
                document.getElementById("yr1").disabled = true;
                document.getElementById("section1").disabled = true;
                document.getElementById("store2").disabled = true;
                document.getElementById("store2").value="";
                document.getElementById("course1").value="";
                document.getElementById("yr1").value="";
                document.getElementById("section1").value="";
              }else if(gate1 == "Owner"){
                document.getElementById("label_stud").style.display = "none";
                document.getElementById("label_stud1").style.display = "none";
                document.getElementById("label_stud2").style.display = "none";
                document.getElementById("course1").style.display = "none";
                document.getElementById("yr1").style.display = "none";
                document.getElementById("section1").style.display = "none";
                document.getElementById("store1").style.display = "block";
                document.getElementById("store2").style.display = "block";
                document.getElementById("store2").disabled = false;

                document.getElementById("course1").value="";
                document.getElementById("yr1").value="";
                document.getElementById("section1").value="";
                
              } else if(gate1 == "Student"){
             
                document.getElementById("label_stud").style.display = "block";
                document.getElementById("label_stud1").style.display = "block";
                document.getElementById("label_stud2").style.display = "block";
                document.getElementById("course1").style.display = "block";
                document.getElementById("yr1").style.display = "block";
                document.getElementById("section1").style.display = "block";
                document.getElementById("store2").disabled = true;
                document.getElementById("course1").disabled = false;
                document.getElementById("yr1").disabled = false;
                document.getElementById("section1").disabled = false;
                document.getElementById("store2").value="";
              }
            }
            
                  
            function serial(){
              var serial1 = document.getElementById("serial1").value;
              if(serial1 == 1){
                document.getElementById("unit").readOnly = false;
                
              }else{
                document.getElementById("unit").readOnly = true;
                
              }
            }

            function tech(){
              var tech2 = document.getElementById("technical").value;
              if(tech2 == 1){
                document.getElementById("tech1").readOnly = false;
                document.getElementById("tech1").style.display = "block";
                document.getElementById("name_tech").style.display = "block";
                
              }else{
                document.getElementById("tech1").readOnly = true;
                document.getElementById("tech1").style.display = "none";
                document.getElementById("name_tech").style.display = "none";
                document.getElementById("tech1").value = "";
              }
            }
                       
                       
            function cat(){
              var cat = document.getElementById("gate_cat").value;
              if(cat == "VALID UNTIL"){
                document.getElementById("valid").readOnly = false;
                document.getElementById("valid").style.display = "block";
                document.getElementById("label_valid").style.display = "block";
              }else{
                document.getElementById("valid").readOnly = true;
                document.getElementById("valid").value = "";
                document.getElementById("valid").style.display = "none";
                document.getElementById("label_valid").style.display = "none";
                
              }
            }
            
    document.getElementById("store2").addEventListener("keypress", function(e){
        if(!document.getElementById("store2").value && e.keyCode === 32){
            e.preventDefault();
        }
    });
    document.getElementById("tech1").addEventListener("keypress", function(e){
        if(!document.getElementById("tech1").value && e.keyCode === 32){
            e.preventDefault();
        }
    });


    var id = document.getElementById("id");
       var name1 = document.getElementById("name");
     

      id.addEventListener("keypress", function(e){
        if(!id.value && e.keyCode === 32){
            e.preventDefault();
        }
    });
   
      name1.addEventListener("keypress", function(e){
        if(!name1.value && e.keyCode === 32){
            e.preventDefault();
        }
    });
    var add1 = document.getElementById("add");
    add1.addEventListener("keypress", function(e){
        if(!add1.value && e.keyCode === 32){
            e.preventDefault();
        }
    });

 input.addEventListener('input', function(){
    var letterRegex = /^[a-zA-Z]+$/;
    if (!letterRegex.test(input.value)) {
      input.value = input.value.slice(0, -1);
    }
  });
    document.getElementById("valid").min = new Date().toISOString().split("T")[0];
    
    history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
  history.pushState(null, null, document.URL);
});


        </script>
</body>

</html>