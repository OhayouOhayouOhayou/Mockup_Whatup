

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
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon/favicon-16x16.png">
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
  <title>ระบบสั่งซื้อเครื่องสำอางค์</title>

</head>
<body class=" bg-light">

    <!-- Main Section-->
    <section
        class="mt-0 overflow-hidden  vh-100 d-flex justify-content-center align-items-center p-4">
        <!-- Page Content Goes Here -->

        <!-- Login Form-->
        <div class="col col-md-8 col-lg-6 col-xxl-5">
            
            <!-- / Logo-->
            <div class="shadow-xl p-4 p-lg-5 bg-white">
                <h1 class="text-center fs-2 mb-5 fw-bold">Forgotten Password</h1>
                <p class="text-muted">Please enter your email below and we will send you a secure link to reset your password.</p>
                <form method="POST" action="send-password-reset.php">
                    <div class="form-group">
                      <label for="forgot-password" class="form-label">Email address</label>
                      <input type="email" name="mail" class="form-control" id="forgot-password" placeholder="name@email.com">
                    </div>
                    <button type="submit" class="btn btn-dark d-block w-100 my-4">Send Reset Link</button>
                </form>
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