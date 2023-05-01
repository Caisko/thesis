<?php
  include 'assets/connection/connect.php';
  $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
  $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">QTY</th>
      <th scope="col">Equipment</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <?php

    $sql = "SELECT b.id, b.id_num, i.borrower_id_num as bnum,i.id as id_del, i.qr_id,i.quantity as quan, ce.id,ce.serial as se , ce.item_name as name1, ce.description as desc1,ce.quantity as quantity FROM item_borrow as i JOIN borrowers as b ON i.borrower_id_num = b.id JOIN cvsu_equipment as ce ON ce.id = i.qr_id WHERE b.id_num ='$id'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
  ?>
  <tbody>
    <tr>
      <?php 
      if(!empty($row['se'])){
      ?>
      <th scope="row"><?php echo $row['quan'];?></th>
      <?php } else{
      
      ?>
        <th scope="row"><input type="number" value="<?php echo $row['quan'];?>" style="width:40px;" min=1 max="<?php echo $row['quantity'];?>"></th>
      <?php
     }?>
      <td><?php echo $row['name1'];?></td>
      <td><?php echo $row['desc1'];?></td>
      <td><a href="delete_in_table.php?id=<?php echo $row["id_del"]; ?>&name=<?php echo $name; ?>&id=<?php echo $label; ?>" style="margin:5px;" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
      
    </tr>
  
  </tbody>
  <?php
   }
  } else {
    
  }
  ?>
</table>