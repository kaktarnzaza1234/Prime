<?php
function renderHeader($conn)
{
    echo '<head>';
    echo '<link rel="stylesheet" href="style2.css">';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
    echo '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">';
    echo '</head>';
    // Top Bar
    echo '<div class="top-bar">';
    echo '<a href="#">ค้นหาร้าน</a>';
    echo '<a href="#">ความช่วยเหลือ</a>';
    echo '<a href="#">เข้าร่วมกับเรา</a>';

    // Check if the user is logged in
    if (isset($_SESSION['email'])) {
        // User is logged in, show their name and logout link
        $email = $_SESSION['email'];
        $query = mysqli_query($conn, "SELECT firstName, lastName FROM users WHERE email='$email'");
        $row = mysqli_fetch_assoc($query);
        echo '<span>สวัสดี คุณ ' . $row['firstName'] . '</span>';
        echo '<span class="separator" style="margin: 0 8px; color: #666; font-weight: normal;">|</span>';
        echo '<a href="logout.php" class="logout-btn">ล็อกเอาท์</a>';
        echo '<a href="profile.php" class="cart-icon">
                <i class="fa fa-user"></i>
            </a>';
    } else {
        // User is not logged in, show sign-in link
        echo '<a href="login.php" class="signin-btn">เข้าสู่ระบบ</a>';
    }
    echo '</div>';

    // Header
    echo '<header>';
    echo '<div class="logo">';
    echo '<a href="main.php" class="logo">';
    echo '<img src="assets/logo/Prime2.png" alt="Logo">';
    echo '</a>';
    echo '</div>';
    echo '<nav>';
    echo '<ul>';
    echo '<li><a href="main.php">หน้าแรก</a></li>';
    echo '<li><a href="product.php">สินค้า</a></li>';
    echo '<li><a href="#">ผู้ชาย</a></li>';
    echo '<li><a href="#">ผู้หญิง</a></li>';
    echo '<li><a href="addproduct.php">เพิ่มสินค้า</a></li>';
    echo '</ul>';
    echo '</nav>';

    echo '<div class="search-bar">';
    echo '<button id="search-button"><i class="fa fa-search"></i></button>';
    echo '<input type="text" placeholder="ค้นหา" id="search-input">';
    echo '</div>';

    echo '</header>';
}

function loadFooter()
{
    echo '
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
    ';
}
