<?php
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";  
$username = "root";  
$password = "";  
$dbname = "project";  

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากการส่ง POST
$data = json_decode(file_get_contents("php://input"));
$title = $conn->real_escape_string($data->title);

// ลบรายการโปรดในฐานข้อมูล
$sql = "DELETE FROM favoritesx WHERE movie_title = '$title'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "รายการโปรดถูกลบเรียบร้อยแล้ว"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
}

$conn->close();
?>
