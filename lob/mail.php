<?php
$to = $_POST['mail'];
$subject = "แจ้งเปลี่ยน รหัสผ่าน";
$message = "ตามที่คุณได้แจ้งเปลี่ยนรัหสผ่านเข้ามานั้น กรุณากด Link ที่ได้ส่งให้ต่อไปนี้";
$headers = "From: sender@example.com";

// ส่งอีเมล
$mailSent = mail($to, $subject, $message, $headers);

// ตรวจสอบว่าส่งอีเมลสำเร็จหรือไม่
if ($mailSent) {
    ?>
    <script>
        alert("ส่งเมลสำเร็จ");
        history.back();
    </script>
    <?php
} else {
    ?>
    <script>
        alert("ส่งเมลไม่สำเร็จ กรุณาลองใหม่อีกครั้งครับ");
        history.back();
    </script>
    <?php
}
?>