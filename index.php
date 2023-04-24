<!DOCTYPE html>
<html>

<head>
  <title>SyntaxStation</title>

  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
  <!-- <link rel="stylesheet" href="css/main.css"> -->
  <link rel="stylesheet" href="css/font.css">

  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <?php if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
  }
  ?>
<!-- /* function that validates a form with three input fields: name, email,
and password. It checks if the name field is filled out, if the email field is a valid Wooster email
address, and if the password field is filled out, between 5 and 25 characters long, and matches the
confirm password field. If any of these conditions are not met, an alert message is displayed and
the form submission is prevented. */ -->
  <script>
    function validateForm() {
      var y = document.forms["form"]["name"].value;
      var letters = /^[A-Za-z]+$/;
      if (y == null || y == "") {
        alert("Name must be filled out.");
        return false;
      }
      var x = document.forms["form"]["email"].value;
      var atpos = x.indexOf("@");
      var dotpos = x.lastIndexOf(".");

      var email_rx = /^[a-zA-Z0-9._%+-]+(@wooster.edu)$/;
      
      if (!email_rx.test(x)) {
      alert("Not a valid wooster e-mail address");
      console.log("wrong email");
      return false;

      } else

      if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
        alert ("Not a valid e-mail address.");
        return false;
      }

      var a = document.forms["form"]["password"].value;
      if (a == null || a == "") {
        alert("Password must be filled out");
        return false;
      }
      if (a.length < 5 || a.length > 25) {
        alert("Passwords must be 5 to 25 characters long.");
        return false;
      }
      var b = document.forms["form"]["cpassword"].value;
      if (a != b) {
        alert("Passwords must match.");
        return false;
      }
    }
  </script>



  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body .modal {
      text-align: center;
      padding: 0 !important;
      right: 16%;
      /* margin: 0 !important; */
    }

    .modal-body {
      padding: 0 !important;
    }

    @media screen and (min-width: 768px) {
      .modal:before {
        display: inline-block;
        vertical-align: middle;
        content: " ";
        height: 100%;
      }
    }

    .modal-content {
      /* display: none; */
      background-color: transparent;
      box-shadow: none;
      border: none;
      width: fit-content;
    }

    .modal-dialog {
      display: inline-block;
      text-align: left;
      vertical-align: middle;
    }



    /* {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #2c3e50;
    } */

    h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
    }

    h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #2c3e50;
      font-weight: 400;
      margin-bottom: 30px;
    }

    .left {
      float: left;
    }

    .right {
      float: right;
    }

    .clear {
      clear: both;
    }

    .jumbotron {
      background-color: #2c3e50;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
    }

    .container-fluid {
      padding: 60px 50px;
    }

    .bg-grey {
      background-color: #f6f6f6;
    }

    .logo-small {
      color: #2c3e50;
      font-size: 50px;
    }

    .logo {
      color: #2c3e50;
      font-size: 200px;
    }

    .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
    }

    .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
    }

    .carousel-control.right,
    .carousel-control.left {
      background-image: none;
      color: #2c3e50;
    }

    .carousel-indicators li {
      border-color: #2c3e50;
    }

    .carousel-indicators li.active {
      background-color: #2c3e50;
    }

    .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
    }

    .item span {
      font-style: normal;
    }

    .panel {
      border: 1px solid #2c3e50;
      border-radius: 0 !important;
      transition: box-shadow 0.5s;
    }

    .panel:hover {
      box-shadow: 5px 0px 40px rgba(0, 0, 0, .2);
    }

    .panel-footer .btn:hover {
      border: 1px solid #2c3e50;
      background-color: #fff !important;
      color: #2c3e50;
    }

    .panel-heading {
      color: #fff !important;
      background-color: #2c3e50 !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
    }

    .panel-footer {
      background-color: white !important;
    }

    .panel-footer h3 {
      font-size: 32px;
    }

    .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
    }

    .panel-footer .btn {
      margin: 15px 0;
      background-color: #2c3e50;
      color: #fff;
    }

    .navbar {
      margin-bottom: 0;
      background-color: #f6f6f6;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
    }

    .navbar li a,
    .navbar .navbar-brand {
      color: #2c3e50 !important;
    }

    .navbar-nav li a:hover,
    .navbar-nav li.active a {
      color: #2c3e50 !important;
      background-color: #e7e7e7 !important;

    }

    .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
    }

    footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #2c3e50;
    }

    .slideanim {
      visibility: hidden;
    }

    .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
    }

    @keyframes slide {
      0% {
        opacity: 0;
        transform: translateY(70%);
      }

      100% {
        opacity: 1;
        transform: translateY(0%);
      }
    }

    @-webkit-keyframes slide {
      0% {
        opacity: 0;
        -webkit-transform: translateY(70%);
      }

      100% {
        opacity: 1;
        -webkit-transform: translateY(0%);
      }
    }

    @media screen and (max-width: 768px) {
      .col-sm-4 {
        text-align: center;
        margin: 25px 0;
      }

      .btn-lg {
        width: 100%;
        margin-bottom: 35px;
      }
    }

    @media screen and (max-width: 480px) {
      .logo {
        font-size: 150px;
      }
    }
  </style>


</head>





