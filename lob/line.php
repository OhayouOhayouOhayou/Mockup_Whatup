<?php
include("connect.php");
define('CLIENT_ID', 'BXjcqk68wk5qF1RNDk0Shx');
define('LINE_API_URI', 'https://notify-bot.line.me/oauth/authorize?');
define('CALLBACK_URI', 'https://www.sk-thonburi.ac.th/sktorder/callback.php');

$queryStrings = [
    'response_type' => 'code',
    'client_id' => CLIENT_ID,
    'redirect_uri' => CALLBACK_URI,
    'scope' => 'notify',
    'state' => 'abcdef123456'
];

$queryString = LINE_API_URI . http_build_query($queryStrings);

?>

<!doctype html>
<html lang="en">

<!-- Head -->
<head>
  <!-- Page Meta Tags-->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="ระบบสั่งซื้ออาหาร SKT-Ordering">
  <meta name="keywords" content="ระบบสั่งซื้ออาหาร SKT-Ordering">

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
  <title>ระบบสั่งซื้ออาหาร | SKT-Ordering</title>

</head>
<body class=" bg-light">
    <center><h3>กรุณากดรับการแจ้งเตือนผ่านไลน์</h3></center>
    
    <center><a href="<?php echo $queryString; ?>">
        <img src="line.png" alt="" width="250px"></a></center>
        </body>
        </html>
