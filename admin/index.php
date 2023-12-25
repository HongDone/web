<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin management</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>
<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
?>
<body>
    <?php
    include("../config/connection.php");
    include("./pages/sidebar.php");
    include("./pages/header.php");
    include("./pages/main.php");
    ?>
</body>
</html>
<script src="./js/script.js"></script>
