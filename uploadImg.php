/*  It checks if a file has been uploaded using the `isset()` functiony. It then extracts the file name and
extension, generates a new name for the file using `rand()`, and checks if the file extension is
allowed. */
<?php
if(isset($_FILES['upload']['name']))
{
    $file = $_FILES['upload']['tmp_name'];
    $file_name = $_FILES['upload']['name'];
    $file_name_array = explode(".", $file_name);
    $extension = end($file_name_array);
    $new_image_name = rand() . '.' . $extension;
    chmod('upload', 0777);
    $allowed_extension = array("jpg", "gif", "png", "jpeg");

// If the extension is allowed, it moves the file to a directory called "upload" and generates
// a URL for the uploaded file. Finally, it call a function in the CKEditor editor
// to insert the uploaded image into the editor.
    if(in_array($extension, $allowed_extension))
    {  
        move_uploaded_file($file, 'upload/' . $new_image_name);
        $function_number = $_GET['CKEditorFuncNum'];
        $url = 'upload/' . $new_image_name;
        $message = '';
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
    }
}

?>