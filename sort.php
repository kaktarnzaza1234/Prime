<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jordan Shoes - Lorem Store</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="style2.css">
    <link href="assets/pandapng.png" rel="icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="assets/eee.webp" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="main.php">HOME</a></li>
                <li><a href="#">MEN</a></li>
                <li><a href="#">WOMEN</a></li>
                <li><a href="#">KIDS</a></li>
                <li><a href="#">ADD</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="ค้นหาสินค้า...">
            <button><i class="fa fa-search"></i></button>
        </div>
    </header>

    <!-- Filter and Sort Section -->
    <div class="filter-sort">
        <select id="sort-options">
            <option value="price-asc">ราคาต่ำไปสูง</option>
            <option value="price-desc">ราคาสูงไปต่ำ</option>
            <option value="name-asc">ชื่อ A-Z</option>
            <option value="name-desc">ชื่อ Z-A</option>
        </select>
    </div>

    <!-- Product List -->
    <div class="product-list" id="product-list">
    
    
</div>


    <script src="script.js"></script>
</body>

</html>