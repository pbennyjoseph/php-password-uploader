<?php
session_start();
if (isset($_POST["submit"])) {
    $str =  "<script>$('#retval').html('";
    if ($_POST['pwd'] == 'Password123') { // CHANGE THE PASSWORD
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
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" // you can replace this with something
        && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; // this too
          $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) { // you can replace 5000000 with any bytes
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
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
        $str .= "Wrong Password";
    }
    $str .= "');</script>";
    $_SESSION['message'] = $str;
    unset($_POST);
    unset($_FILES);
    header("Location: index.php");
    exit;
}
?>