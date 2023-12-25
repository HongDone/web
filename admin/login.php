
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="image-container">
        <img src="../images/Cosmetics Wallpaper.jpg"
            alt="">
        <div class="content-container">
            <h3>Welcome back!</h3>
            <p>Remember we always provide the best of the highest quality cosmetics.</p>
            <p>Be froud of our years of contributing to beauty community as well as health care industry.</p>
            <p>It's such a great pleasure for us to take care of our customers. Every day is a bless!</p>
        </div>
    </div>
    <div class="login-form">
        <form action="" autocomplete="on" method="POST">
            <h2 class="form-heading">Admin Login</h2>
            <div class="main-form">
                <input type="text" maxlength="30" name = "ad_name" class="login" id="ad_name-input" placeholder="Your admin name"
                    onfocus="clearPlaceHolder(this)">
                <div class="password-container">
                    <input type="password" maxlength="30"name = "ad_password" class="login" id="password-input" placeholder="Password"
                        onfocus="clearPlaceHolder(this)">
                    <i class="fas fa-eye-slash  password-toggle-button " id="toggle-button"></i>
                </div>
                <input type="checkbox" name="remember" id="remember-user"> <span>Remember me</span>
                <a href="forgotpassword.php" id="forgot-password"><span>Forgot your
                        password?</span></a>
                <br>
                <?php
                session_start();
                    include("../config/connection.php");
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                        $ad_name = $_POST["ad_name"];
                        $ad_password = md5($_POST["ad_password"]);
                        $sql = "select*from admin where ad_name = '$ad_name' and ad_password = '$ad_password'  LIMIT 1";
                        $result = $con->query($sql);
                        $row = $result->fetch_row();
                        if ($result->num_rows > 0) {
                            $_SESSION["login"] = $ad_name;
                            $_SESSION["email"] = $row[2];
                            $_SESSION["name"] = $row[4];
                            $_SESSION["pass"] = $row[03];
                            header("Location: index.php");
                        } else {
                            echo "<p style = color:red; margin-top: 5px; >Invalid infor, please try again!</p>";
                        }
                    }
                    ?>
                <div class="button-container">
                    <i class="fas fa-lock    "></i>
                    <input type = "submit" name = "submit" id="submit-login" value = "Login as an admin"></input>
                </div>
            </div>
        </form>
    </div>   
</body>
</html>
<script src = "./js/script.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
