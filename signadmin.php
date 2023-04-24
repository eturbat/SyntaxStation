<!-- /* if admin's insertion is successful, it redirects the user to a dashboard page with a
success message. */ -->
<?php
include_once 'dbConnection.php';
$email = $_POST['email'];
$password = $_POST['password'];

$q=mysqli_query($con,"INSERT INTO admin VALUES  ('$email' , '$password' , 'admin')");


header("location:dash.php?q=8&message=Successfully registered!");


?>