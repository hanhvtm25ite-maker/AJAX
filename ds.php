
<?php
// Bước 1: Kết nối database
include("inc/connect.inc");

// Bước 2: Nhận tên lớp từ AJAX gửi lên
$lop = $_GET['lop'];

// Bước 3: Truy vấn sinh viên theo lớp
$sql = "SELECT * FROM sinhvien WHERE lop = ?";

$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $lop);
mysqli_stmt_execute($stmt);

$rs = mysqli_stmt_get_result($stmt);

// Bước 4: Tạo chuỗi HTML
$str = "<table border='1' cellpadding='5'>";

$str .= "
<tr class='hd'>
    <td>TT</td>
    <td>Mã số</td>
    <td>Họ tên</td>
    <td>Địa chỉ</td>
</tr>
";

// Bước 5: Duyệt dữ liệu sinh viên
$tt = 1;

while ($row = mysqli_fetch_assoc($rs)) {

    $str .= "<tr>";

    $str .= "<td>" . $tt . "</td>";

    $str .= "<td>" . htmlspecialchars($row['masv']) . "</td>";

    $str .= "<td>" . htmlspecialchars($row['hoten']) . "</td>";

    $str .= "<td>" . htmlspecialchars($row['diachi']) . "</td>";

    $str .= "</tr>";

    $tt++;
}

// Bước 6: Đóng bảng HTML
$str .= "</table>";

// Bước 7: Trả kết quả về client
echo $str;

mysqli_stmt_close($stmt);
?>
