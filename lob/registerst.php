<!doctype html>
<html lang="en">

<!-- Head -->
<head>
  <!-- Page Meta Tags-->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="">

  <!-- Custom Google Fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto"
    rel="stylesheet">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon/logo.png">
  <link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

  <!-- Main CSS -->
  <link rel="stylesheet" href="./assets/css/theme.bundle.css" />

  <!-- Fix for custom scrollbar if JS is disabled-->
  <noscript>
    <style>
      /**
          * Reinstate scrolling for non-JS clients
          */
      .simplebar-content-wrapper {
        overflow: auto;
      }
    </style>
  </noscript>

  <!-- Page Title -->
  <title>LohToo | Register</title>

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
                <h1 class="text-center mb-5 fs-2 fw-bold">สมัครเป็นร้านค้า</h1>
               
                <form action="regis2.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <label class="form-label" for="register-fname">ชื่อจริง</label>
                      <input type="text" name="fname" class="form-control" id="register-fname" placeholder="กรุณากรอกชื่อจริง">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="register-lname">นามสกุล</label>
                      <input type="text" name="lname" class="form-control" id="register-lname" placeholder="กรุณากรอกนามสกุล">
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="register-lname">ชื่อร้าน</label>
                      <input type="text" name="store" class="form-control" id="register-add" placeholder="กรุณากรอกชื่อร้าน">
                    </div>
                    
                    <div class="form-group">
                      <label class="form-label" for="register-email">Email address</label>
                      <input type="email" name="mail"  class="form-control" id="register-email" placeholder="กรุณากรอกอีเทล">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="register-lname">ที่อยู่</label>
                      <input type="text" name="addr" class="form-control" id="register-add" placeholder="กรุณากรอกที่อยู่">
                    </div>

                 
                    
                    <div class="form-group">
                      <label class="form-label" for="register-password">Password</label>
                      <input type="password" name="pass" class="form-control" id="register-password" placeholder="กรุณาใส่รหัสผ่าน">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlFile1">รูปภาพหน้าร้าน</label>
                      <input name="fileToUpload" type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="form-check">
                      <input name="p" type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                      <label class="form-check-label" for="exampleCheck1">สมัคร VIP (ฟรี 1 เดือน)</label>
                    </div>

                    <button type="submit" class="btn btn-dark d-block w-100 my-4">Sign Up</button>
                  </form>
                  <p class="d-block text-center text-muted">Already registered? <a class="text-muted" href="./login.php">Login here.</a></p>
                  <p class="d-block text-center text-muted">สมัครเปิดร้าน <a class="text-muted" href="./registerst.php">เปิดร้าน</a></p>
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