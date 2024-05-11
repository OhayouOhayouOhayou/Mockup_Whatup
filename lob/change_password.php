<?php
include("connect.php");
include("check_session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = mysqli_real_escape_string($con, $_POST["currentPassword"]);
    $newPassword = mysqli_real_escape_string($con, $_POST["newPassword"]);

    $userId = $_SESSION['id'];
    $query = "SELECT password FROM lt_user WHERE id = '$userId'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

  

            $updateQuery = "UPDATE lt_user SET password = '$newPassword' WHERE id = '$userId'";
            $updateResult = mysqli_query($con, $updateQuery);

            if ($updateResult) {
                echo "success";
            } else {
                echo "error";
            }
     
    } else {
        // Handle database query error
        echo "error";
    }
} else {
    header("Location: profile.php");
    exit();
}
?>
