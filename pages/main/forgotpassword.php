<head>
<link rel="stylesheet" href="./css/forgotPassword.css">
</head>
<div class = "container1">
<div class="container">
        <div class="img-container">
            <img src="./images/Forgot Password Illustration.png" alt="">
        </div>
        <div class="form-container">
            <form action="pages/main/send-password-reset.php" method="POST">
                <h2 class="form-heading">Ooop~ You forgot your password?</h2>
                <p class="desc">Don't ever worry! Just enter the email address associated to your account.</p>
                <p class="desc">We'll send you confirmation as well as intructions to reset your password. It won't take
                    long time to get back your account!</p>
                <input type="text" maxlength="30" name="email-input" id="email-input" placeholder="Your email address here!"
                    onfocus="clearPlaceHolder(this)">
                <div class="button1-container">
                <button class = "button" id = "back-to-login">
                    <a href="login.php" style = "text-decoration: none; color: black;">Back to sign in</a>
                </button>
                    <i class="fas fa-paper-plane    "></i>
                    <input type="submit" id="send-confirmation" class="button" value="Send confirmation">
                </div>
            </form>
        </div>
    </div>
</div>
