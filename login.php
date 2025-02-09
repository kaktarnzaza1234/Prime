<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="container" id="signup" style="display:none">
    <h1 class="form-title">สมัครสมาชิก</h1>
    <form method="post" action="register.php">
      <div class="input-group">
        <input type="text" name="fName" id="fName" placeholder="First Name" required>
        <label for="fname">ชื่อ*</label>
      </div>
      <div class="input-group">
        <input type="text" name="lName" id="lName" placeholder="Last Name" required>
        <label for="lName">นามสกุล*</label>
      </div>
      <div class="input-group">
        <input type="text" name="username" id="username" placeholder="Username" required>
        <label for="username">Username*</label>
      </div>
      <div class="input-group">
        <input type="email" name="email" id="email" placeholder="Email" required>
        <label for="email">อีเมล*</label>
      </div>
      <div class="input-group">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <label for="password">พาสเวิร์ด*</label>
      </div>
      <input type="submit" class="btn" value="สมัครสมาชิก" name="signUp">
    </form>

    <div class="validate"></div>

    <p class="or">
    </p>
    <div class="links">
      <p>มีบัญชีอยู่แล้วหรือ?</p>
      <button id="signInButton">เข้าสู่ระบบ</button>
    </div>
  </div>

  <?php session_start(); ?>
<div class="container" id="signIn">
    <h1 class="form-title">ลงชื่อเข้าใช้</h1>

    <!-- Show error message if login fails -->
    <?php if (isset($_SESSION['error'])): ?>
        <p style="color: red; margin-left:2rem; margin-bottom: 1rem;"><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); // Clear error after showing ?>
    <?php endif; ?>

    <form method="post" action="register.php">
        <div class="input-group">
            <input type="email" name="email" id="email" placeholder="Email" required>
            <label for="email">อีเมล</label>
        </div>
        <div class="input-group">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label for="password">พาสเวิร์ด</label>
        </div>
        <input type="submit" class="btn" value="เข้าสู่ระบบ" name="signIn">
    </form>

    <div class="links">
        <p>ยังไม่มีบัญชีใช่ไหม?</p>
        <button id="signUpButton">สมัครสมาชิก</button>
    </div>
</div>

  <script src="login.js"></script>
</body>



</html>