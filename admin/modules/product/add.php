<div class="addproduct-form-container" >
    <h4>Create new product</h4>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" class="product-name" name="product_name" required placeholder="Product Title">
        <br>
        <input type="file" class = "product-img" name = "product_img">
        <br>
        <input type="text" class = "product-price" name = "product_price" required placeholder="Product Price"> 
        <br>
        <select name="category_id" id="">
            <?php
            $sql = "select * from category";
            $result = $con->query($sql);
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_row();
                echo "<option value = '$row[0]'>$row[1]</option>";
            }
            ?>
        </select>
        <br>
        <textarea name = "desc"></textarea>
        <br>
        <input type="submit" name="add_prod" value="Submit" class="add-submit-btn  submit-btn"></textarea>
        <input type="reset" name="reset" value="Reset" class="submit-btn"></input>
    </form>
    <?php
    if (isset($_POST['add_prod'])) {
        $product_name = $_POST['product_name'];
        $product_img_path = basename($_FILES['product_img']['name']);
        $category_id = $_POST['category_id'];
        $product_price = $_POST['product_price'];
        $desc = $_POST['desc'];
        $sql = "INSERT INTO product (title, description , price, image ,category_id) values ('$product_name','$desc','$product_price', '$product_img_path','$category_id')";
        $result = $con->query($sql);
        if ($result) {
            $target_dir = "../upload/";
            $target_file = $target_dir . $product_img_path;
            move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file);
            echo "<img style = 'width:200px; height: 200px;' src='" . $target_file . "'>";
            echo "<p style = 'color:green'>Added product succesfully!</p>";
        }
        $con->close();
    }
    ?>

</div>
