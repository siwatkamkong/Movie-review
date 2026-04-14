<?php
session_start(); // เริ่มต้นเซสชัน

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // ถ้าไม่ได้ล็อกอิน จะส่งไปที่หน้า login
    exit();
}

$username = $_SESSION['username']; // ดึงชื่อผู้ใช้ที่ล็อกอินเข้ามา
?>
<!DOCTYPE html>
<html>
<head>
    <title>Project</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Fixed typo here -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="review1.css">
    

    <style>
        body {
            background-image: url('img/หน้าlogin.jpg');
        }

        h2 {
    margin-top: 20px; /* เพิ่มระยะห่างด้านบน */
    margin-bottom: 10px; /* เพิ่มระยะห่างด้านล่าง */
}
    </style>
  
</head>
<body>

<!-- Navbar แถบเมนู -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="p1.php" class="w3-bar-item w3-button"><b>Movie Review</b> </a>
    <div class="w3-right w3-hide-small">
      <a href="p1.php" class="w3-bar-item w3-button">หน้าหลัก</a>
      <a href="p2thai.php" class="w3-bar-item w3-button">หนัง/ซีรีส์ไทย</a>
      <a href="p3korea.php" class="w3-bar-item w3-button">หนัง/ซีรีส์เกาหลี</a>
      <a href="p4jeen.php" class="w3-bar-item w3-button">หนัง/ซีรีส์จีน</a>
      <a href="reviews3.php" class="w3-bar-item w3-button">post</a>
      <a href="submit_review.php" class="w3-bar-item w3-button">reviews</a>
      <a href="favorited.php" class="w3-bar-item w3-button">favourite (<?php echo $username; ?>)</a>
      <a href="login.php" class="w3-bar-item w3-button">logout</a>
    </div>
  </div>
  
</div>
<script src="js/bootstrap.min.js"></script>
<?php
$servername = "localhost";
$dbusername = "root"; // เปลี่ยนเป็นชื่อผู้ใช้ของคุณ
$dbpassword = ""; // เปลี่ยนเป็นรหัสผ่านของคุณ
$dbname = "project"; // เปลี่ยนเป็นชื่อฐานข้อมูลของคุณ

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// รับค่าจากฟอร์ม
$title = isset($_POST['title']) ? $_POST['title'] : '';
$review = isset($_POST['review']) ? $_POST['review'] : '';
$rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        // กำหนดโฟลเดอร์ปลายทาง
        $uploadFileDir = 'uploads/';
        $dest_path = $uploadFileDir . basename($fileName);

        // สร้างโฟลเดอร์ถ้ายังไม่มี
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0777, true);
        }

        // ตรวจสอบและย้ายไฟล์ไปยังปลายทาง
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            echo "การอัปโหลดสำเร็จ<br>";
        } else {
            echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์<br>";
        }
    }

    // ตรวจสอบว่าค่าทั้งหมดถูกต้อง
    if (empty($title) || empty($review) || $rating < 1 || $rating > 5) {
        die("ข้อมูลไม่ถูกต้อง: กรุณากรอกชื่อหนัง รีวิว และคะแนนที่ถูกต้อง");
    }

    // สร้าง SQL เพื่อบันทึกรีวิว
    $sql = "INSERT INTO reviews (title, review, rating) VALUES ('$title', '$review', $rating)";

    if ($conn->query($sql) === TRUE) {
        echo "รีวิวถูกบันทึกเรียบร้อย";
    } else {
        echo "เกิดข้อผิดพลาด: " . $sql . "<br>" . $conn->error;
    }
}

// แสดงผลรีวิวที่มีอยู่
$result = $conn->query("SELECT * FROM reviews ORDER BY id DESC");
if ($result->num_rows > 0) {
    echo "<h2><br>รีวิวที่เพิ่มล่าสุด :</h2>";
    echo "<div class='reviews-container'>"; // เพิ่ม div container
    while ($row = $result->fetch_assoc()) {
        echo "<div class='review-item'>"; // เปลี่ยน class เป็น review-item
        echo "<h3 class='review-title'>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<p class='review-content'>" . htmlspecialchars($row['review']) . "</p>";
        echo "<p class='review-rating'>คะแนน: " . htmlspecialchars($row['rating']) . "/5</p>";
        echo "<p>วันที่รีวิว: " . htmlspecialchars($row['created_at']) . "</p>";
        echo "</div>"; // ปิด review-item
    }
    echo "</div>"; // ปิด reviews-container
} else {
    echo "<p>ยังไม่มีรีวิว</p>";
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
