<?php
include("connect.php");

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  //echo "TEST";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
//echo "TEST";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    if ($_POST['p'] == "on") {
      $p = 1;
    } else {
      $p = 0;
    }
    $sql ="INSERT INTO `lt_user` ( `username`, `password`, `fname`, `lname`, `status`, `vip`, `address`, `sale` , namestore , imgstore) 
    VALUES
     ( '".$_POST['mail']."', '".$_POST['pass']."', '".$_POST['fname']."', '".$_POST['lname']."', '1', '".$p."', '".$_POST['addr']."' ,'1' ,'".$_POST['store']."' , '".$target_file."');";
    
    if ($con->query($sql) === TRUE) {
      ?>
      <script type="text/javascript">
        alert("บันทึกสำเร็จ ขอบคุณค่ะ");
        window.location.href = 'login.php'; 
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