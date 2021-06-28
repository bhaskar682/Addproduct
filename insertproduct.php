<!DOCTYPE html>
<html>
<head>
<title>Brand</title>
		<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

</head>
<body>
<div class="d-flex justify-content-center" >
<form method="POST" id="form"  action="" enctype="multipart/form-data" onsubmit="return insert(this)" >
<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Product Name</label>
<input type="text" name="product_name" class="form-control" id="product_name" aria-describedby="emailHelp">
<label for="exampleInputEmail1" class="form-label">Product Price</label>
<input type="text" name="product_price" class="form-control" id="product_price" aria-describedby="emailHelp">
</div>
<select class="form-control" >
	<?php
include_once 'config.php';
    $select = "SELECT * FROM model";
    $result = mysqli_query ($con, $select);
    while($row=mysqli_fetch_array($result))
    {
   ?>
        <option  >Select </option>  
    	<option value="<?php echo $row['model_id']; ?>"> <?php echo $row['model_name']; ?></option>

   <?php } ?>
?>
   </select>	



<input type="submit" name="submit" class="btn btn-primary" value="Save to database" id="submit">

<a href="insertProduct.php" class="btn btn-primary">Insert Product</a>
<a href="showproduct.php" class="btn btn-primary">Show Product</a>






</form>
</div>
<script>
function insert(data)
{
// console.log(document.getElementById("#form"));
var formData = new FormData(data);


$.ajax({
type:'POST',
url:'data3.php',
data:formData,
cache: false,
processData: false,
contentType: false,
success: function()
{
alert(data);
},

});
return false;

}


</script>
</body>
</html>