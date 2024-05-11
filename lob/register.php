<?php
include("connect.php");
?>
<!doctype html>
<html lang="en">

<!-- Head -->
<head>
  <!-- Page Meta Tags-->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="ระบบตัด Stock">
  <meta name="keywords" content="ระบบตัด Stock">

  <!-- Custom Google Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Thasadith:wght@700&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto"
    rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="logo.jpg">
  <link rel="icon" type="image/png" sizes="16x16" href="logo.jpg">
  <link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="./assets/css/libs.bundle.css" />
  <!-- Main CSS -->
  <link rel="stylesheet" href="./assets/css/theme.bundle.css" />
  <noscript>
    <style>
    
      .simplebar-content-wrapper {
        overflow: auto;
      }
    </style>
  </noscript>
<style>
        .text-outline-dark {
         font-family: 'Thasadith', sans-serif !important;
        }
        .fw-bold {
            font-family: 'Thasadith', sans-serif !important; 
            }
        body , .lead ,h1{
            font-family: 'Thasadith', sans-serif !important; 
        }
        .w-1000 {
            width: 100%!important;
            max-height: 300px;
        }



            .navbar-light .navbar-nav .nav-link {
                color: white;
            }
    </style>
  <!-- Page Title -->
  <title>ระบบตัด Stock</title>

</head>
<body class=" bg-light">

    <!-- Main Section-->
    <div style="margin-top:200px"></div>
    <section
        class="mt-0  vh-100 d-flex justify-content-center align-items-center p-4">
        <!-- Page Content Goes Here -->

        <!-- Login Form-->
        <div class="col col-md-8 col-lg-6 col-xxl-5">
            <!-- Logo-->
            <a class="navbar-brand fw-bold fs-3 flex-shrink-0 order-0 align-self-center justify-content-center d-flex mx-0 px-0" href="./index.html">
                <div class="d-flex align-items-center">
                <img src="assets/images/logos/logo.png" style="max-width:100px"> 
                </div>
            </a>
            <!-- / Logo-->
            <div class="shadow-xl p-4 p-lg-5 bg-white">
                <h1 class="text-center mb-5 fs-2 fw-bold">สมัครใช้งาน</h1>
               
                <form method="POST" action="sys/regis.php">
                    <div class="form-group">
                      <label class="form-label" for="register-fname">ชื่อจริง</label>
                      <input type="text" name="fname" class="form-control" id="register-fname" placeholder="กรุณากรอกชื่อจริง" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="register-lname">นามสกุล</label>
                      <input type="text" name="lname" class="form-control" id="register-lname" placeholder="กรุณากรอกนามสกุล" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="register-lname">เบอร์โทร</label>
                      <input type="text" name="tel" class="form-control" id="register-lname" placeholder="กรุณากรอกเบอร์โทร" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="register-lname">ที่อยู่</label>
                      <input type="textarea" name="addr" class="form-control" id="register-lname" placeholder="กรุณากรอกที่อยู่" required>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label class="form-label" for="register-email">อีเมล</label>
                      <input type="email" name="mail"  class="form-control" id="register-email" placeholder="อีเมล" required>
                    </div>
                  
                    <div class="form-group">
                      <label class="form-label" for="register-password">Password</label>
                      <input type="password" name="pass" class="form-control" id="register-password" placeholder="กรุณาใส่รหัสผ่าน" required>
                    </div>
                  
                    <button type="submit" class="btn btn-dark d-block w-100 my-4">Sign Up</button>
                  </form>
                  <p class="d-block text-center text-muted">Already registered? <a class="text-muted" href="./login.php">Login here.</a></p>
            </div>

        </div>
        <!-- / Login Form-->

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->


    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>