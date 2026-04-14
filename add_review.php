<?php
// add_review.php

// ข้อมูลสำหรับเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูล
$password = ""; // รหัสผ่านฐานข้อมูล
$dbname = "project"; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

// รับค่าจากฟอร์ม
$movie_title = $_POST['movie_title'];
$review = $_POST['review'];
$rating = $_POST['rating'];



    // บันทึกข้อมูลลงฐานข้อมูล
    $sql = "INSERT INTO reviews (movie_title, review, rating, image) VALUES ('$movie_title', '$review', '$rating', '$imageData')";

    if ($conn->query($sql) === TRUE) {
        echo "เพิ่มรีวิวสำเร็จ";
        header("Location: reviews.php"); // เปลี่ยนเส้นทางกลับไปยังหน้ารีวิวทั้งหมด
        exit();
    } else {
        echo "เกิดข้อผิดพลาด: " . $conn->error;
    }


// ปิดการเชื่อมต่อ
$conn->close();
// บันทึกภาพลงในโฟลเดอร์
$target_file = $target_dir . basename($_FILES["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

// เก็บเส้นทางลงฐานข้อมูล
$sql = "INSERT INTO reviews (movie_title, review, rating)
        VALUES ('$movie_title', '$review', '$rating')";
?>