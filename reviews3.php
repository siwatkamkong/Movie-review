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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     

        
        <style>
           /* Background and Container */
body {
    background-image: url('img/rew.jpg');
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

.glass-container {
    border-radius: 15px;
    backdrop-filter: blur(10px);
    padding: 2rem;
    max-width: 500px;
    width: 100%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    color: #333; /* สีข้อความ */
    margin-bottom: 2rem;
    border: 2px solid rgba(255, 255, 255, 0.5);
    background: rgba(255, 255, 255, 0.8);
}

.login-box h1 {
    text-align: center;
    font-size: 2rem;
    color: #000; 
    margin-bottom: 1.5rem;
}

/* Form Styling */
form label {
    color: #000;
    font-weight: 500;
    margin-bottom: 0.5rem;
    display: inline-block;
}

form input[type="text"],
form textarea,
form select {
    width: 100%;
    padding: 0.5rem;
    border-radius: 5px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.2);
    color: #000; /* เปลี่ยนจาก #fff เป็น #000 */
    margin-bottom: 1rem;
}

form input[type="submit"] {
    width: 100%;
    padding: 0.75rem;
    font-size: 1rem;
    border-radius: 5px;
    background: #87CEFA;
    border: none;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease;
}

form input[type="submit"]:hover {
    background: #000000;
}



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


        <div class="glass-container">
            <div class="login-box">
                <h1>รีวิวหนัง</h1>
                <form action="submit_review.php" method="post">
                    <label for="title">ชื่อหนัง:</label>
                    <input type="text" id="title" name="title" required placeholder="ชื่อหนัง">
                    
                    <label for="review">รีวิว:</label>
                    <textarea id="review" name="review" required placeholder="เขียนรีวิว..."></textarea>
                    
                    <label for="rating">คะแนน:</label>
                    <select id="rating" name="rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    
                    <input type="submit" value="ส่งรีวิว">
                    <?php
                    // การเชื่อมต่อฐานข้อมูล
                    $conn = new mysqli("localhost", "root", "", "project");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    // ตรวจสอบว่ามีการกดปุ่ม submit
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $title = $_POST['title'];
                        $review = $_POST['review'];
                        $rating = $_POST['rating'];

                        // บันทึกข้อมูลลงในฐานข้อมูล
                        if ($stmt = $conn->prepare("INSERT INTO reviews (title, review, rating) VALUES (?, ?, ?)")) {
                            $stmt->bind_param("ssi", $title, $review, $rating);
                            $stmt->execute();
                            $stmt->close();
                        } else {
                            echo "Error in statement preparation: " . $conn->error;
                        }
                    }
                    $conn->close();
                    ?>
                </form>
            </div
