<?php
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$email = $_POST['uname'];
$password = $_POST['password'];

// /* This query to select the email from the `admin` table where the
// email and password match the values submitted through a form, and the role is set to 'professor'.
// The query is executed using the `mysqli_query()` function and the result is stored in the ``
// variable. */
$result = mysqli_query($con,"SELECT email FROM admin WHERE email = '$email' and password = '$password' and role = 'professor'") or die('Error');
$count=mysqli_num_rows($result);

if($count==1) {
    session_start();
    
    if(isset($_SESSION['email'])) {
        session_unset();
    }

    $_SESSION["name"] = 'Turbat';
    $_SESSION["key"] ='Turbat123';
    $_SESSION["email"] = $email;

    header("location:dash.php?q=0");
}
else header("location:$ref?w=Warning : Access denied");
?>