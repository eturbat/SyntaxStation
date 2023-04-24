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
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/jquery.js" type="text/javascript"></script>


    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <!--alert message-->
    <?php if (@$_GET['w']) {
        echo '<script>alert("' . @$_GET['w'] . '");</script>';
    }
    ?>
    <!--alert message end-->

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
                        <a href="http://csweb.wooster.edu/" class="d-flex align-items-center pb-4 mb-md-0 me-md-auto text-white text-decoration-none">
                            <div class="logo">
                            <img src="./images/SSLogo.png" alt="" width="220" style="margin-bottom: 5px; margin-left: 20px; margin-top: 10px">
                            </div>
                        </a>
                        <ul class="nav-links px-4 mx-0">
                            <!-- /* link to the "Home" and "My Coursess" page of an
                            account. It also has a conditional statement that checks if the value of
                            the "q" parameter in the URL is equal to 1 and 2, and if so, adds the "active"
                            class to the list item to indicate that it is the current page.  */ -->
                            <li class="nav-item" <?php if (@$_GET['q'] == 1)
                                                        echo 'class="active"'; ?>>
                                <span class="iconify" data-icon="dashicons:admin-home" data-width="30" data-height="30"></span>
                                <a href="account.php?q=1" class="nav-link ">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item" <?php if (@$_GET['q'] == 2)
                                                        echo 'class="active"'; ?>>
                                <span class="iconify" data-icon="ant-design:history-outlined" data-width="30" data-height="30"></span>
                                <a href="account.php?q=2" class="nav-link">My Courses</a>
                            </li>
                            <?php 
                                $email = $_SESSION['email'];

                                //  Get the user's current progress
                                $cert = mysqli_query($con, "SELECT certificate FROM user_progress WHERE email='$email'");
                                $certificate = mysqli_fetch_assoc($cert);

                                // /* checking if the value of the "certificate" key in
                                // the  array is equal to 1. If it is, it will display a
                                // navigation item with a certificate icon and a link to the
                                // "certificate.php" page with the "certificate" parameter set to 1. */
                                if ($certificate["certificate"] == 1){
                                    echo '
                                    <li class="nav-item">
                                        <span class="iconify" data-icon="icon-park-solid:certificate" data-width="30" data-height="30"></span>
                                        <a href="certificate.php?certificate=1" class="nav-link">View Certificate</a>
                                    </li>
                                    ';
                                }
                            
                            ?>
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
                                echo '
                                <span class="pull-right top title1">
                                    <span class="log1">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        Welcome, </span> 
                                        <a href="account.php?q=1" class="log log1">' . $name . '</a>|
                                        <a href="logout.php?q=index.php" class="log">
                                        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Signout</button>
                                        </a>
                                </span>';
                            } 
                            ?>
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
                                        ?>

                                            <!-- Slider main container -->
                                        <?php
                                            echo '<div class="swiper">
                                                <!-- Additional required wrapper -->
                                                <div class="swiper-wrapper">
                                                    <!-- Slides -->';
                                            while ($row = mysqli_fetch_array($result)) {
                                                $title = $row['title'];
                                                $total = $row['total'];
                                                $sahi = $row['sahi'];
                                                $email = $row['email'];
                                                $time = $row['time'];
                                                $eid = $row['eid'];
                                                // $id = $row['id'];

                                                // get the user's course level 
                                                $query = mysqli_query($con, "SELECT moduleNum FROM user_progress WHERE email='$user_email'") or die('Error98');
                                                $moduleNum = mysqli_fetch_assoc($query);

                                                // /*  It checks if the current course number is less than or equal to the
                                                // total number of courses and if it is, it generates
                                                // the course container */
                                                if ($c - 1 <= $moduleNum['moduleNum']) {
                                                    echo '
                                                        <div class="swiper-slide">
                                                            <!-- module containers -->
                                                            <div class="module-container active">
                                                                <div class="icon"></div>
                                                                <div class="module-heading">
                                                                    <h3 class="mx-0 my-0">Course ' . $c++ . '</h3>
                                                                    <span>•</span>
                                                                    <p class="mx-0 my-0 py-0 px-0">' . $time . ' min</p>
                                                                </div>
                                                                <div class="description">
                                                                    <p class="mx-0 my-0 py-2">' . $title . '</p>
                                                                </div>
                                                                <div class="details">
                                                                    <p class="mx-0 my-0 py-2">Total questions: ' . $total . '</p>
                                                                    <p class="mx-0 my-0 py-2">Total points: ' . $sahi * $total . '</p>
                                                                </div>
                                                                <div class="button py-3">
                                                                    <a class="me-2 my-0" href="account.php?q=quiz&step=1&eid=' . $eid . '&moduleNum=' . ($c - 1) . '&time=' . $time . '" style="color: #922e2e;">Start Module</a>
                                                                    <img src="./images/eva_external-link-outline.png" alt="" width="20">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        ';
                                                }
                                                //<td><b><a href="account.php?q=quiz&step=1&eid='.$eid.'&mid='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
                                                //start button above
                                                // if user not finished current course, it still locked
                                                else {
                                                    echo '
                                                        <div class="swiper-slide">
                                                            <!-- module containers -->
                                                            <div class="module-container inactive">
                                                                <div class="icon"></div>
                                                                <div class="module-heading">
                                                                    <h3 class="mx-0 my-0">Course ' . $c++ . '</h3>
                                                                    <span>•</span>
                                                                    <p class="mx-0 my-0 py-0 px-0">' . $time . ' min</p>
                                                                </div>
                                                                <div class="description">
                                                                    <p class="mx-0 my-0 py-2">' . $title . '</p>
                                                                </div>
                                                                <div class="details">
                                                                    <p class="mx-0 my-0 py-2">Total questions: ' . $total . '</p>
                                                                    <p class="mx-0 my-0 py-2">Total points: ' . $sahi * $total . '</p>
                                                                </div>
                                                                <div class="button py-3">
                                                                    <span class="me-2 my-0" href="" style="color: grey;">Locked</span>
                                                                    <img src="./images/bxs_lock-alt.png" alt="" width="20">
                                                                </div>
                                                            </div>
                                                        </div>';
                                                }
                                            }
                                            echo '
                                                </div>
                                                <!-- If we need pagination -->
                                                <div class="swiper-pagination"></div>

                                                <!-- If we need navigation buttons -->
                                                <div class="swiper-button-prev"></div>
                                                <div class="swiper-button-next"></div>';
                                        }
                                        ?>
                                        <!-- // Course reading starts (it checks)
                                        /* checking if the current parameters include 'q=quiz' and 'step=1'. If so,
                                        it retrieves information from a database about a
                                        specific course  and displays it on the page. */ -->
                                        <?php
                                        if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 1) {

                                            $eid = @$_GET['eid'];
                                            $q = mysqli_query($con, "SELECT * FROM modules WHERE eid='$eid' ");

                                            echo '<div class="panel mx-5" style="margin:0; ">';
                                            while ($row = mysqli_fetch_array($q)) {
                                                $mread = $row['mread'];

                                                //check if mread is a pdf, ppt, or text
                                                // If the course reading is a PDF or PowerPoint file, it is displayed using an object or iframe tag respectively.
                                                // If it is a text file, it is displayed as plain text.
                                                $check = explode("/", $mread);
                                                $check = explode(".", end($check));

                                                if (strcmp(end($check), "pdf") == 0) {
                                                    echo '<object data="' . $mread . '" type="application/pdf" width="100%" height="1000">
                                                <embed src="' . $mread . '" width="600px" height="500px" />
                                                    <p>This browser does not support PDFs. Please download the PDF to view it:
                                                    <a href="' . $mread . '">Download PDF</a>.</p>
                                                </embed></object>';
                                                } else if (strcmp(end($check), "pptx") == 0 || strcmp(end($check), "ppt") == 0) {
                                                    $file = "http://" . $_SERVER['SERVER_NAME'] . "/" . $mread;
                                                    echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=[" . $file . "]' width='100%' height='600px' frameborder='0'>";
                                                } else {
                                                    echo $mread;
                                                }
                                            }
                                            $result = mysqli_query($con, "SELECT total FROM quiz WHERE eid='$eid'") or die('Error');
                                            $row = mysqli_fetch_assoc($result);
                                            $total = $row['total'];
                                            $attempt = uniqid();

                                            echo '
                                            </div>
                                            <a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&attempt=' . $attempt . '&moduleNum=' . $_GET['moduleNum'] . '&time=' . $_GET['time'] . '" class="pull-right d-flex align-items-center btn sub1" style="margin:20px 0px; background:#2c3e50; color: #fff;">
                                                <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;
                                                <span class="title1">
                                                    <b>Go quiz</b>
                                                </span>
                                            </a>
                                            <script>
                                                function getId(url) {

                                                    const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
                                                    const match = url.match(regExp);
                                                
                                                    return (match && match[2].length === 11) ? match[2] : null;
                                                };

                                                function matchYoutubeUrl(url) {
                                                    var p = /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
                                                    
                                                    if(url !== undefined && url.match(p)) {
                                                        return url.match(p)[1];
                                                    }
                                                    return false;
                                                }
        
                                                let figures = $("figure");
                                                figures.each(function(i, fig) {

                                                    $(fig).children().each(function(i, child) {

                                                        var link = $(child).attr("url");
                                                        if (matchYoutubeUrl(link) !== false){
                                                            
                                                            var linkID = getId(link);
                                                            var newLink = "https://www.youtube.com/embed/" + linkID

                                                            console.log(newLink);
                                                            $(child).replaceWith("<iframe width=100% height=400 src="+ newLink +"></iframe>")
                                                        }
                                                    });
                                                });
                                            </script>
                                        ';
                                        }
                                        ?>


                                        <!--quiz start-->
                                        <?php
                                        if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {

                                            $eid = @$_GET['eid'];
                                            $sn = @$_GET['n'];
                                            $total = @$_GET['t'];
                                            $attempt = "";
                                            $moduleNum = @$_GET['moduleNum'];


                                            if (isset($_GET['attempt'])) {
                                                $attempt = $_GET['attempt'];
                                            }

                                            $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");


                                            // new quiz panel

                                        ?>
                                            <div class="row">

                                                <?php
                                                echo '<div class="question-tile">';
                                                while ($row = mysqli_fetch_array($q)) {
                                                    $qns = $row['qns'];
                                                    $qid = $row['qid'];
                                                    echo '
                                                    <h6 class="q-number">Question ' . $sn . '</h6> 
                                                    <p class="question mx-0 my-0 py-0 px-0">' . $qns . '</p>
                                                    ';

                                                    // echo '<b>Question &nbsp;' . $sn . '&nbsp;<br />' . $qns . '</b><br /><br />';
                                                }
                                                $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");
                                                echo '
                                                    <form action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '&attempt=' . $attempt . '&moduleNum=' . $moduleNum . '&time=' . $_GET['time'] . '"method="POST"  class="form-horizontal">
                                                    <br />';

                                                echo ' <div class="options">';
                                                while ($row = mysqli_fetch_array($q)) {
                                                    $option = $row['option'];
                                                    $optionid = $row['optionid'];
                                                    echo '
                                                        <div class="optionItem">
                                                            <input type="radio" value="' . $optionid . '" name="ans" id="">
                                                            <label for="">' . $option . '</label>
                                                        </div>
                                                        ';
                                                }
                                                echo '
                                                    </div>
                                                    <br />
                                                    <div class="button">
                                                        <button id="submitAns" type="submit">' . ($sn == $total ? "Submit" : "Next") . '</button>
                                                    </div>
                                                    </form>
                                                    <!-- /* The below code is a JavaScript that is used to create a
                                                    countdown timer for the quiz. */ -->
                                                    <script>
                                                        var seconds = ' . $_GET['time'] . '  * 60;
                                                        function secondPassed() {
                                                            var minutes = Math.round((seconds - 30)/60);
                                                            var remainingSeconds = seconds % 60;
                                                            if (remainingSeconds < 10) {
                                                                remainingSeconds = "0" + remainingSeconds; 
                                                            }
                                                            document.getElementById("timer").innerHTML = minutes + ":" +    remainingSeconds;

                                                            if (seconds == 0) {
                                                                clearInterval(countdownTimer);
                                                                $("#submitAns").click();

                                                            } else {    
                                                                seconds--;
                                                            }
                                                        }
                                                        var countdownTimer = setInterval("secondPassed()", 1000);
                                                    </script>
                                                    </div>';
                                                ?>

                                                <!-- timer -->
                                                <div class="timer">
                                                    <div class="icon">
                                                        <img src="./images/bxs_time.png" alt="">
                                                    </div>
                                                    <span>Time remaining: </span>
                                                    <p class="time py-0 my-0 mx-0 px-0" id="timer">00:00:00</p>
                                                </div>
                                            </div>
                                        <?php


                                        }
                                        //assessment result display
                                        if (@$_GET['q'] == 'result' && @$_GET['eid']) {
                                            $eid = @$_GET['eid'];
                                            $attempt = $_GET['attempt'];
                                            $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' AND attempt='$attempt'") or die('Error157');


                                            while ($row = mysqli_fetch_array($q)) {
                                                $s = $row['score'];
                                                echo '
                                                <div class="passed">
                                                    <div class="r_illustration">
                                                        <img src="./images/icons8-results-64.png" alt="">
                                                    </div>
                                                    <p>Your Score:</p>
                                                    <div class="score">
                                                        <h1 class="my-0 py-0">' . $s . '</h1>
                                                    </div>
                                                    <span>You passed the module one quiz</span>
                                                    <div class="bottom">
                                                    <a style="text-decoration: none; color: #fff;" href="account.php?q=1">
                                                        <div class="button">
                                                            <button class="grey">Return to main page</button>
                                                        </div>
                                                    </a>
                                                    </div>
                                                </div>

                                                ';
                                            }
                                        }
                                        ?>


                                        <!--quiz end-->
                                        <?php
                                        //shows course history 
                                        // /* checks if the value of the 'q' parameter in the GET request is equal to 2.. */
                                        if (@$_GET['q'] == 2) {
                                            $q = mysqli_query($con, "SELECT * FROM history WHERE email='$email' ORDER BY date DESC") or die('Error197');
                                            // If it is, then it retrieves the user's quiz history from the database and displays it in a table format.
                                            echo  '
                                        <div class="panel title">
                                            <table class="table table-striped title1" >
                                                <tr style="color:black"> 
                                                <td>
                                                    <b>S.N.</b>
                                                </td>
                                                <td>
                                                    <b>Quiz</b>
                                                </td>
                                                <td>
                                                    <b>Question Solved</b>
                                                </td>
                                                <td>
                                                    <b>Right</b>
                                                </td>
                                                <td>
                                                    <b>Wrong<b>
                                                </td>
                                                <td>
                                                    <b>Score</b>
                                                </td>';
                                            $c = 0;
                                            while ($row = mysqli_fetch_array($q)) {
                                                $eid = $row['eid'];
                                                $s = $row['score'];
                                                $w = $row['wrong'];
                                                $r = $row['sahi'];
                                                $qa = $row['level'];
                                                $q23 = mysqli_query($con, "SELECT title FROM quiz WHERE  eid='$eid' ") or die('Error208');
                                                while ($row = mysqli_fetch_array($q23)) {
                                                    $title = $row['title'];
                                                }
                                                $c++;
                                                echo '<tr><td>' . $c . '</td><td>' . $title . '</td><td>' . $qa . '</td><td>' . $r . '</td><td>' . $w . '</td><td>' . $s . '</td></tr>';
                                            }
                                            echo '</table></div>';
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