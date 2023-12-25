<link rel="stylesheet" href="./css/product.css">
<main class="main">
    <div class="container2">
        <div class="product">
            <h2 style="display: inline;">Product</h2>
            <button id="addproduct-form">
                <a style="color: black; text-decoration: none;" href="index.php?page=product&action=add">Add New
                    Product</a>
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
    include("./modules/product/add.php");
}
if ($temp1 == "delete") {
    include("./modules/product/delete.php");
}
if ($temp1 == "update") {
    include("./modules/product/update.php");
}

if ($temp1 == '') {
    include("./modules/product/show.php");
}
?>
</div>
</main>
