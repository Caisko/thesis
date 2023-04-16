
     <?php
     include 'assets/connection/connect.php';
     include "phpqrcode/qrlib.php";
     $PNG_TEMP_DIR = 'temp/';

     if (!file_exists($PNG_TEMP_DIR)) {
         mkdir($PNG_TEMP_DIR);
     }
     $filename = $PNG_TEMP_DIR . 'QR.png';

     if (isset($_POST["submit"])) {
         if (empty($_POST["store"]) && $_POST["gatepass"] == "Student") {
             $_POST["store"] = null;
             $codeString =  $_POST["gate_id"];
            

             $filename = $PNG_TEMP_DIR . 'Qr' . md5($codeString) . '.png';

             QRcode::png($codeString, $filename);
             $gate_id = $_POST["gate_id"];
             $tc = $_POST["technical_check"];
             $gatepass = $_POST["gatepass"];
             $gatepass2 = $_POST["gatepass_cat"];
             $id = $_POST["id_num"];
             $fname = $_POST["fname"];
             $course = $_POST["course"];
             $yr = $_POST["yr"];
             $section = $_POST["section"];
             $address = $_POST["address"];
             $store = $_POST["store"];
             $date = $_POST["date"];
             $valid_until = $_POST["valid"];
             $phone = $_POST["phone"];
            
             echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" style="width:250px;margin:auto;" hidden>';
             $sql = "INSERT INTO `gatepass`(`gatepass_id`,`gatepass_cat`,`gate_cat_2`, `id_number`, `name`, `course`, `yr`, `section`, `address`, `date_register`,`valid_until`, `phone_number`, `qr`,`name_store`,`gatepass_status`,`transaction`,`in/out`,`fk_admins`,`technical_name`) 
  VALUES ('$gate_id','$gatepass','$gatepass2','$id','$fname','$course','$yr','$section','$address','$date','$valid_until','$phone','$filename',NULL,'request','pending',NULL,(SELECT id FROM admins where id =  '$id_admin'),'$tc')";
             if ($conn->query($sql) === true) {
                       header("Location: item.php?id=$gate_id");
                   } else {
                     echo "Error: " . $sql . "<br>" . $conn->error;
                   }
                 
         } elseif (empty($_POST["store"]) && empty($_POST["course"]) && empty($_POST["yr"]) && empty($_POST["section"]) && $_POST["gatepass"] == "Teacher") {
             $_POST["store"] = null;
             $_POST["course"] = null;
             $_POST["yr"] = null;
             $_POST["section"] = null;
             $codeString =  $_POST["gate_id"];
             $filename = $PNG_TEMP_DIR . 'Qr' . md5($codeString) . '.png';
             QRcode::png($codeString, $filename);
             $tc = $_POST["technical_check"];
             $gate_id = $_POST["gate_id"];
             $gatepass = $_POST["gatepass"];
             $gatepass2 = $_POST["gatepass_cat"];
             $id = $_POST["id_num"];
             $fname = $_POST["fname"];
             $address = $_POST["address"];
             $date = $_POST["date"];
             $valid_until = $_POST["valid"];
             $phone = $_POST["phone"];
           
             echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" style="width:250px;margin:auto;" hidden>';

           
                 $sql = "INSERT INTO `gatepass`(`gatepass_id`,`gatepass_cat`,`gate_cat_2`, `id_number`, `name`, `course`, `yr`, `section`, `address`, `date_register`,`valid_until`, `phone_number`, `qr`,`name_store`,`gatepass_status`,`transaction`,`in/out`,`fk_admins`,`technical_name`) 
VALUES ('$gate_id','$gatepass','$gatepass2','$id','$fname',NULL,NULL,NULL,'$address','$date','$valid_until','$phone','$filename',NULL,'request','pending',NULL,(SELECT id FROM admins where id =  '$id_admin'),'$tc')";
                 if ($conn->query($sql) === true) {
                    header("Location: item.php?id=$gate_id");
                 } else {
                     echo "Error: " . $sql . "<br>" . $conn->error;
                 }
           
         } elseif (empty($_POST["course"]) && empty($_POST["yr"]) && empty($_POST["section"]) && $_POST["gatepass"] == "Owner") {
             $_POST["course"] = null;
             $_POST["yr"] = null;
             $_POST["section"] = null;

             $codeString =  $_POST["gate_id"];
            

             $filename = $PNG_TEMP_DIR . 'Qr' . md5($codeString) . '.png';

             QRcode::png($codeString, $filename);
             $tc = $_POST["technical_check"];
             $gate_id = $_POST["gate_id"];
             $gatepass = $_POST["gatepass"];
             $gatepass2 = $_POST["gatepass_cat"];
             $id = $_POST["id_num"];
             $fname = $_POST["fname"];
             $store = $_POST["store"];
             $address = $_POST["address"];
             $date = $_POST["date"];
             $valid_until = $_POST["valid"];
             $phone = $_POST["phone"];
         
             echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" style="width:250px;margin:auto;" hidden>';
         
                 $sql = "INSERT INTO `gatepass`(`gatepass_id`,`gatepass_cat`,`gate_cat_2`, `id_number`, `name`, `course`, `yr`, `section`, `address`, `date_register`,`valid_until`, `phone_number`, `qr`,`name_store`,`gatepass_status` ,`transaction`,`in/out`,`fk_admins`,`technical_name`) 
VALUES ('$gate_id','$gatepass','$gatepass2','$id','$fname',NULL,NULL,NULL,'$address','$date','$valid_until','$phone','$filename','$store','request','pending',NULL,(SELECT id FROM admins where id =  '$id_admin'),'$tc')";
                 if ($conn->query($sql) === true) {
                    header("Location: item.php?id=$gate_id");
                 } else {
                     echo "Error: " . $sql . "<br>" . $conn->error;
                 }
           
            
         }
      
}
     ?>
