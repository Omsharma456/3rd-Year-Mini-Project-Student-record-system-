<?php
session_start();

if (!(isset ($_SESSION ['login']))) {

    header('location:../index.php');
}

include('../config/DbFunction.php');
$obj = new DbFunction();
$rs = $obj->showSubject();


if (isset($_GET['del'])) {

    $obj->del_subject(intval($_GET['del']));


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

    <title>view subject</title>
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
                            View Course
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Subject1</th>
                                        <th>Subject2</th>
                                        <th>Subject3</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $sn = 1;
                                    while ($res = $rs->fetch_object()) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $sn ?></td>
                                            <td><?php echo htmlentities(strtoupper($res->sub1)); ?></td>
                                            <td><?php echo htmlentities(strtoupper($res->sub2)); ?></td>
                                            <td><?php echo htmlentities(strtoupper($res->sub3)); ?></td>
                                            <td>&nbsp;&nbsp;<a
                                                        href="edit-sub.php?sid=<?php echo htmlentities($res->subid); ?>">
                                                    <p class="fa fa-edit"></p></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="view-subject.php?del=<?php echo htmlentities($res->subid); ?>">
                                                    <p class="fa fa-times-circle"></p></td>

                                        </tr>

                                        <?php $sn++;
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


        </div>
        <!-- /#page-wrapper -->

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
