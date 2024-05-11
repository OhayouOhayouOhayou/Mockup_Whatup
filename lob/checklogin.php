<?php
include("connect.php");
header('Content-Type: text/html; charset=utf-8');
if(isset($_POST['uname'])){
   $sql = "SELECT count(ID) AS cid , id , fname , line_token , vip   FROM `lt_user` 
   WHERE username LIKE '".$_POST['uname']."' AND password LIKE '".$_POST['pass']."' AND status = 1";
   //echo $sql;
   $result = mysqli_query($con , $sql);
   $row = mysqli_fetch_assoc($result);
   if($row['cid'] > 0){
    $_SESSION['id'] = $row['id'];
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['line_token'] = $row['line_token'];
    $_SESSION['vip'] = $row['vip'];
         if($_SESSION['vip'] == 1){
            ?>
            <script type="text/javascript">
               window.location.href="dashboard";
            </script>
         <?php
         }else{
            ?>
            <script type="text/javascript">
               window.location.href="index.php";
            </script>
      <?php     
         }
    
   }else{
      ?>
      <script type="text/javascript">
         alert("ไม่สำเร็จกรุณาลองอีกครั้งค่ะ")
         history.back();
      </script>
<?php    
   } 
}else{
   ?>
   <script type="text/javascript">
      alert("คุณไม่มีสิทธิ์เข้าสู่ระบบ")
      history.back();
   </script>
<?php     
}
  
