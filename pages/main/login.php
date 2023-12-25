<head>
    <link rel="stylesheet" href="./css/login.css">
</head>
<div class = "container1">
    <main>
<div class="login-container">
    <div class="login-form-container">
        <form action="" method="POST">
            <h2><b>Login to continue</b></h2>
            <div class="main-form">
                <input type="text" name = "email" maxlength="30" class="login" id="username-input" placeholder="Your email here">
                <div class="password-container">
                    <input type="password" name = "password" maxlength="30" class="login" id="password-input"
                        placeholder="Password, please!">
                    <i class="fas fa-eye-slash  password-toggle-button  " ></i>
                </div>
                <input type="checkbox" name="check-remember" id="remember-user"> <span>Remember me</span>
                <a href="index.php?page=forgotpassword" id="forgot-password"><span>Forgot your
                        password?</span></a>
                <br>
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                                $email = $_POST["email"];
                                $password = md5($_POST["password"]);
                                $sql = "select*from user where email = '$email' and password = '$password' and is_active = 1  LIMIT 1";
                                $result = $con->query($sql);
                                $row = $result->fetch_row();
                                if ($result->num_rows > 0) {
                                    $_SESSION["ulogin"] = $email;
                                    $_SESSION["phone"] = $row[2];
                                    $_SESSION["name"] = $row[1];
                                    $_SESSION["pass"] = $row[3];
                                    $_SESSION["address"] = $row[4];
                                    header("Location: index.php");
                                } else {
                                    echo "<p style = color:red; margin-top: 5px; >Invalid infor, please try again!</p>";
                                }
                                $con->close();
                            }
                            ?>
                <div class="button-container">
                    <i class="fas fa-lock    "></i>
                    <input type="submit" name = "submit" id="submit-login" value="It's all done, let's go now!"></input>
                </div>
                           <p style="color: gray;">- New and need register? -</p>
                <button class="to-user-signup">
                <a href="index.php?page=register" style = "color : black; font-size: 14pt; text-decoration:none;">
                    <i class="fas fa-check-circle    "></i>
                    Here you are!
                        </a>
                </button>
            </div>
        </form>
    </div>
</div>
</main>
</div>
