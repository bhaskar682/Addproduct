<?php
include "config.php";
$name= $_POST['model_name'];
$id= $_POST['brand_id'];
$sql = "INSERT INTO model (model_name, brand_id) VALUES ('$name','$id')";
  	// execute query
  	mysqli_query($con, $sql);
?>