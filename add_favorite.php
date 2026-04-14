<?php
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";  // ชื่อเซิร์ฟเวอร์
$username = "root";  // ชื่อผู้ใช้ MySQL
$password = "";  // รหัสผ่าน MySQL
$dbname = "project";  // ชื่อฐานข้อมูลที่คุณสร้าง

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากการส่ง POST
$data = json_decode(file_get_contents("php://input"));

$title = $conn->real_escape_string($data->title);
$image_url = $conn->real_escape_string($data->image_url); // เพิ่มรูปภาพ
$favorite = $data->favorite ? 1 : 0;

// สร้างหรืออัปเดตรายการโปรดในฐานข้อมูล
$sql = "INSERT INTO favoritesx (movie_title, image_url, is_favorite) VALUES ('$title', '$image_url', $favorite)
        ON DUPLICATE KEY UPDATE is_favorite = $favorite, image_url = '$image_url'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Favorite status updated successfully."]);
} else {
    echo json_encode(["message" => "Error: " . $conn->error]);
}

$conn->close();
?>
