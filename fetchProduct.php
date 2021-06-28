<?php 	


include "db_connect.php";

$sql = "SELECT product.product_id, product.product_name, product.product_image, product.brand_id,
 		product.categories_id, product.quantity, product.rate, product.active, product.status, 
 		brands.brand_name, categories.categories_name FROM product 
		INNER JOIN brands ON product.brand_id = brands.brand_id 
		INNER JOIN categories ON product.categories_id = categories.categories_id  
		WHERE product.status = 1 AND product.quantity>0";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$arr['productid'] = $row[0];
 	// active 
 	if($row[7] == 1) {
 		// activate member
 		$active = "<label class='label label-success'>Available</label>";
 	} else {
 		// deactivate member
 		$active = "<label class='label label-danger'>Not Available</label>";
 	} // /else

    
    $arr['productname']= $row[1];
	$arr['brand'] = $row[9];
	$arr['category'] = $row[10];
    $arr['rate']=$row[6];
    $arr['quantity']= $row[5];
    $arr['status']= $active;
	$imageUrl = substr($row[2], 3);
	$arr['productImage'] = "<img class='img-round' src='".$imageUrl."' style='height:30px; width:50px;'  />";

	 $res[] = $arr;
 } // /while 
echo json_encode(array("message"=>"fetch successfully","status"=>"success",  "data"=>$res,"code"=>200));
}// if num_rows

else{
  echo json_encode(array("message"=>"data not found","status"=>"Unsuccess","data"=>array(),"code"=>404));
}
$connect->close();