
<?php
if (isset($_GET["action"])&& $_GET["action"]=="delete") {
    $id = $_GET["id"];
    $sql = "delete from category where category_id = '$id'";
    $result = $con->query($sql);
    if ($result) {
        echo "<p style = 'color:green'>Category deleted!</p>";
    }
    else{
        echo "<p style = 'color:red'>Cannot delete: It's seem like there're still products belong to this category active!</p>";
    }
    $con->close();
}
?>