<link rel="stylesheet" href="./css/forgotpassword.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <title>Admin Website Mỹ Phẩm - Forgot Password</title>
    <link rel="stylesheet" href="./css/forgotpassword.css">
</head>
<body>  
    <div class="container">
        <div class="img-container">
            <img src="../images/Forgot Password Illustration.png" alt="">
        </div>
        <div class="form-container">
            <form action="send-password-reset.php" method="POST">
                <h2 class="form-heading">Ooop~ You forgot your password?</h2>
                <p class="desc">Don't ever worry! Just enter the email address associated to your account.</p>
                <p class="desc">We'll send you confirmation as well as intructions to reset your password. It won't take
                    long time to get back your account!</p>
                <input type="text" maxlength="30" name="email-input" id="email-input" placeholder="Your email address here!">
                <div class="button-container">
                <button class = "button" id = "back-to-login">
                    <a href="login.php" style = "text-decoration: none; color: black;">Back to sign in</a>
                </button>
                    <i class="fas fa-paper-plane"></i>
                    <input type="submit" id="send-confirmation" class="button" value="Send confirmation">
                </div>
            </form>
        </div>
    </div>
    <script src="/Admin/script.js"></script>
</body>
</html>