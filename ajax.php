<?php 
  include 'assets/connection/connect.php';

//Search box value assigning to $Name variable.
$Name = $_REQUEST['search'];
if (!empty($Name)) {
  //Search query.
  $status = "SELECT gatepass.name as name,gatepass.gatepass_id as gatepass_id,gatepass.gatepass_cat  as gatepass_cat,gatepass.id_number as id_number,gatepass.gatepass_cat as gatepass_cat,gatepass.address as `address`,gatepass.valid_until as valid_until,gatepass.phone_number as phone_number,
  unit_number.description as `description` FROM gatepass JOIN unit_number ON gatepass.id = unit_number.user_id where `gatepass_id` = '$Name'";
  //Query execution
  $result = mysqli_query($conn, $status);
  $row = mysqli_fetch_assoc($result);
  if ($result->num_rows > 0) {
    if ($row["gatepass_id"] == $Name) {
      date_default_timezone_set('Asia/Kolkata');
      $date1 = date_create(date("d-m-Y"));
      $date2 = date_create($row["valid_until"]);
      $exp = date_diff($date1, $date2);

?>
            <!-- Sales Card -->  <?php if ($row["gatepass_cat"] == "Teacher") { ?>
              <?php if ($date1 > $date2) { ?>
                <p>Status: <span  style="color:red;">EXPIRED</span> </p>
                  <?php } else { ?>
                    <p>Status: <span  style="color:green;">VALID</span> </p>
                    <?php } ?>
                <h5 class="text-control">Name: <?php echo strtoupper($row["name"]); ?></h5>
                <p>ID: <?php echo strtoupper($row["id_number"]); ?></p>
                <p>Gatepass Type: <?php echo strtoupper($row["gatepass_cat"]); ?></p>
                <p>Address: <?php echo strtoupper($row["address"]); ?></p>
                <p>Valid Until: <?php echo strtoupper($row["valid_until"]); ?></p>
                <p>Phone: <?php echo strtoupper($row["phone_number"]); ?></p>
                <p>Description: <?php echo strtoupper($row["description"]); ?></p>
               
             <?php } else if ($row["gatepass_cat"] == "Student") { ?>   
              <?php if ($date1 > $date2) { ?>
                <p>Status: <span  style="color:red;">EXPIRED</span> </p>
                  <?php } else { ?>
                    <p>Status: <span  style="color:green;">VALID</span> </p>
                    <?php } ?>
                <h5 class="text-control">Name: <?php echo strtoupper($row["name"]); ?></h5>
                <p>ID: <?php echo strtoupper($row["id_number"]); ?></p>
                <p>Gatepass Type: <?php echo strtoupper($row["gatepass_cat"]); ?></p>
                <p>Course: <?php echo strtoupper($row["course"]); ?></p>
                <p>Yr/Sec: <?php echo strtoupper($row["yr"]), " / ", strtoupper($row["section"]); ?></p>
                <p>Address: <?php echo strtoupper($row["address"]); ?></p>
                <p>Valid : <?php echo strtoupper($row["valid_until"]); ?></p>
                <p>Phone: <?php echo strtoupper($row["phone_number"]); ?></p>
                <p>Description: <?php echo strtoupper($row["description"]); ?></p>
               
                <?php } else { ?>

                  <?php if ($date1 > $date2) { ?>
                    <p>Status: <span  style="color:red;">EXPIRED</span> </p>
                  <?php } else { ?>
                    <p>Status: <span  style="color:green;">VALID</span> </p>
                    <?php } ?>
                    <h5 class="text-control">Name: <?php echo strtoupper($row["name"]); ?></h5>
                <p>ID: <?php echo strtoupper($row["id_number"]); ?></p>
                <p>Gatepass Type: <?php echo "STORE ", strtoupper($row["gatepass_cat"]); ?></p>
                <p>Gatepass Type: <?php echo strtoupper($row["name_store"]); ?></p>
                <p>Address: <?php echo strtoupper($row["address"]); ?></p>
                <p>Valid Until: <?php echo strtoupper($row["valid_until"]); ?></p>
                <p>Phone: <?php echo strtoupper($row["phone_number"]); ?></p>
                <p>Description: <?php echo strtoupper($row["description"]); ?></p>
             
                    <?php } ?>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php

    }
  } else {
    echo '<div class="alert alert-danger"><strong>Failed! </strong> No Data</div>';
  }
}
//Creating unordered list to display result.
?> 