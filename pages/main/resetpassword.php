
<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

include("./config/connection.php");

$sql = "SELECT * FROM user
        WHERE reset_token_hash = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Mỹ Phẩm - Reset Password</title>
	<link rel="stylesheet" href="./css/resetpassword.css">
</head>
<div class = "container1">
<div class = "container">
    <div class="form-container">
        <form action="./pages/main/process-reset-password.php" method="POST">
	<input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            <h2 class="form-heading">Reset your password here!</h2>
            <div>
                <p class="note">Hi! Please keep in mind that your password need to conclude at least one upper
                    character as well as one number.</p>
                <p class="note">After submit successfully, your new password will take effect and be used from now
                    on.</p>
            </div>
            <div class="password-container">
                <input type="password" maxlength="30" class="input-password" id="password-input" name="password-input" placeholder="Enter password">
                <i class="fas fa-eye-slash  password-toggle-button"></i>
            </div>
            <div class="password-container">
                <input type="password" maxlength="30" class="input-password" name="password-confirm" id="password-confirm"
                    placeholder="Confirm your password">
                <i class="fas fa-eye-slash  password-toggle-button"></i>
            </div>
            <div class="button-container">
                <input type="submit" name="submit" class="button" value="Submit" id="submit-reset">
            </div>
        </form>
    </div>
    <div class="image-container">
        <img src="./images/Forgot Password Illustration.png" alt="">
    </div>

</div>
</div>

