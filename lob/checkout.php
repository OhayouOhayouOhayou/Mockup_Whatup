<?php
include("connect.php");
header('Content-Type: text/html; charset=utf-8');
  $sql = "SELECT * FROM `cart` WHERE uid= '".$_SESSION['id']."' AND status = 0";
  $result = mysqli_query($con , $sql);
  $message = "ออเดอร์ของท่านกำลังจัดเตรียม โดยมีรายการดังนี้\n";
  $message2 = "กรุณาจัดเตรียมรายการดังนี้\n";
  $i = 1;
  $s=0;
  while($row = mysqli_fetch_assoc($result)){
    $message .= $i .".".$row['product_name']."\n";
    $message2 .= $i .".".$row['product_name']."\n";
    $i++;
    $s = $row['p_id'];
  }
  $message2 = "ชื่อผู้สั่ง ".$_SESSION['fname'];
  $sent_to_store = "SELECT line_token FROM `product` WHERE p_id = '".$s."'";
  //echo $sent_to_store;
  $ret = mysqli_query($con , $sent_to_store);
  $rows = mysqli_fetch_assoc($ret);

  send_line_notify($message, $_SESSION['line_token']);
  send_line_notify($message2, $rows['line_token']);
  
  
  $squp = "UPDATE cart SET status='2' WHERE uid= '".$_SESSION['id']."'";
  if ($con->query($squp) === TRUE) {
    ?>
      <script type="text/javascript">
         window.location.href="index.php";
      </script>
     <?php
  } else {
    ?>
      <script type="text/javascript">
        alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้งครับ")
         history.back();
      </script>
     <?php
  }