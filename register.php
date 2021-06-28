<?php 
include 'config.php';
if(!empty($_POST)) {
 $name = $_POST['name'];
 $email = $_POST['email'];
 $message = $_POST['message']; 
 
 mysqli_query($con, "INSERT INTO user(firstname, email, about) values ('$name', '$email', '$message')"); 
 
 echo "Name : ".$name."</br>";
 echo "Email : ".$email."</br>";
 echo "Message : ".$message."</br>";
}
    ?>

