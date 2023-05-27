
<?php
include 'assets/connection/connect.php';


if (isset($_POST["submit"])) {
    if (empty($_POST["store"]) && $_POST["gatepass"] == "Student") {
        $_POST["store"] = null;
  

      echo  $gate_id = $_POST["gate_id"];
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
       
        $sql = "UPDATE  `gatepass` SET `gatepass_cat` = '$gatepass',
        `gate_cat_2` = '$gatepass2', `id_number` = '$id', `name`= '$fname',date_register = '$date',
        course = '$course', yr = '$yr',section = '$section', address = '$address',
        valid_until = '$valid_until',phone_number = '$phone' WHERE gatepass_id = '$gate_id'";
            
        if ($conn->query($sql) === TRUE) {
            header("Location: item.php?id=$gate_id");
        } else {
            echo "Error updating record: " . $conn->error;
        }
            
    


    } elseif (empty($_POST["store"]) && empty($_POST["course"]) && empty($_POST["yr"]) && empty($_POST["section"]) && $_POST["gatepass"] == "Teacher") {
        $_POST["store"] = null;
        $_POST["course"] = null;
        $_POST["yr"] = null;
        $_POST["section"] = null;
       
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
      
    
        $sql = "UPDATE  `gatepass` SET `gatepass_cat` = '$gatepass',
        `gate_cat_2` = '$gatepass2', `id_number` = '$id', `name`= '$fname',date_register = '$date', address = '$address',valid_until = '$valid_until',phone_number = '$phone' 
        
        WHERE gatepass_id = '$gate_id'";

            if ($conn->query($sql) === true) {
               header("Location: item.php?id=$gate_id");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
      
    }
elseif (empty($_POST["course"]) && empty($_POST["yr"]) && empty($_POST["section"]) && $_POST["gatepass"] == "Owner") {
        $_POST["course"] = null;
        $_POST["yr"] = null;
        $_POST["section"] = null;

     
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
    
        $sql = "UPDATE  `gatepass` SET `gatepass_cat` = '$gatepass',name_store = '$store',
        `gate_cat_2` = '$gatepass2', `id_number` = '$id', `name`= '$fname',date_register = '$date', address = '$address',valid_until = '$valid_until',phone_number = '$phone' 
        
        WHERE gatepass_id = '$gate_id'";

                if ($conn->query($sql) === true) {
               header("Location: item.php?id=$gate_id");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
      
       
    }
 
}
?>