<div class="addproduct-form-container">
    </style>
    <span>Update slider </span>
    <br>
    <?php $id = $_GET["id"];
    $sql = "select * from slider where slide_id = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $product_id = $row['product_id'];
    $image = $row['image'];
    $result1 = $con->query("select title from product where product_id = '$product_id'");
    $product_name = $result1->fetch_row()[0];
    ?> 
    <form action="" method="POST"  enctype="multipart/form-data">

        <?php echo "<image src = '../upload/$row[image]'><br>" . "<span>Upload new image:</span> " ?>
                <br>
        <?php echo "<input type='file' class = 'slide-image' name = 'image'>" ?>
        <span>Relevant product: </span> <?php echo "<span>$product_name</span><br><span>Choose other: </span>" ?> 
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
    <br>
        <input type="submit" name="update_slider" value="Submit" class="add-submit-btn  submit-btn"></textarea>
        <input type="reset" name="reset" value="Reset" class="submit-btn"></input>
    </form>
    <?php
    if (isset($_POST['update_slider'])) {
        $product = $_POST['product'];
        $image_path = basename($_FILES['image']['name']);
        if ($image_path == '') {
            $sql_update_image = "UPDATE slider SET product_id='$product' WHERE slide_id='$id'";
        } else {
            $target_dir = "../upload/";
            $target_file = $target_dir . $image_path;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $sql_update_image = "UPDATE slider SET product_id='$product',image='$image_path' WHERE slide_id='$id'";
        }
        $result = $con->query($sql_update_image);
        if ($result) {
            echo "<p style = 'color:green'>Slide updated!</p>";
        }
        $con->close();
    }
    ?>

</div>