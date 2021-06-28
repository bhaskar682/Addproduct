<html>
<head>
<title>Dynamic Dependent Select Box using jQuery and Ajax</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<form method="post" action="" id="contactform" onsubmit=" return validation()">
	<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name">
        <span id="name" class="text-danger" font-weight-></span>
      </div>
     <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" class="form-control" id="email">
      </div>
     <div class="form-group">
        <label for="city"></label>
        
      </div>
     <div class="form-group">
        <label for="message">Message:</label>
        <textarea name="message" class="form-control" id="message"></textarea>
      </div>

      <div class="form-inline">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Password Code">
                  
                        <label>Confirm password</label>
                        <input type="text" name="cnfpassword" class="form-control" placeholder="Confirm password " >
        </div>
<div>
<label>Country :</label><select name="country" class="country">
<option value="0">Select Country</option>
<?php
include('config.php');
$sql = mysqli_query($con,"SELECT * FROM country");
while($row=mysqli_fetch_array($sql))
{
echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
} ?>
</select><br/><br/>
<label>City :</label><select name="city" class="city">
<option>Select City</option>
</select>
 </div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".country").change(function()
{

var country_id=$(this).val();
var post_id = 'id='+ country_id;
 
$.ajax
({
type: "POST",
url: "ajax.php",
 data: { "name": name, "email": email, "message": message, post_id},
cache: false,
success: function(data)
{
            $('.result').html(data);
            $('#contactform')[0].reset();
          }
});
 
});
});
</script>
</body>
</html>