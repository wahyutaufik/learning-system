<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Wahyu Taufik <wahyutaufik37@gmail.com>">
    <title>Login - belajaarcoding.com</title>
    <link type="image/x-icon" href="../layout/images/favicon.ico" rel="Shortcut icon">
    <link href="../layout/css/style.css" rel="stylesheet">
    <link href="../layout/css/bootstrap.min.css" rel="stylesheet">
    <link href="../layout/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../layout/css/sb-admin-2.css" rel="stylesheet">
    <link href="../layout/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body class="login">
    <div class="container">
        <div class="row">
            <?php
            require_once "../config/flash_info.php";
            echo flash(); 
            ?>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Log In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="../config/cek_login.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-outline btn-primary btn-block" value="Login">
                                <div style="text-align:center;">atau</div>
                                <a href="daftar.php" class="btn btn-lg btn-outline btn-success btn-block">Daftar</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../layout/js/jquery-1.11.0.js"></script>
    <script src="../layout/js/bootstrap.min.js"></script>
    <script src="../layout/js/plugins/metisMenu/metisMenu.min.js"></script>
    <script src="../layout/js/sb-admin-2.js"></script>
    <script>
        $(".alert").click(function() {
            $(this).addClass("hide");
        });
    </script>
</body>

</html>
