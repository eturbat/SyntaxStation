<!DOCTYPE html>
<html>

<head>
    <title>SyntaxStation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    </script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">
    <!-- iconify -->
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/super-build/ckeditor.js"></script>

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
                        <a href="https://www.example.com/" class="d-flex align-items-center pb-4 mb-md-0 me-md-auto text-white text-decoration-none">
                            <div class="logo">
                                <img src="./images/SSLogo.png" alt="" width="220" style="margin-bottom: 5px; margin-left: 20px; margin-top: 10px">
                            </div>
                        </a>
                        <ul class="nav-links px-3 mx-0">
                            <li class="nav-item" <?php if (@$_GET['q'] == 10) echo 'class="active"'; ?>>
                                <span class="iconify" data-icon="ic:baseline-view-module" data-width="30" data-height="30"></span>
                                <a href="dash.php?q=10">Available Courses<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item" <?php if (@$_GET['q'] == 11) echo 'class="active"'; ?>>
                                <span class="iconify" data-icon="clarity:group-solid" data-width="30" data-height="30"></span>
                                <a href="dash.php?q=11">Students</a>
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
                                echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="dash.php" class="log log1">' . $email . '</a>&nbsp;|&nbsp;<a href="logout.php?q=dash.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
                            }
                            ?>


                        </div>
                    </div>

                                    <?php
                                    if (@$_GET['q'] == 10) {

                                        $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                                        echo  '
                                        <div class="panel">
                                            <table class="table table-striped title1">
                                                <tr>
                                                    <td>
                                                        <b>Modules</b>
                                                    </td>
                                                    <td>
                                                        <b>Title</b>
                                                    </td>
                                                    <td>
                                                        <b>Total question</b>
                                                    </td>
                                                    <td>
                                                        <b>Marks</b>
                                                    </td>
                                                    <td>
                                                        <b>Correct Points</b>
                                                    </td>
                                                    <td>
                                                        <b>Time limit</b>
                                                    </td>
                                                </tr>';
                                        $c = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                            $title = $row['title'];
                                            $total = $row['total'];
                                            $sahi = $row['sahi'];
                                            $time = $row['time'];
                                            $eid = $row['eid'];

                                            echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $sahi . '</td><td>' . $time . '&nbsp;min</td></tr>';
                                        }
                                        $c = 0;
                                        echo '</table></div>';
                                    }

                                    ?>
                                    <!--user end-->


                                    <?php if (@$_GET['q'] == 11) {

                                        $result = mysqli_query($con, "SELECT * FROM user") or die('Error');
                                        echo  '
                                            <div class="panel">
                                            <input id="studentSearch" type="text" placeholder="Search Students" class="form-control my-3" />
                                                <table class="table table-striped title1">
                                                    <tr>
                                                        <td>
                                                            <b>Name</b>
                                                        </td>
                                                        <td>
                                                            <b>Gender</b>
                                                        </td>
                                                        <td>
                                                            <b>Email</b>
                                                        </td>
                                                        <td>
                                                            <b>Mobile</b>
                                                        </td>
                                                        <td>
                                                            <b>Course progress</b>
                                                        </td>
                                                        <td></td>
                                                    </tr>';
                                        $c = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                            $name = $row['name'];
                                            $mob = $row['mob'];
                                            $gender = $row['gender'];
                                            $email = $row['email'];
                                            $role = $row['role'];
            

                                            if ($role == "Student") {
                                                echo
                                                '<tr>
                                                    <td>' . $name . '</td>
                                                    <td>' . $gender . '</td>
                                                    <td>' . $email . '</td>
                                                    <td>' . $mob . '</td>
                                                    <td>' . "not implemented" . '</td>
                                                    <td>
                                                        <a title="Delete User" href="update.php?role=student&demail=' . $email . '">
                                                            <b>
                                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                            </b>
                                                        </a>
                                                    </td>
                                                </tr>';
                                            }
                                        }
                                        $c = 0;
                                        echo
                                        '</table>
                                        </div>

                                        <script>
                                            $("#studentSearch").keyup(function() {
                                                
                                                $.get("search.php", {search: "Student", searchValue: $("#studentSearch").val()}, function(data){
                                                    var result = JSON.parse(data);
                                                    
                                                    $("tbody").html(`<tr>
                                                            <td>
                                                                <b>Name</b>
                                                            </td>
                                                            <td>
                                                                <b>Gender</b>
                                                            </td>
                                                            <td>
                                                                <b>Email</b>
                                                            </td>
                                                            <td>
                                                                <b>Mobile</b>
                                                            </td>
                                                            <td>
                                                                <b>Module Progress</b>
                                                            </td>
                                                            <td></td>
                                                        </tr>`
                                                    );

                                                    for (var i = 0; i < result.length; i++){
                                                        
                                                        $("tbody").append(
                                                            `<tr>
                                                            <td> ${result[i][0].toString()} </td> 
                                                            <td> ${result[i][1].toString()} </td>
                                                            <td> ${result[i][2].toString()} </td>
                                                            <td> ${result[i][3].toString()} </td>
                                                            <td> ${result[i][6].toString()} </td>
                                                            <td>  
                                                                <a title="Delete User" href="update.php?role=student&demail=${result[i][2].toString()}">
                                                                    <b>
                                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                                    </b>
                                                                </a> 
                                                            </td>
                                                            </tr>
                                                            `
                                                        )
                                                    }
                                                });
                                            });
                                        
                                        </script>
                                        
                                        ';
                                    } ?>
                </div>
            </div>
</body>

</html>