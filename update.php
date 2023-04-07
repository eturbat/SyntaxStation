<?php
include_once 'dbConnection.php';
session_start();
$email = $_SESSION['email'];

//delete user
if (isset($_GET['demail'])) {
  $demail = @$_GET['demail'];
  $r1 = mysqli_query($con, "DELETE FROM user_progress WHERE email='$demail' ") or die('Error');
  $r2 = mysqli_query($con, "DELETE FROM history WHERE email='$demail' ") or die('Error');
  $result = mysqli_query($con, "DELETE FROM user WHERE email='$demail' ") or die('Error');
  $role = $_GET['role'];
  $result = $role == "student" ? 11 : 12;
  header("location:dash.php?q=".$result);
  //
}

//delete admin

if (isset($_GET['demail1'])) {
  if (@$_GET['demail1']) {
    $demail1 = @$_GET['demail1'];

    $result = mysqli_query($con, "DELETE FROM admin WHERE email='$demail1' and role ='admin' ") or die('Error');
    header("location:dash.php?q=9");
  }
}
