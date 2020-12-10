<?php
session_start();

if (!(isset ($_SESSION ['login']))) {

    header('location:../index.php');
}

include('../config/DbFunction.php');
$obj = new DbFunction();
$rs = $obj->showSession();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>view course</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->

    <?php include('leftbar.php') ?>;


    <nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header"> <?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?></h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Session
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="form-group">


                                <div class="col-lg-2">
                                    <label>Session<span id="" style="font-size:11px;color:red">*</span></label>

                                </div>
                                <div class="col-lg-4">
                                    <?php while ($res = $rs->fetch_object()) {
                                        if ($res->status == 1) {
                                            ?>
                                            <input type="radio" name="gender" id="male"
                                                   value="<?php echo $res->session; ?>" checked required="required">
                                            &nbsp;&nbsp;<?php echo $res->session; ?> <br>
                                        <?php } ?>

                                        <input type="radio" name="gender" id="male" value="<?php echo $res->session; ?>"
                                               checked required="required">
                                        &nbsp;&nbsp;<?php echo $res->session; ?> <br>

                                    <?php } ?>
                                </div>

                                <input type="submit" class="btn btn-primary" name="submit" value="Update Session">
                            </div>


                        </div>


                    </div>

                </div>


            </div>


        </div>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

</body>

</html>
