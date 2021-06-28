<?php
include_once "db_connect.php";
require_once __DIR__ . '/mpdf/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

s


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
 <th>ID</th>
  <th>Name</th>
  <th>E-mail</th>
  <th>Phone</th>
  <th>Created</th>
  <th>Status</th>
 </tr>
";

 $active = ""; 


while($row = mysqli_fetch_array($result))


{
    
 $output .= '
  <tr>
  <td>'.$row["id"].'</td>
   <td>'.$row["name"].'</td>
   <td>'.$row["email"].'</td>
   <td>'.$row["phone"].'</td>
   <td>'.$row["created"].'</td>
   <td>'.$row["status"].'</td>


  </tr>
 ';
}

$output .= '</table>';

$mpdf->WriteHTML($output);
$mpdf->output("myfile.pdf",'D');