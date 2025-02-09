<?php
session_start();
include("include.php");
include("header.php");

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือไม่
if (!isset($_SESSION['email'])) {
    die("You must be logged in to view this page.");
}

$loggedInEmail = $_SESSION['email'];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <title>หน้าโพรไฟล์</title>
    <style>
        body {
            background-color: #fff;
        }

        .row {
            width: 100%;
            
        }

        .profile-container {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        .profile-title {
            font-size: xx-large;
            font-weight: bolder;
            margin-bottom: 0.5rem;
            text-align: left;
            
        }


        .proinfo {
            margin-bottom: 0.5rem;
            text-align: left;
        }

        .profile-info {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150px;
            width: 150px;

        }

        .profile-info img {
            width: 80px;
            height: 80px;
            background-color: #fff;
            
            border-radius: 50%;
        }

        .profile-details {
            text-align: left;
        }

        .profile-details h3 {
            font-weight: bold;
        }

        .btn-container {
            display: flex;
            align-self: center;
            justify-content: flex-end;
            gap: 10px;
        }

        .form-label {
            text-align: left;
        }

        .margin2 {
            margin-bottom: 4rem;
        }

        .butt1 {
            background-color: black;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <?php
    renderHeader($conn)
    ?>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('profileImage');
                output.src = reader.result; // Update the profile image with the selected one
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <div class="container">

        <div class="profile-title">โพรไฟล์</div>
        <div class="proinfo">โพรไฟล์ Prime คือสิ่งที่ใช้แทนตัวคุณในการสั่งซื้อสินค้า ของเว็บ Prime</div>
        <div class="row" style="display: flex; align-items: start; justify-content: start;">

            <!-- Profile Picture Column -->
            <div class="profile-info" style="flex: 0 0 auto; margin-right: 20px;">
                <img src="myfile/avatar.png" alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%;"> <!-- สามารถเปลี่ยนเป็น path ของรูปจริง -->
            </div>

            <!-- Profile Details Column -->
            <div class="profile-details" style="flex: 1;">
                <h3><?= htmlspecialchars($user['firstName']) . " " . htmlspecialchars($user['lastName']) ?></h3>
                <p>username@<?= htmlspecialchars($user['username']) ?></p>
                <p>Email: <?= htmlspecialchars($user['email']) ?></p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark btn-sm margin2 butt1" data-bs-toggle="modal" data-bs-target="#editModal">
                    แก้ไขประวัติ
                </button>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " style="font-size: 26px; font-weight: bold;">
                            แก้ไขประวัติ
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container mt-5">
                            <form action="updateprofile.php" method="POST">
                                <!-- Hidden input to store user_id -->
                                <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                                <div class="mb-3 text-start">
                                    <label for="firstName" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?= htmlspecialchars($user['firstName']) ?>">
                                </div>

                                <div class="mb-3 text-start">
                                    <label for="lastName" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?= htmlspecialchars($user['lastName']) ?>">
                                </div>

                                <div class="mb-3 text-start">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>">
                                </div>

                                <div class="mb-3 text-start">
                                    <label for="email" class="form-label">อีเมล</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>">
                                </div>

                                <button type="submit" class="btn btn-dark btn-sm  margin2 butt1">ยืนยัน</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bootstrap JS (necessary for modal functionality) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</div>
</div>

<!-- Empty space (for example) -->
<div class="profile-container" style="height: 500px;"></div>

<?php
loadFooter();
?>

</body>

</html>