<?php
    include_once 'dbConnection.php';
    session_start();

    if (!isset($_SESSION['name']) && $_GET["certificate"] != 1){
        header("location: index.php");
    }

    $name = $_SESSION['name'];
    $email = $_SESSION['email'];

    // Get certification date
    $certDate = mysqli_query($con, "SELECT date_completed FROM user_progress WHERE email='$email'");
    $theDate = mysqli_fetch_assoc($certDate);

?>
<!-- /* creating an page that displays a certificate of completion for a course. it uses 
html2pdf library to generate a PDF file of the certificate when the user clicks the "Download PDF" 
button.  */ -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Completion Certificate</title>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    </head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        html {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        .outer-border {
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            width: 800px;
            height: 650px;
            padding: 20px;
            text-align: center;
            border: 10px solid #2c3e50;
        }

        .inner-dotted-border {
            width: 750px;
            height: 600px;
            padding: 20px;
            text-align: center;
            border: 5px solid #2c3e50;
            border-style: dotted;
        }

        .certification {
            font-size: 50px;
            font-weight: bold;
            color: #2c3e50;
        }

        .certify {
            font-size: 25px;
        }

        .name {
            font-size: 30px;
            color: black;
        }

        .fs-30 {
            font-size: 30px;
        }

        .fs-20 {
            font-size: 20px;
        }

        .image {
            width: 200px;
            height: 200px;
            margin:  0 auto;
        }

        .image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
</head>

<body>

    <!-- /* displays a certificate of completion for a course. */ -->
    <div id="certificate" class="outer-border">
        <div class="inner-dotted-border">
            <span class="certification">Certificate of Completion</span>
            <br><br>
            <span class="certify"><i>This is to certify that</i></span>
            <br><br>
            <span class="name"><b><?php echo $name ?></b></span><br /><br />
            <span class="certify"><i>has successfully completed the all the courses of</i></span> <br /><br />
            <span class="fs-30">SyntaxStation</span> <br /><br />
            <div class="image">
                <img src="images/logo_wooster.png" alt="">
            </div>
            <span class="certify"><i>Date: </i></span>
            <span class="fs-30"><?php echo $theDate['date_completed'] ?></span>

        </div>
    </div>
    <div id="editor"></div>
    <div>
        <button id="download" onclick="generatePDF()">
            Download PDF
        </button>
    </div>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script> -->
    <script type="text/javascript">
        
        /**
        //  * The function generates a PDF file from an HTML element and saves it with a specific name.
        //  */
        function generatePDF(){
            const cert = document.getElementById("certificate");

            html2pdf()
            .from(cert)
            .save("course-completion-certificate.pdf");
        }
        
    </script>

</body>

</html>