<?php
include("include.php"); // เชื่อมต่อกับฐานข้อมูล

// รับค่าตัวกรองและการเรียงลำดับจาก URL
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

// สร้างคำสั่ง SQL
$sql = "SELECT * FROM files";

// เพิ่มตัวกรอง
if (!empty($filter)) {
    $sql .= " WHERE Name LIKE '%" . mysqli_real_escape_string($conn, $filter) . "%'";
}

// เพิ่มการเรียงลำดับ
if (!empty($sort)) {
    switch ($sort) {
        case 'price-asc':
            $sql .= " ORDER BY Price ASC";
            break;
        case 'price-desc':
            $sql .= " ORDER BY Price DESC";
            break;
        case 'name-asc':
            $sql .= " ORDER BY Name ASC";
            break;
        case 'name-desc':
            $sql .= " ORDER BY Name DESC";
            break;
    }
}

// ดึงข้อมูลจากฐานข้อมูล
$result = mysqli_query($conn, $sql);

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row; // เก็บข้อมูลสินค้าไว้ใน array
}

// ส่งข้อมูลกลับในรูปแบบ JSON
header('Content-Type: application/json');
echo json_encode($products);

mysqli_close($conn); // ปิดการเชื่อมต่อฐานข้อมูล
?>
