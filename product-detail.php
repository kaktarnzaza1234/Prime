<?php
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
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['Name']) ?></title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="assets/logo/Prime2.png" rel="icon">

</head>

<body>
    <a href="product.php" class="btn btn-light mt-3" style="border-radius: 25px; margin:10px;">
        <i class="fas fa-arrow-left"></i>
    </a>


    <div class="container mt-5">
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

                <!-- ตัวเลือกสี -->
                <div class="colors my-3">
                    <label>เลือกสี:</label>
                    <button class="btn btn-outline-dark mx-1">⚪ ขาว</button>
                    <button class="btn btn-outline-dark mx-1">⚫ ดำ</button>
                </div>

                <!-- ตัวเลือกไซส์ -->
                <div class="sizes my-3">
                    <label>เลือกไซส์:</label>
                    <div class="d-flex flex-wrap">
                        <?php foreach (["US 6", "US 6.5", "US 7", "US 7.5", "US 8", "US 8.5", "US 9", "US 9.5", "US 10", "US 10.5", "US 11", "US 11.5", "US 12"] as $size) : ?>
                            <button class="btn btn-outline-secondary m-1"><?= $size ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- ปุ่มเพิ่มในตะกร้า & รายการโปรด -->
                <button class="btn btn-dark w-100 my-2">🛒 เพิ่มในตะกร้า</button>
                <button class="btn btn-outline-secondary w-100">❤️ รายการโปรด</button>
            </div>
        </div>
    </div>
</body>

</html>