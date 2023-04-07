<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$gender = $_POST['gender'];
$email = $_POST['email'];
$role = $_POST['role'];
$mob = $_POST['mob'];
$password = $_POST['password'];
$password = md5($password);

$q3=mysqli_query($con,"INSERT INTO user VALUES  ('$name' , '$gender' , '$email' , '$mob', '$password', '$role')");
if($q3) {
    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $name;
    
} else {
    header("location:index.php?q7=Email Already Registered!!!");
}
ob_end_flush();
?>
//