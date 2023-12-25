<?php
if (isset($_GET["page"])) {
    $temp = $_GET["page"];
} else {
    $temp = '';
}
if ($temp == "product") {
    include("main/product.php");
}
if ($temp == "category") {
    include("main/category.php");
}
if ($temp == "order") {
    include("main/order.php");
}
if ($temp == "user") {
    include("main/user.php");
}
if ($temp == "profile") {
    include("main/profile.php");
}

if ($temp == "slider") {
    include("main/slider.php");
}

if ($temp == '') {
    include("main/dashboard.php");
}
if ($temp == "order_details") {
    include("main/order_details.php");
}
?>