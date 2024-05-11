<?php
include("connect.php");

$sql = "SELECT * FROM lt_user WHERE id = '".$_SESSION['id']."'";
$result = mysqli_query($con , $sql);
$row = mysqli_fetch_assoc($result);
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
<script>
    // jQuery ".Class" SELECTOR.
    $(document).ready(function() {
          // Show Input element
    $('.edit').click(function(){
     $('.txtedit').hide();
     $(this).next('.txtedit').show().focus();
     $(this).hide();
 });

// Save data
$(".txtedit").on('focusout',function(){
     
     var id = this.id;
     var split_id = id.split("-");
     var field_name = split_id[0];
     var edit_id = split_id[1];
     var value = $(this).val();

     $(this).hide();

     // Hide and Change Text of the container with input elmeent
     $(this).prev('.edit').show();
     $(this).prev('.edit').text(value);

            // Sending AJAX request
            $.ajax({
                url: 'dashboard/update_member.php',
                type: 'post',
                data: { field:field_name, value:value, id:edit_id },
                success:function(response){
                    //alert(response);
                }
            });
 
        });    
    });
   
    
  
</script>
    <?php include("nav_p.php"); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h2>User Profile</h2>
                    </div>
                    <div class="card-body">
                        <h3>Welcome, <?= $row['fname'] ?> <?=$row['lname']?></h3>
                        <p>Email: <?= $row['username'] ?></p>
                        <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>เบอร์โทร</th>
                                        <th>ที่อยู่</th>
                                    </tr>
                                </thead>
                                <tbody id="table_data">
         
                  
                                    <tr>
                                   
                                        <td>
                                            <div class="edit"><?=$row['fname']?></div>
                 <input type="text" id="fname-<?=$row['id']?>" value="<?=$row['fname']?>" class="form-control txtedit" style="display:none">
                                        </td>
                                        <td>
                                            <div class="edit"><?=$row['lname']?></div>
                 <input type="text" id="lname-<?=$row['id']?>" value="<?=$row['lname']?>" class="form-control txtedit" style="display:none">
                                        </td>
                                        <td>
                                            <div class="edit"><?=$row['phone']?></div>
                 <input type="text" id="phone-<?=$row['id']?>" value="<?=$row['phone']?>" class="form-control txtedit" style="display:none">
                                        </td>
                                        <td>
                                            <div class="edit"><?=$row['address']?></div>
                 <input type="text" id="address-<?=$row['id']?>" value="<?=$row['address']?>" class="form-control txtedit" style="display:none">
                                        </td>

                                    </tr>
                                    
                            
                               
                                    
                                    
                                </tbody>
                            </table>
                            <form id="changePasswordForm" method="post">
                              <div class="mb-3">
                                  <label for="currentPassword" class="form-label">Current Password</label>
                                  <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                              </div>
                              <div class="mb-3">
                                  <label for="newPassword" class="form-label">New Password</label>
                                  <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                              </div>
                              <div class="mb-3">
                                  <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                  <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                  <div id="confirmPasswordError" class="text-danger"></div>
                              </div>
                              <button type="button" id="changePasswordBtn" class="btn btn-primary">Change Password</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#changePasswordBtn").click(function () {
            var currentPassword = $("#currentPassword").val();
            var newPassword = $("#newPassword").val();
            var confirmPassword = $("#confirmPassword").val();

            $("#confirmPasswordError").html(""); // Reset error message

            if (newPassword !== confirmPassword) {
                $("#confirmPasswordError").html("Passwords do not match.");
                return;
            }

            $.ajax({
                type: "POST",
                url: "change_password.php",
                data: {
                    currentPassword: currentPassword,
                    newPassword: newPassword
                },
                success: function (response) {
                    if (response === "success") {
                        alert("เปลี่ยน Password เรียบร้อยแล้ว!");
                    } else if (response === "error") {
                        alert("ไม่สำเร็จกรุณาลองอีกครั้ง.");
                    } else if (response === "current_password_error") {
                        alert("Password ปัจจุบันไม่ถูกต้อง");
                    } else {
                        alert("Unexpected response from the server.");
                    }
                }
            });
        });
    });
</script>

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
