<?php
session_start();
include("include.php");

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือไม่
if (!isset($_SESSION['email'])) {
    die("You must be logged in to view this page.");
}

$loggedInEmail = $_SESSION['email'];

// เชื่อมต่อฐานข้อมูล
$host = "localhost";
$user = "root";
$pass = "";
$db = "loremshop";
$conn = new mysqli($host, $user, $pass, $db);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Failed to connect to DB: " . $conn->connect_error);
}

// ดึงข้อมูลของผู้ใช้ที่เข้าสู่ระบบ
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $loggedInEmail);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Profile Page</title>
    <style>
        body {
            background-color: #f4f4f4;
        }

        .profile-card {
            max-width: 450px;
            margin: 80px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            background: white;
            text-align: center;
        }

        .profile-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .profile-card h3 {
            margin-bottom: 5px;
        }

        .profile-card p {
            color: #666;
            font-size: 16px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <div class="profile-card">
        <img src="profile-placeholder.png" alt="Profile Picture"> <!-- สามารถเปลี่ยนเป็น path ของรูปจริง -->
        <h3><?= htmlspecialchars($user['firstName']) . " " . htmlspecialchars($user['lastName']) ?></h3>
        <p>@<?= htmlspecialchars($user['username']) ?></p>
        <p>Email: <?= htmlspecialchars($user['email']) ?></p>

        <div class="btn-container">
            <a href="edit.php?id=<?= htmlspecialchars($user['user_id']) ?>" class="btn btn-warning">Edit Profile</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

</body>

</html>