<?php
// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost";  // ชื่อเซิร์ฟเวอร์
$username = "root";  // ชื่อผู้ใช้ MySQL
$password = "";  // รหัสผ่าน MySQL (ปกติจะว่างสำหรับการใช้งานในเครื่อง)
$dbname = "project";  // ชื่อฐานข้อมูลที่คุณสร้าง

try {
    $con = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connecting failed: " . $e->getMessage());
}
?>