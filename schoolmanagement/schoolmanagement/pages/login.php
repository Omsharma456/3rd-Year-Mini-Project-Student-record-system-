<?php
session_start();
if (isset($_POST['submit'])) {

    include('../config/DbFunction.php');
    $obj = new DbFunction();
    $_SESSION['login'] = $_POST['id'];
    $obj->login($_POST['id'], $_POST['password']);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>School Management Login </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<h2 align="center">Student Record Management System</h2>
<div class="container">
    <br><br><br><br>

    <div class="col-md-4 col-md-offset-4">

        <div class="panel panel-primary">

            <div class="panel-heading">
                <h3 class="panel-title">Sign In</h3>
            </div>
            <div class="panel-body">
                <form method="post">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Login Id" id="id" name="id" type="text" autofocus
                                   autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" id="password" name="password"
                                   type="password" value="">
                        </div>

                        <!-- Change this to a button or input when using this as a form -->
                        <input type="submit" value="login" name="submit" class="btn btn-lg btn-success btn-block">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    jQuery(function () {
        jQuery("#id").validate({
            expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
            message: "Should be a valid id"
        });
        jQuery("#password").validate({
            expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
            message: "Should be a valid password"
        });

    });

</script>
</body>

</html>
