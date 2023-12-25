<link rel="stylesheet" href="./css/user.css">
<link rel="stylesheet" href="./css/category.css">
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/product.css">
<main class="main">
    <div class="container2">
        <div class="users">
            <h2 style="display: inline;">User</h2>
            <button id="adduser-form">
                <a style="color: black; text-decoration: none;" href="index.php?page=user&action=add">Add New
                    User</a>
            </button>
        </div>
<?php
if (isset($_SESSION["query"])) {
    unset($_SESSION["query"]);
}
if (isset($_GET["action"])) {
    $temp1 = $_GET["action"];
} else {
    $temp1 = '';
}
if ($temp1 == "add") {
    include("./modules/user/add.php");
}
if ($temp1 == "delete") {
    include("./modules/user/delete.php");
}
if ($temp1 == "update") {
    include("./modules/user/update.php");
}

if ($temp1 == '') {
    include("./modules/user/show.php");
}
?>
    </div>
</main>