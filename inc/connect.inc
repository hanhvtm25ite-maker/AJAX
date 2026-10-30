
<?php
$server = $_SERVER['SERVER_NAME'];
$user = "root";
$pass = "";
$db = "udn";

// Kết nối database
$con = mysqli_connect($server, $user, $pass, $db);

// Kiểm tra kết nối
if (!$con) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Thiết lập bảng mã UTF-8
mysqli_set_charset($con, "utf8mb4");
?>
