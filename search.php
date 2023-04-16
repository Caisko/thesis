<?php
$search = $_GET['search'];
$sql = "SELECT * FROM gatepass WHERE name LIKE '%$search%' OR gatepass_id LIKE '%$search%' ORDER BY valid_until ASC";
$result = $conn->query($sql);
?>