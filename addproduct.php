<?php
session_start();
include("include.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้า</title>
    <link href="assets/logo/Prime2.png" rel="icon">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        form {
            max-width: 500px;
            margin: 80px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #000;
            text-align: center;
        }

        form label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #000;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #333;
        }
    </style>

</head>

<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <a href="#">ค้นหาร้าน</a>
        <a href="#">ความช่วยเหลือ</a>
        <a href="#">เข้าร่วมกับเรา</a>
        <?php
        // Check if the user is logged in
        if (isset($_SESSION['email'])) {
            // User is logged in, show their name and logout link
            $email = $_SESSION['email'];
            $query = mysqli_query($conn, "SELECT firstName, lastName FROM users WHERE email='$email'");
            $row = mysqli_fetch_assoc($query);
            echo '<span>Welcome, ' . $row['firstName'] . ' ' . $row['lastName'] . '</span>';
            echo '<span class="separator" style="margin: 0 8px; color: #666; font-weight: normal;">|</span>';
            echo '<a href="logout.php " class="logout-btn">ออกจากระบบ</a>';
            echo '<a href="profile.php" class="cart-icon">
                    <i class="fa fa-user"></i>
                </a>';
        } else {
            // User is not logged in, show sign-in link
            echo '<a href="login.php" class="signin-btn">Sign In</a>';
        }
        ?>
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
    <form name="form1" method="post" action="addproduct2.php" enctype="multipart/form-data">
        <h2>เพิ่มสินค้า</h2>
        <label for="txtName">ชื่อ :</label>
        <input type="text" name="txtName" id="txtName"><br>

        <label for="Price">ราคา :</label>
        <input type="number" name="Price" id="Price"><br>

        <label for="filUpload">รูปภาพ :</label>
        <input type="file" name="filUpload" id="filUpload"><br>



        <input name="btnSubmit" type="submit" value="Submit">
    </form>
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
    </footer>a
</body>

</html>