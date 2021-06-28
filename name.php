<?php
	include 'config.php';
	$brand_name=$_POST['brand_name'];
	echo "<script>Window.alert();</script>";
// 	$file = $_FILES['brand_img']['name'];
// $file_temp = $_FILES['brand_img']['tmp_name'];
// $path='brand logo/'.$file;
// move_uploaded_file($file_temp,$path);
	
	$duplicate=mysqli_query($con,"select * from brand where brand_name='$brand_name'");
	echo $duplicate;
	if (mysqli_num_rows($duplicate)>0)
	{
		echo json_encode(array("statusCode"=>201));
	}
	else{
		$sql = "INSERT INTO `brand`( `brand_name`) 
		VALUES ('$brand_name')";
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
	}
	mysqli_close($con);
?>
  