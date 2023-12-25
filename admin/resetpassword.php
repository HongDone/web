<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

include("../config/connection.php");

$sql = "SELECT * FROM admin
        WHERE reset_token_hash = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$admin = $result->fetch_assoc();

if ($admin === null) {
    die("token not found");
}

if (strtotime($admin["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Website Mỹ Phẩm - Reset Password</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/resetpassword.css">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <form action="process-reset-password.php" method="POST">

                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>"> 

                <h2 class="form-heading">Reset your password here!</h2>
                <div>
                    <p class="note">Hi! Please keep in mind that your password need to conclude at least one upper character as well as one number.</p>
                    <p class="note">After submit successfully, your new password will take effect and be used from now on.</p>
                </div>
                <input type="password" maxlength="30" class="input-password" id="new-password" name="new-password" placeholder="Enter new password" onfocus="clearPlaceHolder(this)">
                <input type="password" maxlength="30" class="input-password" id="confirm-password" name="confirm-password" placeholder="Confirm your new password" onfocus="clearPlaceHolder(this)">
                <div class="button-container">
                    <input type="submit" name="submit" class="button" value="Submit" id="submit-reset">
                </div>
            </form>
        </div>
        <div class="image-container">
            <img src="https://img.freepik.com/free-vector/privacy-engineering-abstract-concept-illustration_335657-3829.jpg" alt="">
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
