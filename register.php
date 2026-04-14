<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน</title>
    <link rel="stylesheet" href="./style1.css">
    <style>
        .login-link {
            margin-top: 10px; /* ปรับค่าตามที่ต้องการ */
            padding: 10px 20px;
         
        }

    </style>
</head>
<body>
<div class="glass-container">
    <div class="login-box">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <input type="text" id="username" name="username" placeholder="กรอกชื่อผู้ใช้" required>
            <input type="password" id="password" name="password" placeholder="กรอกรหัสผ่าน" required>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" required>
            <button type="submit">register</button>
            <button onclick="location.href='login.php'" class="login-link">Return to the login </button>
        </form>
    </div>
    
</div>
</body>
</html>




<?php
// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost"; // ชื่อเซิร์ฟเวอร์
$username = "root";  // ชื่อผู้ใช้ MySQL
$password = "";  // รหัสผ่าน MySQL (ปกติจะว่างสำหรับการใช้งานในเครื่อง)
$dbname = "project";  // ชื่อฐานข้อมูลที่คุณสร้าง

// สร้างการเชื่อมต่อกับฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // ตรวจสอบว่ารหัสผ่านและการยืนยันรหัสผ่านตรงกัน
    if ($input_password !== $confirm_password) {
        echo "รหัสผ่านไม่ตรงกัน";
        exit();
    }

    // แฮชรหัสผ่านก่อนเก็บลงฐานข้อมูล
    $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);

    // ตรวจสอบว่าชื่อผู้ใช้มีอยู่ในฐานข้อมูลหรือไม่
    $sql = "SELECT * FROM register WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "ชื่อผู้ใช้นี้ถูกใช้งานแล้ว";
    } else {
        // ถ้าไม่มีชื่อผู้ใช้ ให้เพิ่มลงในฐานข้อมูล
        $sql = "INSERT INTO register (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $input_username, $hashed_password);
        if ($stmt->execute()) {
            echo "ลงทะเบียนสำเร็จ!";
            // สามารถเปลี่ยนเส้นทางไปยังหน้าล็อกอินได้ที่นี่
            // header("Location: login.php");
            // exit();
        } else {
            echo "เกิดข้อผิดพลาดในการลงทะเบียน";
        }
    }
    $stmt->close();
}
$conn->close();
?>