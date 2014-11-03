<?php  
require_once "config/koneksi.php";
require_once "config/flash_info.php";
session_start();
if (empty($_SESSION)) {
    header("Location:module/home.php");
    // header("Location:module/login.php?message=login");
}
$module = $_GET['module'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Wahyu Taufik <wahyutaufik37@gmail.com>">

        <title>belajaarcoding.com</title>
        <link type="image/x-icon" href="layout/images/favicon.ico" rel="Shortcut icon">
        <link href="layout/css/bootstrap.min.css" rel="stylesheet">
        <link href="layout/css/plugins/dataTables.bootstrap.css" rel="stylesheet">
        <link href="layout/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="layout/css/plugins/timeline.css" rel="stylesheet">
        <link href="layout/css/sb-admin-2.css" rel="stylesheet">
        <link href="layout/css/style.css" rel="stylesheet">
        <link href="layout/css/plugins/morris.css" rel="stylesheet">
        <link href="layout/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div id="wrapper">
            <?php include 'header.php'; ?>
            <div id="page-wrapper">
                <div class="row">
                    <?php echo flash(); ?>
                    <div class="col-lg-12">
                        <?php if (empty($module)): ?>
                            <h1 class="page-header">Dashboard</h1>
                        <?php elseif ($module == "viewCourse"): ?>
                            <!-- hidden header -->
                        <?php else: ?>
                            <h1 class="page-header"><?php echo ucfirst(preg_replace('/\B([A-Z])/', ' $1', $module)); ?></h1>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php include 'page.php'; ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="layout/js/jquery-1.11.0.js"></script>
        <script src="layout/js/bootstrap.min.js"></script>
        <script src="layout/js/ckeditor/ckeditor.js"></script>
        <script src="layout/js/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="layout/js/plugins/dataTables/dataTables.bootstrap.js"></script>
        <script src="layout/js/plugins/metisMenu/metisMenu.js"></script>
        <script src="layout/js/plugins/morris/raphael.min.js"></script>
        <script src="layout/js/sb-admin-2.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
            $(".alert").click(function() {
                $(this).addClass("hide");
            });
        </script>
    </body>
</html>
