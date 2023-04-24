<!-- /* destroying the current session if the 'email' session variable is set. It then
redirects the user to the specified in the 'q' GET parameter. */ -->
<?php 
session_start();

if(isset($_SESSION['email'])) {
    session_destroy();
}

$ref = @$_GET['q'];

header("location:$ref");
?>