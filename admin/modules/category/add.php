<div class = "addcategory-form-container">
<h4>Create new category</h4>
<form action="" method="POST">
    <input type="text" class = "cate-name" name="cate_name" required placeholder="Category Title">
    <input type="submit" name="add_cate" value="Submit" class="add-submit-btn  submit-btn"></input>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_cate"])) {
        $cate_name = $_POST["cate_name"];
            $sql = "insert into category (category_name) values ('$cate_name') ";
            $result = $con->query($sql);
            if ($result) {
                echo "<p style='color:green'>This category is inserted!</p>";
            }
            else{
            echo "<p style='color:red'>This category name is existed!</p>";
            }  
        $con->close();
    }
    ?>
</form>
</div>
