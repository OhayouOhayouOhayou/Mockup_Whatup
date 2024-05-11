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
  <meta name="description" content="ระบบตัด Stock ">
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

        .bg-white, .bg-white-hover:hover {
            background-color: black !important;
            }

            .navbar-light .navbar-nav .nav-link {
                color: white;
            }
    </style>
  <!-- Page Title -->
  <title>ร้านมีด : Knife </title>

</head>
<body class="">


<?php
include("nav.php");
?>

<div style="margin:30px"></div>
    <!-- Main Section-->
    <section class="mt-0 overflow-hidden ">
        <!-- Page Content Goes Here -->
      <?php
        include("slide.php");
      ?>
      
      
     <div style="margin-top:30px"></div>
     

      

           <!-- Homepage Banners-->
           <div class="containner">
            <div class="pt-7 mb-5 mb-lg-10">
                <div class="row g-4">

                <?php
                $sql = "SELECT * FROM `product` WHERE status = 1  ORDER BY RAND() ";
                $res = mysqli_query($con , $sql);
                while($row = mysqli_fetch_assoc($res)){
                  $sql_in = "SELECT * FROM `product_sale` WHERE p_id = '".$row['p_id']."' ORDER BY RAND()";
                  $ress = mysqli_query($con , $sql_in);
                  $row2 = mysqli_fetch_assoc($ress);
                    ?>
                     <div class="col-12 col-md-4 d-flex">
                                <div class="card position-relative overflow-hidden">
                                    <picture class="position-relative z-index-10 d-block bg-light">
                                        <img class="w-100 rounded" src="./all_res/<?=$row2['pic']?>" alt="">
                                    </picture>
                                    <div class="card-overlay">
                                        <p class="lead fw-bolder mb-2"><?=$row['p_name']?></p>
                                        <a href="category.php?id=<?=$row['p_id']?>" class="btn btn-psuedo text-white py-2" role="button">สั่งเลย</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                }
                  ?>
                  
                </div>
            </div>
            </div>
           
            <!-- / Homepage Banners-->

            <?php
                include("imgtopfooter.php");
                ?>
            
          

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
          }else if(response == 2){
            Swal.fire(
                'สำเร็จแล้ว',
                'คุณได้เปลี่ยนร้านและทำรายการสำเร็จแล้ว ',
                '"warning"'
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
                footer: '<a href="login.php">เข้าสู่ระบบ</a>'
              });
          }
         
    );


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