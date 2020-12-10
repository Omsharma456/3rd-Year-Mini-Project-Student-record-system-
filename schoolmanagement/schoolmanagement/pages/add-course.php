<?php
session_start();

if (!(isset ($_SESSION ['login']))) {

    header('location:../index.php');
}

if (isset($_POST['submit'])) {

    include('../config/DbFunction.php');
    $obj = new DbFunction();
    $obj->create_course($_POST['course-short'], $_POST['course-full'], $_POST['cdate']);

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

    <title>add course</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<form method="post">
    <div id="wrapper">

        <!-- Navigation -->
        <?php include('leftbar.php') ?>;

        <!--nav-->
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
                        <div class="panel-heading">Add Course</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Course Short Name<span id=""
                                                                          style="font-size:11px;color:red">*</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6">

                                            <input class="form-control" name="course-short" id="cshort"
                                                   required="required" onblur="courseAvailability()">
                                            <span id="course-availability-status" style="font-size:12px;"></span></div>

                                    </div>

                                    <br><br>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Course Full Name<span id="" style="font-size:11px;color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" name="course-full" id="cfull"
                                                   required="required" onblur="coursefullAvail()">
                                            <span id="course-status" style="font-size:12px;"></span></div>
                                    </div>

                                    <br><br>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label>Creation Date</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="<?php echo date('d-m-Y'); ?>"
                                                   readonly="readonly" name="cdate">

                                        </div>
                                    </div>
                                </div>

                                <br><br>

                                <div class="form-group">
                                    <div class="col-lg-4">

                                    </div>
                                    <div class="col-lg-6"><br><br>
                                        <input type="submit" class="btn btn-primary" name="submit"
                                               value="Create Course"></button>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    </div>


    </div>

    <script src="../dist/js/bootstrap.bundle.js"
            type="text/javascript"></script>


    <script src="../dist/js/bootstrap.js"
            type="text/javascript"></script>

    <script src="./dist/css/timeline.css"
            type="text/javascript"></script>


    <script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>

    <script>
        function courseAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "course_availability.php",
                data: 'cshort=' + $("#cshort").val(),
                type: "POST",
                success: function (data) {
                    $("#course-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () {
                }
            });
        }

        function coursefullAvail() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "course_availability.php",
                data: 'cfull=' + $("#cfull").val(),
                type: "POST",
                success: function (data) {
                    $("#course-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () {
                }
            });
        }


    </script>
</form>
</body>

</html>
