<html>
<head>
<title>jQuery add / remove textbox example</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<style type="text/css">
    div{
        padding:8px;
    }
</style>

</head>

<body>

<h1>jQuery add / remove textbox example</h1>

<script type="text/javascript">

$(document).ready(function(){

    var counter = 2;

    $("#addButton").click(function () {

   
    var newTextBoxDiv = $(document.createElement('div'))
         .attr("id", 'TextBoxDiv' + counter);

    newTextBoxDiv.after().html('<label>Textbox #'+ counter + ' : </label>' +
          '<input type="text" name="textbox' + counter + 
          '" id="textbox' + counter + '" value="" >');

    newTextBoxDiv.appendTo("#TextBoxesGroup");


    counter++;
     });

  });
</script>
</head><body>

<div id='TextBoxesGroup'>
    <div id="TextBoxDiv1">
        <label>Textbox #1 : </label><input type='textbox' id='textbox1' >
    </div>
</div>
<input type='button' value='Add Button' id='addButton'>


</body>
</html>