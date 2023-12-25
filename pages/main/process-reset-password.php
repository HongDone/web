<?php

include("../../config/connection.php");

$token = $_POST["token"];


$token_hash = hash("sha256", $token);

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
$password = $_POST["password-input"];

// // Các loại kiểm tra độ an toàn của mật khẩu, uncomment nếu cần
// if (strlen($password) < 8) {
//     die("Password must be at least 8 characters");
// }

// if ( ! preg_match("/[a-z]/i", $password)) {
//     die("Password must contain at least one letter");
// }

// if ( ! preg_match("/[0-9]/", $password)) {
//     die("Password must contain at least one number");
// }

if ($password !== $_POST["password-confirm"]) {
    die("Passwords must match");
}

$password_hash = md5($password);

$sql = "UPDATE user
        SET password = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE email = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("ss", $password_hash, $user["email"]);

$stmt->execute();

header( 'Location: http://localhost/Cosmetics/index.php?page=login' );