<!DOCTYPE html>
<html lang="en">

<head>
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
    
    body, .lead, h1 {
      font-family: 'Thasadith', sans-serif !important; 
    }
    
    .w-1000 {
      width: 100%!important;
      max-height: 300px;
    }

    .navbar-light .navbar-nav .nav-link {
      color: white;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }
  </style>

  <title>ระบบสั่งซื้อแบตเตอรี่รถยนต์</title>
</head>

<body class="bg-light">

  <!-- Main Section-->
  <section class="col-md-6 mt-0 justify-content-center align-items-center">
    <!-- Page Content Goes Here -->

    <!-- Login Form-->
    <div class="col col-md-12 col-lg-12 col-xxl-12">
      <!-- Logo-->
      <a class="navbar-brand fw-bold fs-3 flex-shrink-0 order-0 align-self-center justify-content-center d-flex mx-0 px-0" href="./index.php">
        <div class="d-flex align-items-center">
          <img src="assets/images/logos/logo.png" style="max-width:100px"> 
        </div>
      </a>
      <!-- / Logo-->
      <div class="shadow-xl p-4 p-lg-5 bg-white">
        <h1 class="text-center fw-bold mb-5 fs-2">Login</h1>

        <form method="POST" action="checklogin.php">
          <div class="form-group">
            <label class="form-label" for="login-email">Email หรือ Username ของท่าน</label>
            <input type="text" name="uname" class="form-control" id="login-email" placeholder="กรอก Email หรือ Username ของท่าน" required>
          </div>
          <div class="form-group">
            <label for="login-password" class="form-label d-flex justify-content-between align-items-center">
              Password
              <a href="#" class="text-muted small">Forgot your password?</a>
            </label>
            <input type="password" name="pass" class="form-control" id="login-password" placeholder="กรอกรหัสผ่าน" required>
          </div>
          <button type="submit" class="btn btn-dark d-block w-100 my-4">Login</button>
        </form>
        <p class="d-block text-center text-muted">กรณียังไม่เป็นสมาชิก  <a class="text-muted" href="./register.php">สมัครสมาชิก</a></p>
        <p class="d-block text-center text-muted"> <a class="text-muted" href="./remember.php">ลืมรหัสผ่าน</a></p>
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
