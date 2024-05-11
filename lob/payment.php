<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "order/";
    $original_filename = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $original_filename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($uploadOk == 0) {
        showError("Sorry, your file was not uploaded.");
    } else {
        while (file_exists($target_file)) {
            $timestamp = time();
            $new_filename = pathinfo($original_filename, PATHINFO_FILENAME) . "_$timestamp." . pathinfo($original_filename, PATHINFO_EXTENSION);
            $target_file = $target_dir . $new_filename;
        }

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sql = "SELECT * FROM `cart` WHERE status = 0 AND uid = '" . $_SESSION['id'] . "'";
            $result = mysqli_query($con, $sql);

            $doc = 0;
            $sel_order = "SELECT MAX(o_id) AS maxod FROM order_detail";
            $re_max = mysqli_query($con, $sel_order);
            $rowmax = mysqli_fetch_assoc($re_max);
            $doc = $rowmax['maxod'] + 1;

            while ($row = mysqli_fetch_assoc($result)) {
                $ins = "INSERT INTO `order_detail` (`o_id`, `u_id`, `d_qty`, `d_subtotal`, `detail_order`, `slip`, `p_id`, `c_id`) 
                        VALUES ('".$doc."', '".$_SESSION['id']."', '".$row['qty']."'
                        , '".$row['total_price']."',
                         '".$_POST['addr']."',
                          '".$target_file."',
                           '".$row['p_id']."', '".$_POST['coupon']."')";
                $resultss = mysqli_query($con, $ins);

                if (!$resultss) {
                    showError("Error inserting data into order_detail table.");
                }
            }

            $up = "UPDATE `cart` SET status = 2 WHERE uid = '".$_SESSION['id']."'";
            $results = mysqli_query($con, $up);

            if (!$results) {
                showError("Error updating cart status.");
            }else{
                ?>
                <script>
                alert("ทำรายการสำเร็จแล้ว ขอบคุณครับ.");
                window.location.href = "index.php";
            </script>
                <?php
            }
?>
            
<?php
        } else {
            showError("Sorry, there was an error uploading your file.");
        }
    }
}

function showError($message) {
?>
    <script>
        alert("<?php echo $message; ?>");
        history.back();
    </script>
<?php
    exit; 
}
?>
