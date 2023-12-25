<div class="addproduct-form-container">
    <h4>Add a slider</h4>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>Choose which product this slide references: </p>
        <select name="product" id="">
            <?php
            $sql = "select * from product";
            $result = $con->query($sql);
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_row();
                echo "<option value = '$row[0]'>$row[2]</option>";
            }
            ?>
        </select>
        <p>Choose an image:</p>
        <input type="file" class = "slide-img" name = "slide_img">
        <input type="submit" name="add_slide" value="Submit" class="add-submit-btn  submit-btn"></textarea>
        <input type="reset" name="reset" value="Reset" class="submit-btn"></input>
    </form>
    <?php
    if (isset($_POST['add_slide'])) {
        $product_id = $_POST['product'];
        $slide_img_path = basename($_FILES['slide_img']['name']);
        $sql = "INSERT INTO slider (product_id, image) values ('$product_id', '$slide_img_path')";
        $result = $con->query($sql);
        if ($result) {
            $target_dir = "../upload/";
            $target_file = $target_dir . $slide_img_path;
            move_uploaded_file($_FILES["slide_img"]["tmp_name"], $target_file);
            echo "<img style = 'width:200px; height: 200px;' src='" . $target_file . "'>";
            echo "<p style = 'color:green'>Added slider succesfully!</p>";
        }
        $con->close();
    }
    ?>

</div>