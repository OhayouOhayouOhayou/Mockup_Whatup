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
  <meta name="description" content="ระบบสั่งซื้อมีด">
  <meta name="keywords" content="ระบบสั่งซื้อมีด">


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
  <!-- Favicon -->
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

        .bg-white, .bg-white-hover:hover {
            background-color: black !important;
            }

            .navbar-light .navbar-nav .nav-link {
                color: white;
            }
    </style>
  <!-- Page Title -->
  <title>ระบบสั่งซื้อมีด</title>

</head>
<?php
if (!isset($_SESSION['id']) ) {
?>

  <body class="">


  <?php
  include("nav.php");
  ?>
  
  
      <section class="mt-0 ">
          
          
  
          <div class="container-fluid" data-aos="fade-in">
              <!-- Category Toolbar-->
                  <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row">
                      <div>
                          <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            
                              </ol>
                          </nav>        
                          
                          <h1 class="fw-bold fs-3 mb-2">
                          <?php
                         
                              ?>    
                          </h1>
                      </div>
                      <div class="d-flex justify-content-end align-items-center mt-4 mt-lg-0 flex-column flex-md-row">
                  
                        
                  
                          <!-- Sort Options-->
                              <select class="form-select form-select-sm border-0 bg-light p-3 pe-5 lh-1 fs-7">
                                  <option selected>Sort By</option>
                                  <option value="1">Hi Low</option>
                                  <option value="2">Low Hi</option>
                                  <option value="3">Name</option>
                              </select>
                          <!-- / Sort Options-->
                      </div>
                  </div>            <!-- /Category Toolbar-->
  
              <!-- Products-->
              
              <div class="row g-4">
                  <?php
              
                          if(isset($_GET['id'])){
                              $q = "p_id = ".$_GET['id'];
                          }else{
                              $q = "1";
                          }
                          
                      
                  $sql = "SELECT * FROM `product_sale` WHERE ".$q."";
                  
                  $result = mysqli_query($con ,$sql);
                  while($row = mysqli_fetch_assoc($result)){
  
                    
                      
                          ?>
          
              <div class="col-12 col-sm-6 col-lg-4 checklogin" >
             
             
  
                          <!-- Card Product-->
                          <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                              <div class="card-img position-relative">
                                  <div class="card-badges">
                                  <p class='mt-2 mb-0 small'><?=$row['p_price']?> ฿</p>
                                  </div>
                                  <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                  <picture class="position-relative overflow-hidden d-block bg-light" >
                                      <img class="w-100 img-fluid position-relative z-index-10" title="" src="all_res/<?=$row['pic']?>" alt="">
                                  </picture>
                              
                              </div>
                              <div class="card-body px-0">
                                  <a class="text-decoration-none link-cover"><?=$row['p_name']?></a>
                              
                              </div>
                          </div>
                          <!--/ Card Product-->
                          </div>
                    
                          <?php
                               }
                          ?>
                   
                      
              </div>
              <!-- / Products-->
  
             
          </div>
          
          <!-- /Page Content -->
      </section>
      <!-- / Main Section-->
  
    
  <?php
//  include("footer.php");
  
}else{
  ?>

  <body class="">
  
  
  <?php
  include("nav.php");
  ?>
  
  
      <section class="mt-0 ">
          
          
  
          <div class="container-fluid" data-aos="fade-in">
              <!-- Category Toolbar-->
                  <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row">
                      <div>
                          <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            
                              </ol>
                          </nav>        
                          
                          <h1 class="fw-bold fs-3 mb-2">
                          <?php
                         
                              ?>    
                          </h1>
                      </div>
                      <div class="d-flex justify-content-end align-items-center mt-4 mt-lg-0 flex-column flex-md-row">
                  
                        
                  
                          <!-- Sort Options-->
                              <select class="form-select form-select-sm border-0 bg-light p-3 pe-5 lh-1 fs-7">
                                  <option selected>Sort By</option>
                                  <option value="1">Hi Low</option>
                                  <option value="2">Low Hi</option>
                                  <option value="3">Name</option>
                              </select>
                          <!-- / Sort Options-->
                      </div>
                  </div>            <!-- /Category Toolbar-->
  
              <!-- Products-->
              
              <div class="row g-4">
                  <?php
              
                          if(isset($_GET['id'])){
                              $q = "p_id = ".$_GET['id'];
                          }else{
                              $q = "1";
                          }
                          
                      
                  $sql = "SELECT * FROM `product_sale` WHERE ".$q."";
                  
                  $result = mysqli_query($con ,$sql);
                  while($row = mysqli_fetch_assoc($result)){
  
                    
                      
                          ?>
          
              <div class="col-12 col-sm-6 col-lg-4 " >
             
                                 
                                <input type="hidden" class="pqty" value="1">
                               <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                               <input type="hidden" class="pname" value="<?= $row['p_name'] ?>">
                               <input type="hidden" class="pprice" value="<?= $row['p_price']?>">
                               <input type="hidden" class="pimage" value="<?= $row['pic'] ?>">
                               <input type="hidden" class="pcode" value="<?= $row['p_id'] ?>">
                               <input type="hidden" class="ppid" value="<?= $row['p_id'] ?>">
                          <!-- Card Product-->
                          <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                              <div class="card-img position-relative">
                                  <div class="card-badges">
                                  <p class='mt-2 mb-0 small'><?=$row['p_price']?> ฿</p>
                                  </div>
                                  <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                  <picture class="position-relative overflow-hidden d-block bg-light" >
                                      <img class="w-100 img-fluid position-relative z-index-10" title="" src="all_res/<?=$row['pic']?>" alt="">
                                  </picture>
                              
                              </div>
                              <div class="card-body px-0">
                                  <a class="text-decoration-none link-cover" href="product.php?id=<?=$row['id']?>"></a>
                              
                              </div>
                          </div>
                          <!--/ Card Product-->
                          </div>
                    
                          <?php
                               }
                          ?>
                   
                      
              </div>
              <!-- / Products-->
  
             
          </div>
          
          <!-- /Page Content -->
      </section>
      <!-- / Main Section-->
      <?php
    }

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
  // alert(pimage);
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



    // Load total no.of items added in the cart and display in the navbar
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
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>