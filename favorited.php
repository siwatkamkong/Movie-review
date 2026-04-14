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
    <html lang="th">
    <head>
    <title>Project</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" herf="css/bootsrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./review.css">

        
        <style>
           /* Background and Container */


        </style>
    </head>
    <body>
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
    <style>
      
        h2 {
            text-align: center;
        }

        .favorite-list {
            display: flex;
            flex-wrap: wrap; /* ให้รายการเรียงเป็นหลายแถว */
            justify-content: center; /* จัดกลาง */
            list-style: none; /* ไม่มีสัญลักษณ์ */
            padding: 0;
        }

        .favorite-item {
            background: #fff; /* สีพื้นหลังของแต่ละรายการ */
            border: 1px solid #ddd; /* ขอบของรายการ */
            border-radius: 8px; /* มุมโค้ง */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* เงา */
            margin: 10px; /* ระยะห่างระหว่างรายการ */
            padding: 10px;
            text-align: center;
            transition: transform 0.2s; /* เอฟเฟกต์การเคลื่อนไหว */
            width: 200px; /* กำหนดความกว้าง */
        }

        .favorite-item:hover {
            transform: scale(1.05); /* ขยายเมื่อเอาเมาส์ไปวาง */
        }

        .favorite-item img {
            width: 150px; /* ขนาดของรูปภาพ */
            height: auto; /* ให้สูงอัตโนมัติ */
            border-radius: 4px; /* มุมโค้งของรูปภาพ */
        }

        .delete-button {
            background-color: #D3D3D3; /* สีปุ่มลบ */
            color: black; /* สีตัวอักษร */
            border: none;
            border-radius: 50px; /* ทำให้ปุ่มเป็นวงรี */
            padding: 8px 15px; /* ปรับขนาดของปุ่ม */
            cursor: pointer; /* เปลี่ยนเคอร์เซอร์ */
            transition: background-color 0.3s; /* เอฟเฟกต์การเปลี่ยนสี */
            margin-top: 10px; /* ระยะห่างด้านบน */
         
        }

        .delete-button:hover {
            background-color: #c0392b; /* สีเมื่อวางเมาส์ */
        }
    </style>
</head>
<body>


<main id="main" style="margin-top: 70px;"> <!-- Added margin-top for spacing -->
    <?php
    $servername = "localhost"; 
    $username_db = "root";  
    $password = "";  
    $dbname = "project";  

    $conn = new mysqli($servername, $username_db, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // ดึงข้อมูลรายการโปรด
    $sql = "SELECT movie_title, image_url FROM favoritesx WHERE is_favorite = 1";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    // แสดงผลลัพธ์
    if ($result->num_rows > 0) {
        echo "<h2>รายการโปรดของคุณ</h2><ul class='favorite-list'>";
        while($row = $result->fetch_assoc()) {
            echo "<li class='favorite-item'>
                    <div>" . $row["movie_title"] . "</div>
                    <img src='" . $row["image_url"] . "' alt='" . $row["movie_title"] . "'>
                    <button class='delete-button' onclick=\"deleteFavorite('" . $row["movie_title"] . "')\">ลบ</button>
                  </li>";
        }
        echo "</ul>";
    } else {
        echo "ไม่มีหนังที่คุณได้กดหัวใจไว้";
    }

    $conn->close();
    ?>
</main>

<script>
    function deleteFavorite(movieTitle) {
        if (confirm("คุณแน่ใจหรือไม่ว่าต้องการลบรายการโปรดนี้?")) {
            fetch('delete_favorite.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ title: movieTitle }),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
                if (data.success) {
                    location.reload(); // รีเฟรชหน้าเพื่อแสดงรายการที่อัปเดต
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
</script>
</body>
</html>
