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
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <!-- //alert message -->
    <?php if (@$_GET['w']) {
        echo '<script>alert("' . @$_GET['w'] . '");</script>';
    }
    ?>

</head>
<?php
include_once 'dbConnection.php';
session_start();
// check if the user is coming from result page.
if (isset($_SESSION['result'])) {
    unset($_SESSION['result']);
    header("location:account.php?q=1");
}
?>

<body>
    <div class="container-fluid">
        <div class="leftNavBar">
        <div class="row g-0 flex-nowrap">
                <div class="col-lg-2 col-sm-2 col-md-3 px-sm-0 px-0" style="background-color:#2c3e50;">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-0 mx-0 pt-2 text-white min-vh-100">
                        <a href="https://www.example.com" class="d-flex align-items-center pb-4 mb-md-0 me-md-auto text-white text-decoration-none">
                            <div class="logo">
                                <img src="./images/SSLogo.png" alt="" width="220" style="margin-bottom: 5px; margin-left: 20px; margin-top: 10px">
                            </div>
                        </a>
                        <ul class="nav-links px-4 mx-0">
                            <li class="nav-item" <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>>
                                <span class="iconify" data-icon="dashicons:admin-home" data-width="30" data-height="30"></span>
                                <a href="account.php?q=1" class="nav-link">Home<span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item" <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>>
                                <span class="iconify" data-icon="ant-design:history-outlined" data-width="30" data-height="30"></span>
                                <a href="account.php?q=2" class="nav-link">My Courses</a>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>

                <div class="container col-lg-10" style="padding: 0 !important; margin: 0 !important;">
                    <div class="header" style="height: 50px;">
                        <div class="px-5" style="background-color:#FFFFFF;">
                            <?php
                            include_once 'dbConnection.php';

                            if (!(isset($_SESSION['email']))) {
                                header("location:index.php");
                            } else {
                                $name = $_SESSION['name'];
                                $email = $_SESSION['email'];

                                include_once 'dbConnection.php';
                                echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Welcome,</span> <a href="account.php?q=1" class="log log1">' . $name . '</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
                            } ?>
                        </div>
                    </div>
                    <div class="bg">
                        <div class="container ">
                            <!--container start-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- page content -->
                                    <div class="page-content">
                                        <?php if (@$_GET['q'] == 1) {
                                            echo '
                                            <!-- info container -->
                                            <div class="info">
                                                <div class="left-content">
                                                    <div class="inner">
                                                        <h2>We\'re here to help!</h5>
                                                            <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut
                                                                consequatur adipisci dolorum maiores recusandae dolore deleniti, fugit non
                                                                reiciendis totam, error illum libero nobis beatae quo et ut eum. Nulla eos fuga
                                                                expedita quaerat. Eveniet facilis fugit repudiandae enim cumque vel sit! Officia vel
                                                                ab sequi iure voluptates. Fuga, voluptatem?
                                                            </p>
                                                            <div class="plaques">
                                                                <div class="item">
                                                                    <span class="iconify" style="color: #fff;" data-icon="ant-design:safety-certificate-filled" data-width="30" data-height="30"></span>
                                                                </div>
                                                                <div class="item">
                                                                    <span class="iconify" style="color: #fff;" data-icon="fluent:learning-app-24-filled" data-width="30" data-height="30"></span>
                                                                </div>
                                                                <div class="item">
                                                                    <span class="iconify" style="color: #fff;" data-icon="ion:happy" data-width="30" data-height="30"></span>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="right-content"></div>
                                            </div>
                                            
                                            ';

                                            $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date") or die('Error');

                                            $c = 1;
                                            $user_email = $_SESSION['email'];
                                            // Fetching the data from the database and displaying it in the table
                                        ?>

                                         <!-- main container -->
                                        <?php
                                        
                                            echo '<div class="swiper">
                                                <!-- Additional required wrapper -->
                                                <div class="swiper-wrapper">
                                                    <!-- Slides -->';
                                            
                                            echo '
                                                </div>
                                                <!-- If we need pagination -->
                                                <div class="swiper-pagination"></div>

                                                <!-- If we need navigation buttons -->
                                                <div class="swiper-button-prev"></div>
                                                <div class="swiper-button-next"></div>';
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <script src="./js/carousel.js"></script>
</body>

</html>