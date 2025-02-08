<!DOCTYPE html>
<html lang="th">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>สินค้า</title>
	<link href="assets/logo/Prime2.png" rel="icon">
	<link rel="stylesheet" href="style2.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<body>
	<!-- Top Bar -->
	<div class="top-bar">
		<a href="#">ค้นหาร้าน</a>
		<a href="#">ความช่วยเหลือ</a>
		<a href="#">เข้าร่วมกับเรา</a>
		<a href="#">ลงชื่อเข้าใช้</a>
	</div>

	<!-- Header -->
	<header>
		<div class="logo">
			<a href="main.php" class="logo">
				<img src="assets/logo/Prime2.png" alt="Logo">
			</a>
		</div>
		<nav>
			<ul>
				<li><a href="main.php">หน้าแรก</a></li>
				<li><a href="product.php">สินค้า</a></li>
				<li><a href="#">ผู้ชาย</a></li>
				<li><a href="#">ผู้หญิง</a></li>
				<li><a href="addproduct.php">เพิ่มสินค้า</a></li>
			</ul>
		</nav>
		<div class="search-bar">
			<button id="search-button"><i class="fa fa-search"></i></button>
			<input type="text" placeholder="ค้นหา" id="search-input">

		</div>

	</header>
	<?php

	header("Location: product.php");
	exit;
	include("include.php");

	if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "myfile/" . $_FILES["filUpload"]["name"])) {
		echo "Copy/Upload Complete<br>";
		//*** Insert Record ***//
		$strSQL = "INSERT INTO files ";
		$strSQL .= "(Name, Price, FilesName) VALUES ('" . $_POST["txtName"] . "','" . $_POST["Price"] . "', '" . $_FILES["filUpload"]["name"] . "')";
		$objQuery = mysqli_query($conn, $strSQL);
	}
	?>
	<a href="product.php">View files</a>
	<!-- Footer -->
	<footer>
		<div class="footer-container">
			<div class="footer-column">
				<h4>เกี่ยวกับเรา</h4>
				<p>Lorem ipsum dolor sit amet,</p>
			</div>
			<div class="footer-column">
				<h4>บริการลูกค้า</h4>
				<ul>
					<li><a href="#">คำถามที่พบบ่อย</a></li>
					<li><a href="#">การคืนสินค้า</a></li>
					<li><a href="#">การจัดส่ง</a></li>
					<li><a href="#">ติดต่อเรา</a></li>
				</ul>
			</div>
			<div class="footer-column">
				<h4>ติดตามเรา</h4>
				<div class="social-links">
					<a href="#" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
					<a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
					<a href="#" class="social-icon"><i class="fa-brands fa-x"></i></a> <!-- สำหรับ X (Formerly Twitter) -->
					<a href="#" class="social-icon"><i class="fa-brands fa-youtube"></i></a>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<p>&copy; 2025 Lorem Store. All Rights Reserved.</p>
		</div>
	</footer>
</body>

</html>