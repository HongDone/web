
<div class="addproduct-form-container" >
</style>
    <span>Product title </span> 
        <?php $prod_id = $_GET["id"];
        $result = $con->query("select * from product where product_id = '$prod_id'");
        $row = $result->fetch_row();
        $cate_id = $row[1];
        $result = $con->query("select category_name from category where category_id = '$cate_id'");
        $cate_name = $result->fetch_row()[0];
        $title = $row[2];
        $price = $row[3];
        $image = $row[4];
        $desc = $row[5];
 ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php echo "<input type='text'value = '$title' class='product-name' name='title' required placeholder='Product Title'>" ?>
        <br>
        <?php echo "<image src = '../upload/$image'><br>". "<span>Upload new image:</span> "?>
        <?php echo "<input type='file' class = 'product-image' name = 'image'>" ?>
        <br>
        <span>Product price </span> 
        <?php echo "<input type='text' value = '$price' class = 'product-price' name = 'price'  placeholder='Product Price'> " ?>
        <br>
        <span>Category: </span> <?php echo "<span>$cate_name</span><br><span>Choose other: </span>" ?> 
       <?php echo "<select name='category_id' >" ?>
            <?php
            $sql = "select * from category";
            $result = $con->query($sql);
            echo "<option  value = '$cate_id'>$cate_name</option>";
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_row();
                if ($row[0] != $cate_id){
                    echo "<option value = '$row[0]'>$row[1]</option>";                
                }
            }
            ?>
        </select>
        <br>
        <?php echo "<span>Product description</span><br><textarea  name = 'desc'>$desc</textarea>" ?>
        <br>
        <input type="submit" name="update_prod" value="Submit" class="add-submit-btn  submit-btn"></textarea>
        <input type="reset" name="reset" value="Reset" class="submit-btn"></input>
    </form>
    <?php
    if (isset($_POST['update_prod'])) {
        $title = $_POST['title'];
        $image_path = basename($_FILES['image']['name']);
         //$image_tmp = $_FILES['image']['tmp_name'];;
        $category = $_POST['category_id'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        if ($image_path == '') {
            $sql_update_image = "UPDATE product SET title='$title',description='$desc',price='$price',category_id='$category' WHERE product_id='$prod_id'";
        } else {
            $target_dir = "../upload/";
            $target_file = $target_dir . $image_path;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $sql_update_image = "UPDATE product SET title='$title',description='$desc',price='$price',image='$image_path',category_id = '$category' WHERE product_id='$prod_id'";
        }
        $result = $con->query($sql_update_image);
        if ($result){
            echo "<p style = 'color:green'>Product updated!</p>";
        }
        $con->close();
    }
    ?>

</div>
<?php
