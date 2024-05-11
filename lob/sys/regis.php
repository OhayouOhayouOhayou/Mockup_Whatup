<script>
function isValidUTF8(str) {
  try {
    
      const decoder = new TextDecoder('utf-8');
      const encoded = new TextEncoder().encode(str);
      const decoded = decoder.decode(encoded);
      return decoded === str;
  } catch (e) {
      return false;
  }
}
</script>

<?php
include("../connect.php");
header('Content-Type: text/html; charset=utf-8');
$select_mail = "SELECT COUNT(id) AS cid FROM `lt_user` WHERE username = '".$_POST['mail']."'";
$re = mysqli_query($con , $select_mail);
$row_user = mysqli_fetch_assoc($re);
if($row_user['cid'] >0 ){
  ?>
      <script type="text/javascript">
        alert("มีบัญชีนี้ในระบบแล้ว กรุณาติดต่อ Admin");
        history.back(-1);
      </script>
      <?php
}else{
  $sql ="INSERT INTO `lt_user` ( `username`, `password`, `fname`, `lname`, `status`, `vip`, `sale` , address, phone ) 
  VALUES
   ( '".$_POST['mail']."', '".$_POST['pass']."', '".$_POST['fname']."', '".$_POST['lname']."', '1', '0' ,'0' , '".$_POST['addr']."', '".$_POST['tel']."');";
  
  if ($con->query($sql) === TRUE) {
   
    ?>
    <script type="text/javascript">
      alert("บันทึกสำเร็จ ขอบคุณค่ะ");
      window.location.href = '../index.php'; 
    </script>
    <?php
  } else {
      ?>
      <script type="text/javascript">
        alert("บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลค่ะ");
        history.back(-1);
      </script>
      <?php
  }
}



?>