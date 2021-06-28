<?php
//fetch.php
 require_once 'db_connect.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT product.product_id, product.product_name, product.product_image, product.brand_id,
    product.categories_id, product.quantity, product.rate, product.active, product.status, 
    brands.brand_name, categories.categories_name FROM product 
    INNER JOIN brands ON product.brand_id = brands.brand_id 
    INNER JOIN categories ON product.categories_id = categories.categories_id   
  WHERE product_name LIKE '%".$search."%'
 
 ";
}
else
{
 $query = "SELECT product.product_id, product.product_name, product.product_image, product.brand_id,
    product.categories_id, product.quantity, product.rate, product.active, product.status, 
    brands.brand_name, categories.categories_name FROM product 
    INNER JOIN brands ON product.brand_id = brands.brand_id 
    INNER JOIN categories ON product.categories_id = categories.categories_id  
    WHERE product.status = 1 AND product.quantity>0";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
  
{
   
$output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>Product Image</th>
     <th>Product Name</th>
     <th>Rate</th>
     <th>Quantity</th>
     <th>Brand</th>
     <th>Category</th>
     <th>Status</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
 ';
  while($row = mysqli_fetch_array($result))
 {
  $status='';
  if($row[7] == 1) {
    // activate member
    $status = "<label class='label label-success'>Available</label>";
  } else {
    // deactivate member
    $status = "<label class='label label-danger'>Not Available</label>";
  } // /else

   $imageUrl = substr($row[2], 3);
  $productImage = "<img class='img-round' src='".$imageUrl."' style='height:30px; width:50px;'  />";
  $output .= '
   <tr>
   <td>'.$productImage.'</td>
   <td>'.$row["product_name"].'</td>
    <td>'.$row["rate"].'</td>
    <td>'.$row["quantity"].'</td>
     <td>'.$row["brand_name"].'</td>
      <td>'.$row["categories_name"].'</td>
       <td>'.$status.'</td>
       <td><button type="button" class="btn btn-default" id="user_'.$row["product_id"].'" onclick="edit_user(${key}) data-toggle="modal" data-target="#editProductModal""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></td>
        <td><button type="button" class="btnDelete" id="user_'.$row["product_id"].'" onclick="delete_user(${key})"><i class="fa fa-trash"></i></button></td>
    
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>