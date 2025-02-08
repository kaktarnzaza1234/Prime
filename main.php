<?php
session_start();
include("include.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านค้าอย่างเป็นทางการของ Prime
    </title>
    <link rel="stylesheet" href="style2.css">
    <link href="assets/logo/Prime2.png" rel="icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!--animate.css-->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!-- React & ReactDOM CDN -->
    <script src="https://unpkg.com/react@18/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .slider {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .shoe {
            transition: 0.5s;
            opacity: 0.5;
        }

        .shoe.active {
            opacity: 1;
            transform: scale(1.2);
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
    <!-- billbord -->
    <section id="video-background" class="video-container">
        <a href="product.php">
            <video autoplay loop muted playsinline class="video-background">
                <source src="assets/video/nike.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </a>
    </section>
    <!--brand strat -->
    <section id="brand" class="brand">
        <div class="container">
            <div class="brand-area">
                <div class="owl-carousel owl-theme brand-item">
                    <div class="item">
                        <a href="#">
                            <img src="assets/brand/nike.png" alt="brand-image" />
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#">
                            <img src="assets/brand/adidas.png" alt="brand-image" />
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#">
                            <img src="assets/brand/puma.png" alt="brand-image" />
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#">
                            <img src="assets/brand/nbb.png" alt="brand-image" />
                        </a>
                    </div><!--/.item-->


                </div><!--/.owl-carousel-->
            </div><!--/.clients-area-->
        </div><!--/.container-->
    </section><!--/brand-->
    <!--brand end -->

    <style>
        /* ตั้งค่า container ของวีดีโอ */
        .video-container {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        /* วีดีโอขยายเต็มพื้นที่ */
        .video-background {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            /* ให้ลิงก์ครอบวิดีโอทั้งหมด */
        }
    </style>

    <!-- Hero Section -->
    <section class="hero">

        <img src="assets/font/fonts.png" alt="font">
        <!-- ปุ่มดูข้อมูล -->
        <a href="product.php" class="btn">ดูข้อมูล</a>


    </section>
    <!--brand strat -->
    <section id="brand" class="brand">
        <div class="container">
            <div class="brand-area">
                <div class="owl-carousel owl-theme brand-item">
                    <div class="item">
                        <a href="#">
                            <img src="assets/brand/nike.png" alt="brand-image" />
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#">
                            <img src="assets/brand/adidas.png" alt="brand-image" />
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#">
                            <img src="assets/brand/puma.png" alt="brand-image" />
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#">
                            <img src="assets/brand/nbb.png" alt="brand-image" />
                        </a>
                    </div><!--/.item-->


                </div><!--/.owl-carousel-->
            </div><!--/.clients-area-->
        </div><!--/.container-->
    </section><!--/brand-->
    <!--brand end -->
    <div class="container">
        <h2>สินค้าล่าสุด</h2>
        <div class="products">
            <div class="product">
                <img src="assets/cont/1.jpg" alt="Lifestyle Running Vomero">
                <p>Lifestyle Running Vomero</p>
            </div>
            <div class="product">
                <img src="assets/cont/2.png" alt="United Pack">
                <p>United Pack</p>
            </div>
            <div class="product">
                <img src="assets/cont/3.png" alt="Air Force 1 สำหรับเด็ก">
                <p>Air Force 1 สำหรับเด็ก</p>
            </div>
        </div>
    </div>
    <h1>เลือกซื้อตามสินค้าไอคอน</h1>
    <div id="root"></div>

    <script type="text/babel">
        function ShoeSlider() {
            const shoes = [
                { name: "Nike AF 1", image: "myfile/af1png.png" },
                { name: "Nike PANDA", image: "myfile/pandapng.png" },
                { name: "Jordan", image: "myfile/Air Jordan 1 Low.png" },
                

            ];
            const [index, setIndex] = React.useState(0);

            const prevSlide = () => setIndex((prev) => (prev === 0 ? shoes.length - 1 : prev - 1));
            const nextSlide = () => setIndex((prev) => (prev === shoes.length - 1 ? 0 : prev + 1));

            return (
                <div>
                    <div className="slider">
                        <button onClick={prevSlide}>⬅</button>
                        {shoes.map((shoe, i) => (
                            <div key={i} className={`shoe ${i === index ? "active" : ""}`}>
                                <img src={shoe.image} alt={shoe.name} width="200" />
                                <p>{shoe.name}</p>
                            </div>
                        ))}
                        <button onClick={nextSlide}>➡</button>
                    </div>
                </div>
            );
        }

        ReactDOM.createRoot(document.getElementById("root")).render(<ShoeSlider />);
    </script>
    <div class="container">
        <h2>สินค้าล่าสุด</h2>
        <div class="products">
            <div class="product">
                <img src="assets/cont/1.jpg" alt="Lifestyle Running Vomero">
                <p>Lifestyle Running Vomero</p>
            </div>
            <div class="product">
                <img src="assets/cont/2.png" alt="United Pack">
                <p>United Pack</p>
            </div>
            <div class="product">
                <img src="assets/cont/3.png" alt="Air Force 1 สำหรับเด็ก">
                <p>Air Force 1 สำหรับเด็ก</p>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>สินค้าล่าสุด</h2>
        <div class="products">
            <div class="product">
                <img src="assets/cont/1.jpg" alt="Lifestyle Running Vomero">
                <p>Lifestyle Running Vomero</p>
            </div>
            <div class="product">
                <img src="assets/cont/2.png" alt="United Pack">
                <p>United Pack</p>
            </div>
            <div class="product">
                <img src="assets/cont/3.png" alt="Air Force 1 สำหรับเด็ก">
                <p>Air Force 1 สำหรับเด็ก</p>
            </div>
        </div>
    </div>


    <!-- Shoe Carousel -->
    <!--
    <section class="carousel-section">
        <h2>Lorem</h2>
        <div class="carousel">
            <div class="carousel-item">
                <img src="assets/af1png.png" alt="Nike Pegasus">
                <p>PEGASUS</p>
                <p>ราคาพิเศษ: ฿3,500</p>

            </div>
            <div class="carousel-item">
                <img src="assets/pandapng.png" alt="Nike Pegasus">
                <p>PEGASUS</p>
                <p>ราคาพิเศษ: ฿3,500</p>


            </div>
            <div class="carousel-item">
                <img src="assets/af1png.png" alt="Nike Pegasus">
                <p>PEGASUS</p>
                <p>ราคาพิเศษ: ฿3,500</p>

            </div>
            <div class="carousel-item">
                <img src="assets/pandapng.png" alt="Nike Pegasus">
                <p>PEGASUS</p>
                <p>ราคาพิเศษ: ฿3,500</p>

            </div>

        </div>
    </section>
    -->








    <!-- Sports Carousel -->
    <!--<section class="carousel-section">
        <h2>Lorem</h2>
        <div class="carousel">
            <div class="carousel-item">
                <img src="assets/af1png.png" alt="Football">
                <p>Football</p>
            </div>
            <div class="carousel-item">
                <img src="assets/af1png.png" alt="Football">
                <p>Football</p>
            </div>
            <div class="carousel-item">
                <img src="assets/af1png.png" alt="Football">
                <p>Football</p>
            </div>
            <div class="carousel-item">
                <img src="assets/af1png.png" alt="Football">
                <p>Football</p>

            </div>
        </div>
    </section>
    -->

    <!--brand end -->
    <!-- Include all js compiled plugins (below), or include individual files as needed -->

    <script src="assets/js/jquery.js"></script>

    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!--bootstrap.min.js-->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- bootsnav js -->
    <script src="assets/js/bootsnav.js"></script>

    <!--owl.carousel.js-->
    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!--Custom JS-->
    <script src="assets/js/custom.js"></script>








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