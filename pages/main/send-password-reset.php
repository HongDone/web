
<?php

include("../../config/connection.php");

$email = $_POST["email-input"];


$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$sql = "UPDATE user
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if ($con->affected_rows) {

    $mail = require("../../config/mailer.php");

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";

    $domain_name = "http://localhost/Cosmetics"; // Sửa lại chỗ này cho phù hợp với đường dẫn đến folder admin của bạn

    $mail->Body = <<<END

    Click <a href="$domain_name/index.php?page=resetpassword&token=$token">here</a> 
    to reset your password.

    END;

    // Thiết kế lại sau khi gửi mail thành công/thất bại
    try {

        $mail->send();

        echo "<p>A messege has been sent to you mail. Please check!</p>";

    } catch (Exception $e) {

        echo "<p>Fail! Please check your email again!</p>";

    }

}