<link rel="stylesheet" href="./css/category.css">
<main class="main">
    <div class="container2">
        <div class="category">
            <h2 style="display: inline;">Category</h2>
            <button id="addcategory-form">
                <a style="color: black; text-decoration: none;" href="index.php?page=category&action=add">Add New Category</a>
            </button>
        </div>
<?php
if (isset($_SESSION["query"])) {
    unset($_SESSION["query"]);
}
if (isset($_GET["action"])) {
    $temp1= $_GET["action"];
}
else{
    $temp1 = '';
}
if ($temp1 == "add") {
    include("./modules/category/add.php");
}
if ($temp1 == "delete") {
    include("./modules/category/delete.php");
}
if ($temp1 == "update") {
    include("./modules/category/update.php");
}
if ($temp1 == '') {
    include("./modules/category/show.php");
}
?>
</div>
</main>