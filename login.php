<?php
include_once "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    

    $stmt = $con->prepare("SELECT * FROM register WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        session_start();
        $_SESSION['username'] = $username;
        
        header("Location: p1.php");
        exit();
    } else {
        echo "<script>alert('ไม่พบชื่อผู้ใช้'); window.location.href='register.php';</script>";
    }
}

$con = null;
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style1.css">
</head>

<body>
<div class="glass-container">
    <div class="login-box">
        <h2>Login</h2>
        <form action="#" method="POST">
            <input type="text" id="username" name="username" required placeholder="Username">
            <input type="password" id="password" name="password" required placeholder="Password">
            
            <div class="options">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            
            <button type="submit">Login</button>
        </form>
        <form action="register.php" method="GET">
            <button type="submit" class="register-btn">Register</button>
        </form>
    </div>
</div>
</body>
</html>
