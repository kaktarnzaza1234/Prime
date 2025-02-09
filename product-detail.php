<?php
session_start(); // Start the session
include("include.php"); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบค่า ID ที่รับมา
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("<h2>❌ ไม่พบสินค้า</h2>");
}
$id = intval($_GET['id']);

// ดึงข้อมูลสินค้าจากฐานข้อมูล
$sql = "SELECT Name, Price, FilesName FROM files WHERE FilesID = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("เกิดข้อผิดพลาดใน SQL: " . $conn->error);
}
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
if (!$product) {
    die("<h2>❌ ไม่พบสินค้า</h2>");
}

// Don't close the connection here, keep it open for the query below
$stmt->close();

// Query to fetch user details if logged in
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT firstName, lastName FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($query);
}

// At the very end of the script, close the connection
$conn->close();
?>

<?php
include("include.php");
include("header.php");
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['Name']) ?></title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="assets/logo/Prime2.png" rel="icon">
    <style>
        .container {
            width: 90%;
            margin: auto;
            text-align: left;
        }
    </style>
</head>

<body>
    <?php
    renderHeader($conn)
    ?>


    <div class="container mt-5" style="width: 90%;margin: auto;text-align: left;">
        <div class="row">
            <!-- รูปภาพสินค้า -->
            <div class="col-md-6">
                <div class="gallery">
                    <img src="myfile/<?= htmlspecialchars($product['FilesName']) ?>" alt="<?= htmlspecialchars($product['Name']) ?>" class="img-fluid main-image">
                    <div class="thumb-gallery mt-2 d-flex">
                        <img src="myfile/<?= htmlspecialchars($product['FilesName']) ?>" class="img-thumbnail mx-1" width="80">
                        <img src="myfile/<?= htmlspecialchars($product['FilesName']) ?>" class="img-thumbnail mx-1" width="80">
                        <img src="myfile/<?= htmlspecialchars($product['FilesName']) ?>" class="img-thumbnail mx-1" width="80">
                    </div>
                </div>
            </div>

            <!-- รายละเอียดสินค้า -->
            <div class="col-md-6">
                <h1><?= htmlspecialchars($product['Name']) ?></h1>
                <p class="text-muted">รองเท้าผู้ชาย</p>
                <h3 class="text-danger">฿<?= htmlspecialchars($product['Price']) ?></h3>

                <!-- ปุ่มเพิ่มในตะกร้า & รายการโปรด -->
                <button class="btn btn-dark w-100 my-2" id="button">🛒 เพิ่มในตะกร้า</button>
                <button class="btn btn-outline-secondary w-100"id="button2">❤️ รายการโปรด</button>
            </div>
        </div>
    </div>
</body>

</html>