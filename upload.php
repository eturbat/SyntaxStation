<!-- /* handles the submission of a form that includes a file upload field named
"moduleFile". */ -->
<?php
include_once 'dbConnection.php';

    if (isset($_POST['submit'])) {

        if (isset($_FILES['moduleFile']['name']))
        {
          $file_name = $_FILES['moduleFile']['name'];
          $file_tmp = $_FILES['moduleFile']['tmp_name'];
          $target = "assets/courseFiles/";
          $target_file = $target . basename($file_name);

          move_uploaded_file($file_tmp, $target_file);
        
          $moduleID=uniqid();

          $insertquery = "INSERT INTO modules VALUES ('$moduleID','$target_file')";
          $iquery = mysqli_query($con, $insertquery);
          header("location:dash.php?q=4&moduleID=$moduleID");
        }
        else {
           ?>
            <div class=
            "alert alert-danger alert-dismissible
            fade show text-center">
              <a class="close" data-dismiss="alert"
                 aria-label="close">×</a>
              <strong>Failed!</strong>
                  File must be uploaded in PDF format!
            </div>
          <?php
        }
    }
?>