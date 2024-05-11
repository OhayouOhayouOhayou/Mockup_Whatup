<?php
session_start();
error_reporting(~E_NOTICE);
 if(isset($_SESSION['ID']) || $_SESSION['ID'] === true) {
    header('Location: dist/index.php');
 } else {
    false;
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - > ร้านรัฐนันท์ มีดเมืองลิง</title>
    <link rel="stylesheet" href="dist/assets/css/bootstrap.css">

    <link rel="stylesheet" href="dist/assets/css/app.css">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                            <h1>ร้านรัฐนันท์</h1>
                            <p>มีดเมืองลิง</p>
                              
                                <h3>Sign In</h3>
                               
                            </div>
                            <form method="post" action="dist/chk_login.php">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="username" name="username">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                        
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix">
                                    <button class="btn btn-primary float-end">Submit</button>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="dist/assets/js/feather-icons/feather.min.js"></script>
    <script src="dist/assets/js/app.js"></script>

    <script src="dist/assets/js/main.js"></script>
</body>

</html>