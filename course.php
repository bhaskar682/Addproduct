<!DOCTYPE html>
<html>
<head>
	<title>Course planar</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
</head>
<style >
	input[name=coursename]
	{
		
		padding: 12px 20 px;
		margin: 8px 0;
		background-color: #fad6ff ;
		border: none;
	}
	input[id=TextBoxDiv]
	{
		background-color: #9cd6ff;
		border: none;
	}
input[id=TextBoxesGroup]
	{
		background-color: #9cd6ff;
		border: none;
	}

input[name=quiz]
	{ 
		margin-left:5px;
		background-color: #99ffdb;
		border: none;
	}
	

</style>
<body>
	<div class="container">
		<div class="d-flex justify-content-center">
		  <h2> <font color=black font face='arial' size='6pt'>COURSE PLANAR </font> </p></h2>
		  </div>
		<form method="POST" id="course" >
			<div class="mb-3">

				<label for="coursename" class="form-label"> Course Name </label><br>
				<input type="text" name="coursename" size="50" >
				
				<br>
				<div class="">
             <div class="rows">

				<table id="datatable">
				<td>
        	<input type="button" id="add" onclick="addRow('dataTable')" value="Add"/>
        </td>
        <td>
        	<input type="button" id="delete" onclick="delRow('dataTable')" value="Delete"/>
        </td>		
       <tr><td>Lesson</td> <td>:</td> <td >

        <td><input type="text"  /></td>
        
       </tr>
       
       <tr><td>Quiz</td> <td>:</td> <td >
        <td><input type="text"  /></td>
          
       </tr>
     </table> 


 </button>
				</div>
				<!-- <div class="form-group form-inline" id="TextBoxquiz">
					&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  <label for="coursename" class="form-label"> Quiz </label>
				    <input type="text" name="quiz" size="15" >
					 <input type='button' value='Add Button' id='addButton2'>
				</div> -->
				
			</div>
			</div>
		</div>
		</form>
		

	 </div>
	<script type="text/javascript">


$(document).ready(function(){
var counter = 2;
var counter2=2;

  $('#add').click(function(){ 
        $('#datatable').append(' <tr> <td>Lesson</td> <td>:</td> <td colspan="2"><input size="20" type="text" /></td>  </tr> <tr> <td>Quiz</td> <td>:</td> <td colspan="2"><input type="text" + /></td>  </tr>');
}); 

$(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });

  $("#addButton2").click(function () {
      
   
    var newTextBoxDiv = $(document.createElement('div'))
         .attr("id", 'TextBoxquiz' + counter2);

    newTextBoxDiv.after().html('&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<label>Quiz '+ counter2 + ' : </label>' +
          '<input type="text"  name="quiz' + counter2 + 
          '" id="quiz' + counter2 + '" value="" >');

    newTextBoxDiv.appendTo("#TextBoxquiz");


    counter2++;
     });
 
  });

     
</script>
	

</body>
</html>