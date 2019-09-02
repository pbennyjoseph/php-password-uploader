<?php
session_start();
if (isset($_POST["submit"])) {
    $str =  "<script>$('#retval').html('";
    if ($_POST['pwd'] == 'YOUR_PASSWORD_HERE') {
        $target_dir    = "uploads/";
        $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk      = 1;
        $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if file already exists
        if (file_exists($target_file)) {
            $str .= "Sorry, file already exists.<br>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        //if($FileType != "json" && $FileType != "txt" && $FileType != "html"
        //&& $FileType != "pdf" ) {
        //    echo "Sorry, only xlsx,xls,and csv files are allowed.";
        //    $uploadOk = 0;
        //}
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $str .= "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $str .= "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            } else {
                $str .= "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $str .= "Invalid key";
    }
    $str .= "');</script>";
    $_SESSION['message'] = $str;
    unset($_POST);
    unset($_FILES);
    header("Location: index.php");
    exit;
}
?>