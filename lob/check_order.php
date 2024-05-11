<?php
include("connect.php");
$sql = "SELECT * FROM lt_user WHERE id = '".$_SESSION['id']."'";
$result = mysqli_query($con , $sql);
$row = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <title>ระบบสั่งซื้อแบตเตอรี่</title>

    <!-- Custom Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto" rel="stylesheet">

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
            .simplebar-content-wrapper {
                overflow: auto;
            }
        </style>
    </noscript>
</head>

<body class="">
<form action="payment.php" method="post" enctype="multipart/form-data">

    <section class="mt-0 vh-lg-100">
        <div class="container">
            <div class="row g-0 vh-lg-100">
                <!-- Left Column -->
                <div class="col-lg-7 pt-5 pt-lg-10">
                    <div class="pe-lg-5">
                    <nav class="d-md-block">
                            <ul class="list-unstyled d-flex justify-content-start mt-4 align-items-center fw-bolder small">
                                <li class="me-4"><a class="nav-link-checkout "
                                        href="./cart.php">Your Cart</a></li>
                                <li class="me-4"><a class="nav-link-checkout "
                                        href="#">Information</a></li>
                                <li class="me-4"><a class="nav-link-checkout "
                                        href="#">Shipping</a></li>
                                <li><a class="nav-link-checkout nav-link-last active"
                                        href="#">Payment</a></li>
                            </ul>
                        </nav>  
                        <input type="hidden" name="uid" value="<?=$row['uid']?>">
                        <input type="hidden" name="addr" value="<?=$row['address']?>">
                        <div class="mt-5">
                            <!-- Checkout Information Summary -->
                            <ul class="list-group mb-5 d-lg-block rounded-0">
                                <!-- User Information -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Contact</span>
                                        <span class="small"><?=$row['fname']?> <?=$row['lname']?></span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Deliver To</span>
                                        <span class="small"><?=$row['address']?></span>
                                    </div>
                                   
                                </li>
                             
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="text-muted small me-2 f-w-36 fw-bolder">หลักฐานการโอนจ่าย</span>
                                    <div class="d-flex justify-content-start align-items-center">
                                    <input type="file" name="fileToUpload">
                                    </div>
                                 
                                </li>
                            </ul>
                            <h3 class="fs-5 fw-bolder mb-4 border-bottom pb-4">กรุณาโอนจ่าย</h3>
                            <div class="row">
                                <!-- Payment Option -->
                                <div class="col-12">
                                    <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                                        <img src="OIP.jpg" class="img-fluid" alt="Payment Option">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                    <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                        <!-- Cart Items -->
                        <div class="pb-3">
                             <!-- Cart Item-->
                             <?php
                             $sum = 0;
                             $sql_cart = "SELECT * FROM cart WHERE uid='".$_SESSION['id']."' AND status=0";
                             $result_cart = mysqli_query($con , $sql_cart);
                             while($rows = mysqli_fetch_assoc($result_cart)){
                                $p = number_format($rows['product_price'],2);
                                $sum +=($rows['qty']*$p);
                                ?>
                                <div class="row mx-0 py-4 g-0 border-bottom">
                                <div class="col-2 position-relative">
                                        <span class="checkout-item-qty"><?=$rows['qty']?></span>
                                    <picture class="d-block border">
                                        <img class="img-fluid" src="all_res/<?= $rows['product_image'] ?>" >
                                    </picture>
                                </div>
                                <div class="col-9 offset-1">
                                    <div>
                                        <h6 class="justify-content-between d-flex align-items-start mb-2">
                                        <?= $rows['product_name'] ?>
                                            <i class="ri-close-line ms-3"></i>
                                        </h6>
                                        <span class="d-block text-muted fw-bolder text-uppercase fs-9"> Qty: <?=$rows['qty']?></span>
                                    </div>
                                    <p class="fw-bolder text-end text-muted m-0"><?=$rows['qty']*$p?></p>
                                </div>
                            </div>    <!-- / Cart Item-->
                                <?php
                             }
                             ?>
                            
                           
                        </div>
                        

                    <!-- Subtotal and Shipping -->
<div class="py-4 border-bottom">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <p class="m-0 fw-bolder fs-6">Subtotal</p>
        <p class="m-0 fs-6 fw-bolder"><?=$sum?></p>
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <p class="m-0 fw-bolder fs-6">ค่าส่ง</p>
        <p class="m-0 fs-6 fw-bolder" id="shippingCost">25</p>
    </div>
</div>

<!-- Grand Total -->
<div class="py-4 border-bottom">
    <p id="grandTotal"><?=$sum + 25?></p>
</div>

<!-- Coupon Code -->
<div class="py-4">
    <div class="input-group mb-0">
      
  
        <button class="btn btn-dark btn-sm px-4" type="submit" >สั่งซื้อ</button>
     
    </div>
</div>



                
                    </div>
                </div>
            </div>
        </div>
    </section>
                            </form>
    <?php
    // echo $couponRow['code'];
    ?>
    <script>
    function applyCoupon() {
        // Assuming $couponRow contains the coupon details
        var couponCode = document.getElementById('coupon').value;
        if (couponCode === '<?=$couponRow['code']?>') {
            // Apply the coupon discount
            document.getElementById('shippingCost').innerText = '0';
            document.getElementById('grandTotal').innerText = '<?=$sum?>';
          
        } else {
          
        }
    }
</script>
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>
