<!DOCTYPE html>
<html>

<head>
  <title>SyntaxStation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font.css">
  <script src="js/jquery.js" type="text/javascript"></script>

  <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>

  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

  <script>
    $(function() {
      $(document).on('scroll', function() {
        console.log('scroll top : ' + $(window).scrollTop());
        if ($(window).scrollTop() >= $(".logo").height()) {
          $(".navbar").addClass("navbar-fixed-top");
        }

        if ($(window).scrollTop() < $(".logo").height()) {
          $(".navbar").removeClass("navbar-fixed-top");
        }
      });
    });
  </script>
</head>

<?php
session_start();
include_once 'dbConnection.php';

$email = $_SESSION['email'];
if (!isset($email)) {
  header('location: index.php');
}
?>

<body>
  <div class="container-fluid">
    <div class="leftNavbar">
      <div class="row g-0 flex-nowrap">
        <div class="col-lg-2 col-sm-2 col-md-3 px-sm-0 px-0" style="background-color:#2c3e50;">
          <div class="d-flex flex-column align-items-center align-items-sm-start px-0 mx-0 pt-2 text-white min-vh-100">
            <a href="https://www.ashesi.edu.gh/" class="d-flex align-items-center pb-4 mb-md-0 me-md-auto text-white text-decoration-none">
              <div class="logo">
              <img src="./images/SSLogo.png" alt="" width="220" style="margin-bottom: 5px; margin-left: 20px; margin-top: 10px">
              </div>
            </a>
            <ul class="nav-links px-0 mx-0">
              <li class="nav-item" <?php if (@$_GET['q'] == 0) echo 'class="active"'; ?>><a href="headdash.php?q=0">Courses<span class="sr-only">(current)</span></a></li>
              <li class="nav-item" <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a href="headdash.php?q=1">User</a></li>
              <li class="dropdown nav-item <?php if (@$_GET['q'] == 4 || @$_GET['q'] == 5) echo 'active'; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a href="headdash.php?q=4">Add Admin</a></li>
                  <li class="nav-item"><a href="headdash.php?q=5">Remove Admin</a></li>
                </ul>
              </li>

            </ul>
            <hr>

          </div>
        </div>
        <div class="container col-lg-10" style="padding: 0 !important; margin: 0 !important;">
          <div class="header admin" style="height: 50px;">
            <div class="px-5" style="background-color:#FFFFFF;">

              <?php

              if (!(isset($_SESSION['email']))) {
                header("location:index.php");
              } else {
                $name = $_SESSION['name'];

                include_once 'dbConnection.php';
                echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <span class="log1">' . $email . '</span>&nbsp;|&nbsp;<a href="logout.php?q=dash.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
              }
              ?>
            </div>
          </div>

          <div class="bg">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 ">
                  <?php 
                  if (@$_GET['q'] == 0) {

                    $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                    echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>positive</b></td><td><b>negative</b></td><td><b>Time limit</b></td><td></td></tr>';
                    $c = 1;
                    while ($row = mysqli_fetch_array($result)) {
                      $title = $row['title'];
                      $total = $row['total'];
                      $sahi = $row['sahi'];
                      $wrong = $row['wrong'];
                      $time = $row['time'];
                      $eid = $row['eid'];
                      $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
                      $rowcount = mysqli_num_rows($q12);
                      if ($rowcount == 0) {
                        echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $sahi . '</td><td>' . $wrong . '</td><td>' . $time . '&nbsp;min</td>
</tr>';
                      } else {
                        echo '<tr style="color:#99cc32"><td>' . $c++ . '</td><td>' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
</tr>';
                      }
                    }
                    $c = 0;
                    echo '</table></div>';
                  }

                  //ranking start
                  if (@$_GET['q'] == 2) {
                    $q = mysqli_query($con, "SELECT * FROM rank  ORDER BY score DESC ") or die('Error223');
                    echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr ><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Score</b></td></tr>';
                    $c = 0;
                    while ($row = mysqli_fetch_array($q)) {
                      $e = $row['email'];
                      $s = $row['score'];
                      $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ") or die('Error231');
                      while ($row = mysqli_fetch_array($q12)) {
                        $name = $row['name'];
                        $gender = $row['gender'];
                        $college = $row['college'];
                      }
                      $c++;
                      echo '<tr><td style="color:#99cc32"><b>' . $c . '</b></td><td>' . $name . '</td><td>' . $gender . '</td><td>' . $college . '</td><td>' . $s . '</td><td>';
                    }
                    echo '</table></div>';
                  }

                  ?>


                  <!--home closed-->
                  <!--users start-->
                  <?php if (@$_GET['q'] == 1) {

                    $result = mysqli_query($con, "SELECT * FROM user") or die('Error');
                    echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Email</b></td><td><b>Mobile</b></td><td></td></tr>';
                    $c = 1;
                    while ($row = mysqli_fetch_array($result)) {
                      $name = $row['name'];
                      $mob = $row['mob'];
                      $gender = $row['gender'];
                      $email = $row['email'];
                      $college = $row['college'];

                      echo '<tr><td>' . $c++ . '</td><td>' . $name . '</td><td>' . $gender . '</td><td>' . $college . '</td><td>' . $email . '</td><td>' . $mob . '</td>
<td><a title="Delete User" href="update.php?demail=' . $email . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
                    }
                    $c = 0;
                    echo '</table></div>';
                  } ?>
                  <!--user end-->



                  <!--add admin start-->

                  <?php
                  if (@$_GET['q'] == 4) {
                    echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Admin Details</b></span><br /><br />
<div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="signadmin.php?q=headdash.php?q=4"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
<label class="col-md-12 control-label" for="name"></label>  
<div class="col-md-12">
<input id="email" name="email" placeholder="Enter Admin Email" class="form-control input-md" type="email">

</div>
</div>



<!-- Text input-->
<div class="form-group">
<label class="col-md-12 control-label" for="total"></label>  
<div class="col-md-12">
<input id="password" name="password" placeholder="Enter password" class="form-control input-md" type="password">

</div>
</div>

<div class="form-group">
<label class="col-md-12 control-label" for=""></label>
<div class="col-md-12"> 
<input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
</div>
</div>

</fieldset>
</form></div>';
                  }
                  ?>
                  <!--add admin end-->


                  <!--users start-->
                  <?php if (@$_GET['q'] == 5) {

                    $result = mysqli_query($con, "SELECT * FROM admin where role ='admin' ") or die('Error');
                    echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>Email</b></td><td></td></tr>';
                    $c = 1;
                    while ($row = mysqli_fetch_array($result)) {

                      $email = $row['email'];


                      echo '<tr><td>' . $email . '</td>
<td><a title="Delete User" href="update.php?demail1=' . $email . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
                    }
                    $c = 0;
                    echo '</table></div>';
                  } ?>
                  <!--user end-->



                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>