<head>
    <link rel="stylesheet" href="./css/register.css">
</head>
<div class = "container1">
    <main>
    <div class="register-container">
    <div class="signup-form-container">
        <form action="" method="POST">
            <h2><b>Sign Up Your Account</b></h2>
            <div class="main-form">
                <input type="text" maxlength="30" class="signup" name = "email"  placeholder="Enter your email">
                <input type="text" maxlength="30" class="signup" name = "name" id="name-input" placeholder="Enter you name">
                <input type="text" maxlength="30" class="signup" name = "phone" id="phone-input" placeholder="And phone number">
                <div class="password-container">
                    <input type="password" name = "password" maxlength="30" class="signup" id="password-input"
                        placeholder="Enter password">
                    <i class="fas fa-eye-slash  password-toggle-button"></i>
                </div>
                <div class="password-container">
                    <input type="password"name = "password_conf" maxlength="30" class="signup" id="password-confirm"
                        placeholder="Confirm your password">
                    <i class="fas fa-eye-slash  password-toggle-button"></i>
                </div>
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                                $email = $_POST["email"];
                                $name = $_POST["name"];
                                $phone = $_POST["phone"];
                                $password = md5($_POST["password"]);
                                $password_conf = md5($_POST["password_conf"]);
                                $sql = "select * from user where email = '$email' LIMIT 1";
                                $result = $con->query($sql);
                                if ($result->num_rows > 0) {
                                    echo "<p style = color:red; margin-top: 5px; >This email has been taken by someone!</p>";
                                } else {
                                if ($password != $password_conf){
                                    echo "<p style = color:red; margin-top: 5px; >Failed confirmation!</p>";
                                }
                                else{
                                        $sql = "INSERT INTO `user` (`email`, `fullname`, `phone_number`, `password`) VALUES ('$email', '$name', '$phone', '$password');
                                    ";
                                    $result = $con->query($sql);
                                    if ($result==true){
                                            header("Location: index.php?page=login");
                                    }
                                }
                                }
                                $con->close();
                            }
                            ?>
                <div class="button-container">
                    <i class="fas fa-lock    "></i>
                    <input type="submit" name = "submit" id="submit-signup" value="All is done, let's get started!"></input>
                </div>
                <p style="color: gray;">- Already Have An Account? -</p>
                    <button class="to-user-login">
                    <a href="index.php?page=login" style = "color: black; font-size: 14pt; text-decoration: none;">
                        <i class="fas fa-check-circle    "></i>
                    Back to login
                    </a>
                </button>
            </div>
        </form>
    </div>
</div>
</main>
</div>
