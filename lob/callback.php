<?php
include("connect.php");
define('CLIENT_ID', 'BXjcqk68wk5qF1RNDk0Shx');
define('CLIENT_SECRET', '5lzJDhJtkzNCXIPGPoeIQjZn7NfEMJUmEAwJkZSe44h');
define('LINE_API_URI', 'https://notify-bot.line.me/oauth/token');
define('CALLBACK_URI', 'https://www.sk-thonburi.ac.th/sktorder/callback.php');

parse_str($_SERVER['QUERY_STRING'], $queries);

$fields = [
    'grant_type' => 'authorization_code',
    'code' => $queries['code'],
    'redirect_uri' => CALLBACK_URI,
    'client_id' => CLIENT_ID,
    'client_secret' => CLIENT_SECRET
];

try {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, LINE_API_URI);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $res = curl_exec($ch);
    curl_close($ch);

    if ($res == false)
        throw new Exception(curl_error($ch), curl_errno($ch));

    $json = json_decode($res);

    var_dump($json);
} catch(Exception $e) {
    var_dump($e);
}
$sel = "SELECT id FROM lt_user ORDER BY id DESC";
$result_sel = mysqli_query($con , $sel);
$rows = mysqli_fetch_assoc($result_sel);

$query = "UPDATE `lt_user` SET  `line_token` = '".$json->access_token."' WHERE `id`='".$rows['id']."'";
if ($con->query($query) === TRUE) {
   
    ?>
 
<script>
    alert("ระบบบันทึกสำเร็จ ขอบคุณค่ะ");
 window.location.href = "login.php"; 
</script>
<?php
  } else {
    ?>
  <script type="text/javascript">
  
    history.go(-1);
  </script>
  <?php
  
  }
  ?>