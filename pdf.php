<?php
require_once 'db_connect.php';
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$sql = "SELECT product.product_id, product.product_name,  product.brand_id,
    product.categories_id, product.quantity, product.rate, product.active, product.status, 
    brands.brand_name, categories.categories_name FROM product 
    INNER JOIN brands ON product.brand_id = brands.brand_id 
    INNER JOIN categories ON product.categories_id = categories.categories_id  
    WHERE product.status = 1 AND product.quantity>0";
    $result = $connect->query($sql);

$output = array('data' => array());



$result = mysqli_query($connect, $sql);
//initialize dompdf class

$document = new Dompdf();

$html = '
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

';

$document->loadHtml($html);
// $page = file_get_contents("showdata.php");

// $document->loadHtml($page);





$output = "
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #6DB4B2;
}
</style>
<table>
 <tr>
 <th>Product ID</th>
  <th>Product Name</th>
  <th>Rate</th>
  <th>Quantity</th>
  <th>Brand</th>
  <th>Category</th>
  <th>Status</th>
 </tr>
";

 $active = ""; 


while($row = mysqli_fetch_array($result))


{
    if($row["active"] == 1) {
    // activate member
    $active = "<label background-color: #C70039>Available</label>";
  } else {
    // deactivate member
    $active = "<label class='label label-danger'>Not Available</label>";
  } // 
 $output .= '
  <tr>
  <td>'.$row["product_id"].'</td>
   <td>'.$row["product_name"].'</td>
   <td>'.$row["rate"].'</td>
   <td>'.$row["quantity"].'</td>
   <td>'.$row["brand_id"].'</td>
   <td>'.$row["categories_id"].'</td>
   <td>'.$active.'</td>


  </tr>
 ';
}

$output .= '</table>';

// echo $output;

$document->loadHtml($output);

//set page size and orientation

$document->setPaper('A4', 'landscape');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("pdf", array("Attachment"=>1));
//1  = Download
//0 = Preview


?>