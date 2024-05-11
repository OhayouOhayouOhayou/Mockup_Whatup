<?php
include("connect.php");

?>

<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
  <title>ระบบสั่งซื้อเครื่องสำอางค์</title>

</head>

<body>

    <?php include("nav_p.php"); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h2>My Order</h2>
                    </div>
                    <div class="card-body">
                        <h3>Welcome, <?= $row['fname'] ?> <?=$row['lname']?></h3>
                        <p>Email: <?= $row['username'] ?></p>
                        <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>ID ORDER</th>
                                        <th>ชื่อผู้สั่ง</th>
                                        <th>วันที่สั่ง</th>
                                        <th>ที่อยู่ในการจัดส่ง</th>
                                        <th>จำนวนของที่สั่ง</th>
                                        <th>ราคา</th>
                                        <th>ค่าส่ง</th>
                                        <th>ราคารวม</th>
                                        <th>สถานะ</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table_data">
                                <?php
                                $sql = "SELECT * FROM `order_detail` WHERE u_id ='".$_SESSION['id']."'";
                                //echo $sql;
                                $result = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_assoc($result)) {
                                  if($row['c_id'] != 0){
                                      $cuo = 0;
                                  }else{
                                    $cuo = 25;
                                  }
                                    ?>
                                    <tr>
                                    <td>OR<?=$row["d_id"];?></td>
                                        <td><?=$row["topic"];?></td>
                                        <td><?=$row["date_order"];?></td>
                                        <td><?=$row["detail_order"];?></td>
                                        <td><?=$row["d_qty"];?></td>
                                        <td><?=$row["d_subtotal"];?></td>
                                        <td><?=$cuo;?></td>
                                        <td><?=$row["d_subtotal"]+$cuo;?></td>
                                        <td>
                                          <?php
                                          if($row['status'] == 0){
                                            ?>
<span class="badge badge-warning">มีการสั่งซื้อ</span>
                                            <?php
                                          }elseif($row['status'] == 1){
                                            ?>
<span class="badge badge-success">ยืนยันการสั่งซื้อ</span>
                                            <?php
                                          }else{
                                            ?>
<span class="badge badge-danger">ยกเลิกการสั่งซื้อ</span>
                                            <?php
                                          }
                                          ?>
                                      
                                      </td>
                                      <td>
                                      <a href="dashboard/action.php?dens=<?=$row['o_id']?>" class="text-danger lead" onclick="return confirm('คุณต้องการยกเลิกรายการการสั่งซื้อนี้ใช่หรือไม่ ?');"><i data-feather="slash">ยกเลิก</i></a>   
                                  
                                      </td>
                                    
                                      </tr>  
                               
                                    <?php
                                }
                                ?>
                               
                                    
                                    
                                </tbody>
                            </table>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>

    <script type="text/javascript">
  $(document).ready(function() {

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
