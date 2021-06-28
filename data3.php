<?php
include "config.php";
$product_name= $_POST['product_name'];
$id= $_POST['model_id'];
$product_price=$_POST['product_price'];
$sql = "INSERT INTO product (product_name, model_id,product_price) VALUES ('$product_name','$id','$product_price')";
  	// execute query
  	mysqli_query($con, $sql);
?>