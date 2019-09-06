<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Signin Upload</title>
    <link rel="icon" href="favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="mx-1 mt-1 card rounded">
                <div class="card-body">
                    <form action="upload.php" method="post" enctype="multipart/form-data" class="form-signin">
                        <h1 class="h3 mb-3 font-weight-normal">Please verify</h1>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password" required>
                        <label class="btn btn-primary btn-block">
                            Browse <input type="file" name="fileToUpload" id="filetoUpload"
                                onchange="$('#upload-file-info').html(this.files[0].name)" hidden>
                        </label>
                        <p class='label label-info' id="upload-file-info"></p>
                        <p class='label label-info' id="retval"></p>
                        <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Verify and upload
                        </button>
                        <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <?php
        if(isset($_SESSION['message']))
        {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>
</body>

</html>