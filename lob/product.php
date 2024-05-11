<?php
include("connect.php");
$sql = "SELECT * FROM `product_sale` WHERE id = '".$_GET['id']."'";
$re = mysqli_query($con , $sql);
$row = mysqli_fetch_assoc($re);
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
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css
" rel="stylesheet">


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

        .bg-white, .bg-white-hover:hover {
            background-color: black !important;
            }

            .navbar-light .navbar-nav .nav-link {
                color: white;
            }
    </style>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  

  <!-- Page Title -->
  <title>ซื้อขายสินค้า</title>

</head>
<body class="">


<?php
include("nav.php");
?>

   
    <!-- Main Section-->
    <section class="mt-0 ">
        <!-- Page Content Goes Here -->            
        
        <!-- Breadcrumbs-->
        <div class="bg-dark py-6">
            <div class="container-fluid">
                <nav class="m-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item breadcrumb-light"><a href="#">Home</a></li>
                      <li class="breadcrumb-item  breadcrumb-light active" aria-current="page"><?=$row['p_name']?></li>
                    </ol>
                </nav>            </div>
        </div>
        <!-- / Breadcrumbs-->

        <div class="container-fluid mt-5">

            <!-- Product Top Section-->
            <div class="row g-9" data-sticky-container>

                <!-- Product Images-->
                <div class="col-12 col-md-6 col-xl-7">
                    <div class="row g-3" data-aos="fade-right">
                        <div class="col-12">
                            <picture>
                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="all_res/<?=$row['pic']?>" alt="">
                            </picture>
                        </div>
                     
                    </div>
                </div>
                <!-- /Product Images-->
    
                <!-- Product Information-->
                <div class="col-12 col-md-6 col-lg-5">
                   
                       
                    
                            
                            <h1 class="mb-1 fs-2 fw-bold"><?=$row['p_name']?></h1>
                            <div class="d-flex justify-content-between align-items-center">
                                
                                <p class="fs-4 m-0"><?=($row['p_price'] - $row['p_sale'])?> ฿</p>
                            </div>
                            <form action="" class="form-submit addItemBtn" >
                                    <div class="row p-2">
                                      <div class="col-md-6 py-1 pl-4">
                                        <b>Quantity : </b>
                                      </div>
                                      <div class="col-md-6">
                                        <input type="number" class="form-control pqty" value="1">
                                      </div>
                                    </div>
                                    <input type="hidden" class="pqty" value="1">
                               <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                               <input type="hidden" class="pname" value="<?= $row['p_name'] ?>">
                               <input type="hidden" class="pprice" value="<?= $row['p_price']?>">
                               <input type="hidden" class="pimage" value="<?= $row['pic'] ?>">
                               <input type="hidden" class="pcode" value="<?= $row['p_id'] ?>">
                               <input type="hidden" class="ppid" value="<?= $row['p_id'] ?>">
                          <!-- Card Product-->
                                    
                           
                            <button  class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow ">Add To Shopping Bag</button>
                            </form>
                            <!-- Product Highlights-->
                                <div class="my-5">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="text-center px-2">
                                                <i class="ri-24-hours-line ri-2x"></i>
                                                <small class="d-block mt-1">ส่งเร็วภายใน 24 ชั่วโมง</small>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="text-center px-2">
                                                <i class="ri-secure-payment-line ri-2x"></i>
                                                <small class="d-block mt-1">ซื้อขายปลอดภัย</small>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="text-center px-2">
                                                <i class="ri-service-line ri-2x"></i>
                                                <small class="d-block mt-1">คืนสินค้าฟรี</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- / Product Highlights-->
                        
                            <!-- Product Accordion -->
                            <div class="accordion" id="accordionProduct">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      รายละเอียดสินค้า
                                    </button>
                                  </h2>
                                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionProduct">
                                    <div class="accordion-body">
                                        <p class="m-0"><?=$row['p_detail']?></p>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      การส่ง & การคืน
                                    </button>
                                  </h2>
                                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionProduct">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex border-0 row g-0 px-0">
                                                <span class="col-4 fw-bolder">การส่ง</span>
                                                <span class="col-7 offset-1">การส่งสินค้าเป็นไปตามเงื่อนไขที่บริษัทกำหนด <a class="text-link-border" href="#">terms & conditions.</a></span>
                                            </li>
                                            <li class="list-group-item d-flex border-0 row g-0 px-0">
                                                <span class="col-4 fw-bolder">การคืน</span>
                                                <span class="col-7 offset-1">สามารถคืนสินค้าได้ภายใน 3 วัน เงื่อนไขเป็นไปตามที่บริษัทกำหนด <a class="text-link-border" href="#">terms & conditions.</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- / Product Accordion-->
                        </div>                    </div>
                </div>
                <!-- / Product Information-->
            </div>
            <!-- / Product Top Section-->

            
          

        </div>

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

  
<?php
include("footer.php");
?>


<script type="text/javascript">
  $(document).ready(function() {

    $(".addItemBtn").click(function(e) {
      e.preventDefault();
        var $item = $(this);

        // Retrieve values from hidden input fields
        var pid = $item.find(".pid").val();
        var ppid = $item.find(".ppid").val();
        var pname = $item.find(".pname").val();
        var pprice = $item.find(".pprice").val();
        var pimage = $item.find(".pimage").val();
        var pcode = $item.find(".pcode").val();
        var pqty = $item.find(".pqty").val();

    console.log("pid:", pid);
        console.log("ppid:", ppid);
        console.log("pname:", pname);
        console.log("pprice:", pprice);
        console.log("pimage:", pimage);
        console.log("pcode:", pcode);
        console.log("pqty:", pqty);

   //alert(pid);
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          ppid: ppid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
         // alert(response);
          if(response == 1){
            Swal.fire(
                'สำเร็จแล้ว',
                'คุณได้ทำรายการสำเร็จแล้ว',
                'success'
              );
              Swal.fire({
                  icon: 'success',
                    title: 'คุณได้ทำรายการสำเร็จแล้ว',
                    confirmButtonText: 'ตกลง'
                }).then((result) => {
                  if (result.isConfirmed) {
                    location.reload();
                  }

                });
          }else{
            Swal.fire({
                icon: 'error',
                title: 'ไม่สำเร็จ',
                text: 'ทำรายการไม่สำเร็จเนื่องจากคุณได้เพิ่มของชิ้นนี้ในตระกร้าแล้ว',
                footer: '<a href="cart.php">ตรวจสอบตระกร้าสินค้า</a>'
              });
          }
          ///location.reload();
        }
      });
    });

    $(".checklogin").click(function(e) {
    e.preventDefault();

    Swal.fire({
        icon: 'error',
        title: 'ไม่สามารถทำรายการได้',
        text: 'กรุณาเข้าสู่ระบบเพื่อทำรายการต่อไป',
        footer: '<a href="login.php">เข้าสู่ระบบ</a>',
        confirmButtonText: 'ตกลง'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "login.php";
        }
    });
});


    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  
  </script>

</body>

</html>