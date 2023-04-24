<!DOCTYPE html>
<html>

<head>
    <title>MySafeCampus</title>
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

<!-- /* 
checking if the email variable is set in the session. If it is not set, the code redirects the user
to the index.php page. */ -->
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
                        <a href="http://csweb.wooster.edu/" class="d-flex align-items-center pb-4 mb-md-0 me-md-auto text-white text-decoration-none">
                            <div class="logo">
                            <img src="./images/SSLogo.png" alt="" width="220" style="margin-bottom: 5px; margin-left: 20px; margin-top: 10px">
                            </div>
                        </a>
                        <ul class="nav-links px-3 mx-0">
                            <!-- /* link to a page "dash.php" with
                            a query parameter "q" set to 10. It also has a conditional statement
                            that checks if the value of the "q" parameter is equal to 10, and if so,
                            adds the "active" class to the list item.  */ -->
                            <li class="nav-item" <?php if (@$_GET['q'] == 10) echo 'class="active"'; ?>>
                                <span class="iconify" data-icon="ic:baseline-view-module" data-width="30" data-height="30"></span>
                                <a href="dash.php?q=10">Available Courses<span class="sr-only">(current)</span></a>
                            </li>
                            <!-- /* link to a page "dash.php" with
                            a query parameter "q" set to 11. It also has a conditional statement
                            that checks if the value of the "q" parameter is equal to 11, and if so,
                            adds the "active" class to the list item.  */ -->
                            <li class="nav-item" <?php if (@$_GET['q'] == 11) echo 'class="active"'; ?>>
                                <span class="iconify" data-icon="clarity:group-solid" data-width="30" data-height="30"></span>
                                <a href="dash.php?q=11">Students</a>
                            </li>
                            <!-- /* link to a page "dash.php" with
                            a query parameter "q" set to 13. It also has a conditional statement
                            that checks if the value of the "q" parameter is equal to 13, and if so,
                            adds the "active" class to the list item.  */ -->
                            <li class="nav-item" <?php if (@$_GET['q'] == 13) echo 'class="active"'; ?>>
                                <span class="iconify" data-icon="ic:baseline-view-module" data-width="30" data-height="30"></span>
                                <a href="dash.php?q=13">User Course History</a>
                            </li>

                            <!-- It checks if the current page is either 4 or 5 and
                            sets the "active" class to the dropdown item accordingly. The dropdown
                            menu has two options: "Add Course" and "Remove Course" which are linked
                            to the respective pages.  -->
                            <li class="dropdown nav-item <?php if (@$_GET['q'] == 4 || @$_GET['q'] == 5) echo 'active'; ?>">
                                <span class="iconify" data-icon="akar-icons:gear" data-width="30" data-height="30"></span>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Course</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="dash.php?q=4&step=3">Add Course</a></li>
                                    <li class="nav-item"><a href=" dash.php?q=5">Remove Course</a></li>
                                </ul>
                            </li>
                            
                             <!-- The dropdown menu contains two
                            options: "Add Instructor" and "Remove Instructor". The code
                            includes an "active" class to highlight the dropdown menu item if the
                            URL parameter "q" is equal to 8 or 9.  -->
                            <li class="dropdown nav-item <?php if (@$_GET['q'] == 8 || @$_GET['q'] == 9) echo 'active'; ?>">
                                <span class="iconify" data-icon="subway:admin-1" data-width="30" data-height="30"></span>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="dash.php?q=8">Add Instructor</a></li>
                                    <li class="nav-item"><a href="dash.php?q=9">Remove Instructor</a></li>
                                </ul>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>
                <div class="container col-lg-10" style="padding: 0 !important; margin: 0 !important;">
                    <div class="header admin" style="height: 50px;">
                        <div class="px-5" style="background-color:#FFFFFF;">

                            <!-- /* The above code is checking if the admin is logged in */ -->
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
                    <div class="bg">
                        <div class="container ">
                            <!--admin dashboard start-->
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <?php
                                    if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
                                        $eid = $_GET['moduleID'];
                                        echo ' 
                                            <div class="row">
                                                <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span> <br/><br/>
                                                <div class="col-md-3"></div><div class="col-md-6">
                                                    <form class="form-horizontal title1" name="form" action="update.php?q=addquiz&eid=' . $eid . '"  method="POST">
                                                        <fieldset>


                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label" for="name"></label>  
                                                            <div class="col-md-12">
                                                                <input id="name" name="name" placeholder="Enter course title" class="form-control input-md" type="text">
                                                                
                                                            </div>
                                                        </div>



                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label" for="total"></label>  
                                                            <div class="col-md-12">
                                                                <input id="total" name="total" placeholder="Enter total number of test questions" class="form-control input-md" type="number">
                                                                
                                                            </div>
                                                        </div>

                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label" for="right"></label>  
                                                            <div class="col-md-12">
                                                                <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
                                                                
                                                            </div>
                                                        </div>

                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label" for="time"></label>  
                                                            <div class="col-md-12">
                                                                <input id="time" name="time" placeholder="Enter time limit for each question in minutes" class="form-control input-md" type="text">
                                                                
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label" for=""></label>
                                                            <div class="col-md-12"> 
                                                                <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                                                            </div>
                                                        </div>

                                                        </fieldset>
                                                </form>
                                            </div>';
                                    }
                                    ?>

                                    <?php
                                    if (@$_GET['q'] == 4 && (@$_GET['step']) == 3) {
                                        echo '
                                            <div class="container addButtons">
                                                <div class="">
                                                    <button id="pdfButton" type="button">Input a PDF</button> 
                                                </div>
                                                <div class="">
                                                    <button id="editorButton" type="button">Input Text with Images and Videos</button> 
                                                </div>
                                            </div>
                                            <form id="pdfForm" action="upload.php" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="mread"></label>  
                                                    <input type="file" name="moduleFile">
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for=""></label>
                                                    <div class="col-md-12">
                                                        <input name="submit" type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                                                    </div>
                                                </div>
                                            </form>
                                            <div id="editorForm" class="row">
                                            <span class="title1" style="margin-left:35%;font-size:30px;"><b>Enter course readings</b></span><br /><br />
                                            
                                            <div class="col-md-3"></div>
                                                <div class="col-md-6"> 
                                                    <form class="form-horizontal title1" name="form" action="update.php?q=addmodules"  method="POST">
                                                        <style>
                                                            #container {
                                                                width: 1000px;
                                                                margin: 20px auto;
                                                            }
                                                            .ck-editor__editable[role="textbox"] {
                                                                /* editing area */
                                                                min-height: 200px;
                                                            }
                                                            .ck-content .image {
                                                                /* block images */
                                                                max-width: 80%;
                                                                margin: 20px auto;
                                                            }
                                                        </style>

                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label" for="mread"></label>  
                                                            <div class="col-md-12" id="container"></div>
                                                            <textarea rows="8" cols="8" name="mread" id="editor" class="form-control" placeholder="Write description here..."></textarea>  
                                                            
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label" for=""></label>
                                                            <div class="col-md-12"> 
                                                                <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            ';

                                        echo '
                                            <script>
                                                $("#pdfForm").hide();
                                                $("#editorForm").hide();


                                                // This sample still does not showcase all CKEditor 5 features (!)
                                                // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
                                                CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                                                    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                                                    toolbar: {
                                                        items: [
                                                            "exportPDF","exportWord", "|",
                                                            "findAndReplace", "selectAll", "|",
                                                            "heading", "|",
                                                            "bold", "italic", "strikethrough", "underline", "code", "subscript", "superscript", "removeFormat", "|",
                                                            "bulletedList", "numberedList", "todoList", "|",
                                                            "outdent", "indent", "|",
                                                            "undo", "redo",
                                                            "-",
                                                            "fontSize", "fontFamily", "fontColor", "fontBackgroundColor", "highlight", "|",
                                                            "alignment", "|",
                                                            "link", "insertImage", "blockQuote", "insertTable", "mediaEmbed", "codeBlock", "htmlEmbed", "|",
                                                            "specialCharacters", "horizontalLine", "pageBreak", "|",
                                                            "textPartLanguage", "|",
                                                            "sourceEditing"
                                                        ],
                                                        shouldNotGroupWhenFull: true
                                                    },
                                                    // Changing the language of the interface requires loading the language file using the <script> tag.
                                                    // language: "es",
                                                    list: {
                                                        properties: {
                                                            styles: true,
                                                            startIndex: true,
                                                            reversed: true
                                                        }
                                                    },
                                                    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                                                    heading: {
                                                        options: [
                                                            { model: "paragraph", title: "Paragraph", class: "ck-heading_paragraph" },
                                                            { model: "heading1", view: "h1", title: "Heading 1", class: "ck-heading_heading1" },
                                                            { model: "heading2", view: "h2", title: "Heading 2", class: "ck-heading_heading2" },
                                                            { model: "heading3", view: "h3", title: "Heading 3", class: "ck-heading_heading3" },
                                                            { model: "heading4", view: "h4", title: "Heading 4", class: "ck-heading_heading4" },
                                                            { model: "heading5", view: "h5", title: "Heading 5", class: "ck-heading_heading5" },
                                                            { model: "heading6", view: "h6", title: "Heading 6", class: "ck-heading_heading6" }
                                                        ]
                                                    },
                                                    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                                                    placeholder: "Please insert the course reading ...",
                                                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                                                    fontFamily: {
                                                        options: [
                                                            "default",
                                                            "Arial, Helvetica, sans-serif",
                                                            "Courier New, Courier, monospace",
                                                            "Georgia, serif",
                                                            "Lucida Sans Unicode, Lucida Grande, sans-serif",
                                                            "Tahoma, Geneva, sans-serif",
                                                            "Times New Roman, Times, serif",
                                                            "Trebuchet MS, Helvetica, sans-serif",
                                                            "Verdana, Geneva, sans-serif"
                                                        ],
                                                        supportAllValues: true
                                                    },
                                                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                                                    fontSize: {
                                                        options: [ 10, 12, 14, "default", 18, 20, 22 ],
                                                        supportAllValues: true
                                                    },
                                                    // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                                                    // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                                                    htmlSupport: {
                                                        allow: [
                                                            {
                                                                name: /.*/,
                                                                attributes: true,
                                                                classes: true,
                                                                styles: true
                                                            }
                                                        ]
                                                    },
                                                    // Be careful with enabling previews
                                                    // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                                                    htmlEmbed: {
                                                        showPreviews: true
                                                    },
                                                    // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                                                    link: {
                                                        decorators: {
                                                            addTargetToExternalLinks: true,
                                                            defaultProtocol: "https://",
                                                            toggleDownloadable: {
                                                                mode: "manual",
                                                                label: "Downloadable",
                                                                attributes: {
                                                                    download: "file"
                                                                }
                                                            }
                                                        }
                                                    },
                                                    // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                                                    mention: {
                                                        feeds: [
                                                            {
                                                                marker: "@",
                                                                feed: [
                                                                    "@apple", "@bears", "@brownie", "@cake", "@cake", "@candy", "@canes", "@chocolate", "@cookie", "@cotton", "@cream",
                                                                    "@cupcake", "@danish", "@donut", "@dragée", "@fruitcake", "@gingerbread", "@gummi", "@ice", "@jelly-o",
                                                                    "@liquorice", "@macaroon", "@marzipan", "@oat", "@pie", "@plum", "@pudding", "@sesame", "@snaps", "@soufflé",
                                                                    "@sugar", "@sweet", "@topping", "@wafer"
                                                                ],
                                                                minimumCharacters: 1
                                                            }
                                                        ]
                                                    },
                                                    // The "super-build" contains more premium features that require additional configuration, disable them below.
                                                    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                                                    removePlugins: [
                                                        // These two are commercial, but you can try them out without registering to a trial.
                                                        // "ExportPdf",
                                                        // "ExportWord",
                                                        "CKBox",
                                                        "CKFinder",
                                                        "EasyImage",
                                                        // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                                                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                                                        // Storing images as Base64 is usually a very bad idea.
                                                        // Replace it on production website with other solutions:
                                                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                                                        // "Base64UploadAdapter",
                                                        "RealTimeCollaborativeComments",
                                                        "RealTimeCollaborativeTrackChanges",
                                                        "RealTimeCollaborativeRevisionHistory",
                                                        "PresenceList",
                                                        "Comments",
                                                        "TrackChanges",
                                                        "TrackChangesData",
                                                        "RevisionHistory",
                                                        "Pagination",
                                                        "WProofreader",
                                                        // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                                                        // from a local file system (file://) - load this site via HTTP server if you enable MathType
                                                        "MathType"
                                                    ]
                                                });

                                                $("#pdfButton").on("click", function(){
                                                    $("#editorForm").hide();
                                                    $("#pdfForm").show();
                                                });

                                                $("#editorButton").on("click", function(){
                                                    $("#pdfForm").hide();
                                                    $("#editorForm").show();
                                                });
                                            </script>
                                            
                                            ';
                                    }
                                    ?>

                                    <?php if (@$_GET['q'] == 7) {

                                        $result = mysqli_query($con, "SELECT * FROM quiz where email='$email' ORDER BY date DESC") or die('Error');
                                        echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
                                        $c = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                            $title = $row['title'];
                                            $total = $row['total'];
                                            $sahi = $row['sahi'];
                                            $time = $row['time'];
                                            $eid = $row['eid'];
                                            echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&eid=' . $eid . '" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
                                        }
                                        $c = 0;
                                        echo '</table></div>';
                                    }
                                    ?>

                                    <!--add quiz end-->

                                    <!--add quiz step2 start-->
                                    <?php
                                    if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
                                        echo ' 
                                            <div class="row">
                                            <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
                                            <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
                                            <fieldset>
                                            ';

                                        for ($i = 1; $i <= @$_GET['n']; $i++) {
                                            echo '<b>Question number&nbsp;' . $i . '&nbsp;:</><br /><!-- Text input-->
                                                <div class="form-group">
                                                <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
                                                <div class="col-md-12">
                                                <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Write question number ' . $i . ' here..."></textarea>  
                                                </div>
                                                </div>
                                                <!-- Text input-->
                                                <div class="form-group">
                                                <label class="col-md-12 control-label" for="' . $i . '1"></label>  
                                                <div class="col-md-12">
                                                <input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">
                                                    
                                                </div>
                                                </div>
                                                <!-- Text input-->
                                                <div class="form-group">
                                                <label class="col-md-12 control-label" for="' . $i . '2"></label>  
                                                <div class="col-md-12">
                                                <input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">
                                                    
                                                </div>
                                                </div>
                                                <!-- Text input-->
                                                <div class="form-group">
                                                <label class="col-md-12 control-label" for="' . $i . '3"></label>  
                                                <div class="col-md-12">
                                                <input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text">
                                                    
                                                </div>
                                                </div>
                                                <!-- Text input-->
                                                <div class="form-group">
                                                <label class="col-md-12 control-label" for="' . $i . '4"></label>  
                                                <div class="col-md-12">
                                                <input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">
                                                    
                                                </div>
                                                </div>
                                                <br />
                                                <b>Correct answer</b>:<br />
                                                <select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md" >
                                                <option value="a">Select answer for question ' . $i . '</option>
                                                <option value="a">option a</option>
                                                <option value="b">option b</option>
                                                <option value="c">option c</option>
                                                <option value="d">option d</option> </select><br /><br />';
                                        }

                                        echo '<div class="form-group">
                                            <label class="col-md-12 control-label" for=""></label>
                                            <div class="col-md-12"> 
                                                <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                                            </div>
                                            </div>

                                            </fieldset>
                                            </form></div>';
                                    }
                                    ?>
                                    <!--add quiz step 2 end-->

                                    <!--remove quiz-->
                                    <?php if (@$_GET['q'] == 5) {

                                        $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                                        echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
                                        $c = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                            $title = $row['title'];
                                            $total = $row['total'];
                                            $sahi = $row['sahi'];
                                            $time = $row['time'];
                                            $eid = $row['eid'];
                                            echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&eid=' . $eid . '" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
                                        }
                                        $c = 0;
                                        echo '</table></div>';
                                    }
                                    ?>

                                    <!-- ------------------------------------- -->
                                    <!--add admin start-->

                                    <?php
                                    if (@$_GET['q'] == 8) {
                                        echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Admin Details</b></span><br /><br />
<div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="signadmin.php"  method="POST">
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
                                    <?php if (@$_GET['q'] == 9) {

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


                                    <?php
                                    if (@$_GET['q'] == 10) {

                                        $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date") or die('Error');
                                        echo  '
                                        <div class="panel">
                                            <table class="table table-striped title1">
                                                <tr>
                                                    <td>
                                                        <b>Courses</b>
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
                                                            <b>Course Progress</b>
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

                                            $moduleLevel = mysqli_query($con, "SELECT moduleNum FROM user_progress WHERE email='$email'");
                                            $moduleProgress = mysqli_fetch_assoc($moduleLevel);
                                            $totalModules = mysqli_query($con, "SELECT COUNT(*) FROM modules");
                                            $total = mysqli_fetch_assoc($totalModules);
            

                                            $progress = ($moduleProgress["moduleNum"] == $total["COUNT(*)"]) ? "Done" : $moduleProgress["moduleNum"];

                                            if ($role == "Student") {
                                                echo
                                                '<tr>
                                                    <td>' . $name . '</td>
                                                    <td>' . $gender . '</td>
                                                    <td>' . $email . '</td>
                                                    <td>' . $mob . '</td>
                                                    <td>' . $progress . '</td>
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
                                                                <b>Course Progress</b>
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


                                    <?php
                                    if (@$_GET['q'] == 13) {
                                        $q = mysqli_query($con, "SELECT * FROM history ORDER BY date DESC") or die('Error197');
                                        echo  '
                                    <div class="panel title">
                                        <input id="historySearch" type="text" placeholder="Search Users" class="form-control my-3" />
                                            <table class="table table-striped title1" >
                                                <tr style="color:black"> 
                                                <td>
                                                    <b>Email</b>
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
                                            $email = $row['email'];

                                            $q23 = mysqli_query($con, "SELECT title FROM quiz WHERE  eid='$eid' ") or die('Error208');
                                            while ($row = mysqli_fetch_array($q23)) {
                                                $title = $row['title'];
                                            }
                                            $c++;

                                            echo '
                                                <tr>
                                                    <td>' . $email . '</td>
                                                    <td>' . $title . '</td>
                                                    <td>' . $qa . '</td>
                                                    <td>' . $r . '</td>
                                                    <td>' . $w . '</td>
                                                    <td>' . $s . '</td></tr>';
                                        }
                                        echo '</table>
                                        </div>
                                        
                                        <script>
                                            $("#historySearch").keyup(function() {
                                                
                                            $.get("search.php", {search: "userHistory", searchValue: $("#historySearch").val()}, function(data){
                                                var result = JSON.parse(data);
                                                
                                                $("tbody").html(`<tr style="color:black">
                                                <td>
                                                    <b>Email</b>
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
                                                </td>
                                                    </tr>`
                                                );

                                                for (var i = 0; i < result.length; i++){
                                                    console.log(result[i]);
                                                    $("tbody").append(
                                                        `<tr>
                                                        <td> ${result[i][0].toString()} </td> 
                                                        <td> ${result[i][9].toString()} </td>
                                                        <td> ${result[i][3].toString()} </td>
                                                        <td> ${result[i][4].toString()} </td>
                                                        <td> ${result[i][5].toString()} </td>
                                                        <td>  
                                                            ${result[i][2].toString()}
                                                        </td>
                                                        </tr>
                                                        `
                                                    )
                                                }
                                            });
                                        });
                                    
                                    </script>
                                        ';
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
</body>

</html>