<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login/style.css">
    <link rel="stylesheet" href="./login/main.js">
    <title>Document</title>

</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
                <h1 class="opacity">LOGIN</h1>
                <form action="./login/xuly.php" method="post">
                    <input type="text" name="tai_khoan" placeholder="USERNAME" require = ""/>
                    <input type="password" name="mat_khau" placeholder="PASSWORD" require = "" />
                    <button class="opacity" name="dangnhap">SUBMIT</button>
                </form>
                <div class="register-forget opacity">
                    <a href="">REGISTER</a>
                    <a href="">FORGOT PASSWORD</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
    <!-- <script src="main.js"></script> -->
</body>
</html>

