<div class="updatecategory-form-container">
    <span>Update category no </span>
    <?php $cate_id = $_GET["id"];
    echo "<span>$cate_id</span>";
    $sql = "select category_name from category where category_id = '$cate_id'";
    $result = $con->query($sql);
    $row = $result->fetch_row();
    $name = $row[0];
    ?>
    <form action="" method="POST">
        <?php echo "<input type='text' class = 'cate-name' value = '$name'  name = 'cate_name'>" ?>
        <input type="submit" name="update_cate" value="Update" class="update-submit-btn  submit-btn"></input>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_cate"])) {
    $name = $_POST["cate_name"];
        $sql = "update category set category_name = '$name' where category_id = '$cate_id'";
        $result = $con->query($sql);
        if ($result) {
        echo "<p style = 'color:green'>This category is updated!</p>";
        }
        else{
        echo "<p style = 'color:red'>This category is already existed!</p>";
        }
    $con->close();
}
?>