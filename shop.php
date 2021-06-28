<!DOCTYPE html>
<html>
<head>

	<title>Stock Management System</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">


  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>


	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

          
       
        <div class="div-action pull pull-left" style="padding-bottom:20px;">
          <button class="btn btn-default button1" data-toggle="modal" data-target="#addBrandModel"> <i class="glyphicon glyphicon-plus-sign"></i> Add Brand </button>
        </div>         
	
		
       <div class="div-action pull pull-left" style="padding-bottom:20px;">
          <button class="btn btn-default button1" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Categories </button>
        </div> <!-- /div-action -->       
		
		
        <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> Product </a></li> 
		
		
      
		
	          
          </ul>
        </li>        
           
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>
  <div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form class="form-horizontal" id="submitBrandForm">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> Add Brand</h4>
        </div>
        <div class="modal-body">

          <div id="add-brand-messages"></div>

          <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Brand Name: </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="brandName" placeholder="Brand Name" name="brandName" autocomplete="off">
            </div>
          </div> <!-- /form-group-->                    
          <div class="form-group">
            <label for="brandStatus" class="col-sm-3 control-label">Status: </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <select class="form-control" id="brandStatus" name="brandStatus">
                <option value="">~~SELECT~~</option>
                <option value="1">Available</option>
                <option value="2">Not Available</option>
              </select>
            </div>
          </div> <!-- /form-group-->                    

        </div> <!-- /modal-body -->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
          <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Save Changes</button>
        </div>
        <!-- /modal-footer -->
      </form>
       <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<div class="modal fade" id="addCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form class="form-horizontal" id="submitCategoriesForm" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> Add Categories</h4>
        </div>
        <div class="modal-body">

          <div id="add-categories-messages"></div>

          <div class="form-group">
            <label for="categoriesName" class="col-sm-4 control-label">Categories Name: </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="categoriesName" placeholder="Categories Name" name="categoriesName" autocomplete="off">
            </div>
          </div> <!-- /form-group-->                    
          <div class="form-group">
            <label for="categoriesStatus" class="col-sm-4 control-label">Status: </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-7">
              <select class="form-control" id="categoriesStatus" name="categoriesStatus">
                <option value="">~~SELECT~~</option>
                <option value="1">Available</option>
                <option value="2">Not Available</option>
              </select>
            </div>
          </div> <!-- /form-group-->                    
        </div> <!-- /modal-body -->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
          
          <button type="submit" class="btn btn-primary" id="createCategoriesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
        </div> <!-- /modal-footer -->       
      </form> <!-- /.form -->      
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->
<script >
  $(document).on('submit','#submitBrandForm',function(e){
        e.preventDefault();
       
        $.ajax({
        method:"POST",
        url: "insertbrand.php",
        data:$(this).serialize(),
        success: function(data){
        $('#msg').html(data);
        $('#submitBrandForm').find('input').val('')
    }});


});
    $(document).on('submit','#submitCategoriesForm',function(p){
        p.preventDefault();
       
        $.ajax({
        method:"POST",
        url: "insertmodel.php",
        data:$(this).serialize(),
        success: function(data){
        $('#msg').html(data);
        $('#submitCategoriesForm').find('input').val('')
    }});


});
    $(document).on('submit','#submitCategoriesForm',function(p){
        p.preventDefault();
       
        $.ajax({
        method:"POST",
        url: "insertmodel.php",
        data:$(this).serialize(),
        success: function(data){
        $('#msg').html(data);
        $('#submitCategoriesForm').find('input').val('')
    }});


});

</script>