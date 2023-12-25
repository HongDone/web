<?php

include("../config/connection.php");

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

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
$password = $_POST["new-password"];

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

if ($password !== $_POST["confirm-password"]) {
    die("Passwords must match");
}

$password_hash = md5($password);

$sql = "UPDATE admin
        SET ad_password = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE ad_id = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("ss", $password_hash, $admin["ad_id"]);

$stmt->execute();

header( 'Location: login.php' );