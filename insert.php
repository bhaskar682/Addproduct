<!DOCTYPE html>
<html>
<head>
	<title>Brand</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <form id="form" method="post" enctype="multipart/form-data" onsubmit="return insert(this)">
  <div class="mb-3">
    <label for="brandname" class="form-label">Brand name</label>
    <input type="text" class="form-control" id="brandname" aria-describedby="brandname">
    
  <div class="mb-3">
    <label for="logo" class="form-label">Logo</label>
    <input type="file" class="form-control" id="logo">
  </div>

  <button type="submit" name = "submit" class="btn btn-primary">Submit</button>

    <a href="insertmodel.php" class="btn btn-primary">Insert model</a>



</form>
 <script type="text/javascript">
 	function insert(data)
{
//console.log(document.getElementById("#form"));
var formData = new FormData(data);


$.ajax({
type:'POST',
url:'data.php',
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
