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

// inserting a new user info into the `user` table of the database.
$q3=mysqli_query($con,"INSERT INTO user VALUES  ('$name' , '$gender' , '$email' , '$mob', '$password', '$role')");
/* if the quer successful in inserting a new user into the database. 
If it was successful, it starts a new session and sets session variables for the user. 
It also inserts a new row into the `user_progress` table with the
user's email and sets the progress to 0 (this is because user start courses from beginning). 
Finally, it redirects the user to the `account.php` page with a query string parameter `q=1`. */
if($q3) {
    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $name;
    $_SESSION["moduleNum"] = $moduleNum;

    $moduleSetUp = mysqli_query($con, "INSERT INTO user_progress VALUES (0, '$email', 0, NULL)");
    header("location:account.php?q=1");
    
} else {
    header("location:index.php?q7=Email Already Registered!!!");
}
ob_end_flush();
?>