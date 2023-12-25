<link rel="stylesheet" href="./css/product.css">
<link rel="stylesheet" href="./css/user.css">
<link rel="stylesheet" href="./css/category.css">
<main class="main">
    <div class="container2">
        <div class="user">
            <h2 style="display: inline;">Slider</h2>
            <button id="addproduct-form">
                <a style="color: black; text-decoration: none;" href="index.php?page=slider&action=add">Add New Slider</a>
            </button>
        </div>
<?php

if (isset($_GET["action"])) {
    $temp1 = $_GET["action"];
} else {
    $temp1 = '';
}
if ($temp1 == "add") {
    include("./modules/slider/add.php");
}
if ($temp1 == "delete") {
    include("./modules/slider/delete.php");
}
if ($temp1 == "update") {
    include("./modules/slider/update.php");
}

if ($temp1 == '') {
    include("./modules/slider/show.php");
}
?>
</div>
</main>
