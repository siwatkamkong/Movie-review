<?php
// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost";  // ชื่อเซิร์ฟเวอร์
$username = "root";  // ชื่อผู้ใช้ MySQL
$password = "";  // รหัสผ่าน MySQL (ปกติจะว่างสำหรับการใช้งานในเครื่อง)
$dbname = "project";  // ชื่อฐานข้อมูลที่คุณสร้าง

try {
    // สร้างการเชื่อมต่อ
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ดึงข้อมูลจากตาราง favorites
    $stmt = $conn->prepare("SELECT id, title FROM favorites");
    $stmt->execute();

    $favorites = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// ปิดการเชื่อมต่อ
$conn = null;
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Favorites List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($favorites as $favorite): ?>
                <tr>
                    <td><?php echo htmlspecialchars($favorite['id']); ?></td>
                    <td><?php echo htmlspecialchars($favorite['title']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
