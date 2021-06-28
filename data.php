<?php
include("config.php");

 	$name = $_POST['brand_name'];
  
  	// Get image name
  	$image = $_FILES['image']['name'];
  	

  	// image file directory
  	$target = "brand logo/".basename($image);

  	$sql = "INSERT INTO brand (brand_img, brand_name) VALUES ('$image','$name')";
  	// execute query
  	mysqli_query($con, $sql);

  	 (move_uploaded_file($_FILES['image']['tmp_name'], $target))


?>