<body>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<!-- Navbar with admin, sign in, signup -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="#myPage"><span class="glyphicon glyphicon-home"></span></a> -->
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#login">ADMIN</a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModal">SIGN IN</a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModal1">SIGN UP</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="jumbotron text-center">
      <h1>SyntaxStation</h1>
      <p>All-in-one platform for CS students to master the art of programming. </p>
      <!--  form>
    <div class="input-group">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Subscribe</button>
      </div>
    </div>
  </form -->
    </div>



    <!-- Container (Admin Section) -->
    <div class="modal fade" id="login">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title"><span style="color:#2c3e50;font-family:Montserrat, sans-serif; font-size: 20px !important;letter-spacing: 4px; "><b>LOGIN -ADMIN</b></span></h4>
          </div> -->
          <div class="modal-body title1">
            <div class="login-modal">
              <div class="left">
                <div class="left-img">
                  <img src="./images/boy_1.2.jpg" alt="">
                </div>
              </div>
              <div class="right">
                <div class="logo">
                  <img src="./images/SSLogo.png" alt="">
                </div>
                <h2 class="hero-text">Admin Login</h2>
                <div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis ullam nisi odio
                  voluptatibus repellat iste!</div>
                <form role="form" method="post" action="head.php?q=index.php">
                  <div class="form-field">
                    <label for="">Email</label>
                    <input type="text" name="uname" maxlength="21" placeholder="Admin user id" class="" />
                  </div>
                  <div class="form-field">
                    <label for="">Password</label>
                    <input type="password" name="password" maxlength="15" placeholder="Password" class="" />
                  </div>
                  <div class="button">
                    <input type="submit" name="login" value="Login" class="btn btn-primary" />
                  </div>
                </form>

              </div>
            </div>

          </div>
          <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <div class="container-fluid bg-grey mt-0">
      <div class="row">
        <div class="col-sm-4">
          <div class="pull-left">
            <img src="./images/SSLogo.png" alt="" class="img-responsive">
          </div>
        </div>
        <div class="col-sm-8">
          <h2>SyntaxStation</h2><br>
          <h4><strong>About the website: </strong> </h4><br>
          <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
          </p>
        </div>
      </div>
    </div>



    <!-- Container (USERS section) -->
    <!--sign in modal start-->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content title1">
          <!-- <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title title1"><span style="color:#2c3e50;font-family:Montserrat, sans-serif; font-size: 20px !important;letter-spacing: 4px; "><b>STUDENT LOGIN</b></span></h4>
          </div> -->
          <div class="modal-body">
            <div class="login-modal">
              <div class="left">
                <div class="left-img">
                  <img src="./images/boy_1.2.jpg" alt="">
                </div>
              </div>
              <div class="right">
                <div class="logo">
                  <img src="./images/SSLogo.png" alt="">
                </div>
                <h2 class="hero-text">Student Login</h2>
                <div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis ullam nisi odio
                  voluptatibus repellat iste!</div>
                <form action="login.php?q=index.php" method="POST">
                  <div class="form-field">
                    <label for="">Email</label>
                    <input id="email" name="email" placeholder="Enter your Wooster Email" class="form-control input-md" type="email">
                  </div>
                  <div class="form-field">
                    <label for="">Password</label>
                    <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
                  </div>
                  <div class="button">
                    <input type="submit" style="background: #2c3e50;" class="sub" value="Log In" />
                  </div>
                </form>
                <div class="no-account">
                  <p>Don't have an account? <span><a href="">Sign up here!</a></span></p>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Log in</button>
          </div> -->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--sign in modal closed-->

    <!--sign up modal start-->
    <div class="modal fade" id="myModal1">
      <div class="modal-dialog">
        <div class="modal-content title1">
          <!-- <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title title1"><span style="color:#2c3e50;font-family:Montserrat, sans-serif; font-size: 20px !important;letter-spacing: 4px; "><b>SIGN UP</b></span></h4>
          </div> -->
          <div class="modal-body">
            <div class="login-modal signup">
              <div class="left">
                <div class="left-img">
                  <img src="./images/boy_1.2.jpg" alt="">
                </div>
              </div>
              <div class="right">
                <div class="logo">
                  <img src="./images/SSLogo.png" alt="">
                </div>
                <h2 class="hero-text">User Sign Up</h2>
                <div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis ullam nisi odio
                  voluptatibus repellat iste!</div>
                <form name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
                  <div class="signup-flex">
                    <div class="form-field">
                      <label for="">Name</label>
                      <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text">
                    </div>
                    <div class="form-field">
                      <label for="">Password</label>
                      <select id="gender" name="gender" placeholder="Enter your gender" class="">
                        <option value="Male">Select Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-field">
                    <input id="email" name="email" placeholder="Enter your wooster email" class="" type="email" required pattern="^[a-zA-Z0-9._%+-]+(@wooster.edu)$">
                  </div>

                  <div class="signup-flex">
                    <?php if (@$_GET['q7']) {
                      echo '<p style="color:red;font-size:15px;">' . @$_GET['q7'];
                    } ?>
                    <div class="form-field">
                      <input id="mob" name="mob" placeholder="Enter your mobile number" class="" type="text">
                    </div>
                    <div class="form-field">
                      <label for="">Role</label>
                      <select id="role" name="role" placeholder="Select your role" class="">
                        <option value="Role">Select Role</option>
                        <option value="Student">Student</option>
                        <option value="Faculty">Faculty</option>
                      </select>
                    </div>
                  </div>
                  <div class="signup-flex">
                    <div class="form-field">
                      <input id="password" name="password" placeholder="Enter your password" class="" type="password">
                    </div>
                    <div class="form-field">
                      <input id="cpassword" name="cpassword" placeholder="Confirm Password" class="" type="password">
                    </div>
                  </div>
                  <div class="button">
                    <input type="submit" style="background: #2c3e50;" class="sub" value="Sign Up" />
                  </div>
                </form>
                <div class="no-account">
                  <p>Already have an account? <span><a href="#myModal" data-target="#myModal" data-toggle="modal">Sign in!</a></span></p>
                </div>
              </div>
            </div>

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--sign up modal closed-->

  </body>


</html>