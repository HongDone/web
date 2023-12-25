<div class="deleteproduct-form-container">
    <span>Delete product no </span>
    <?php $prod_id = $_GET["id"];
    echo "<span>$prod_id</span>";
    $sql = "select * from product where product_id = '$prod_id'";
    $result = $con->query($sql);
    $row = $result->fetch_row();
    $name = $row[2];
    $image = $row[4];
    echo "<p>Product name: $name</p>";
    echo "<img src = '../upload/$image'>"
    ?>
    <form action="" method="POST">
        <p style="color: red; font-weight: bold;"> Are you sure about that?</p>
        <input type="submit" name="delete_prod" value="Delete anyway" class="delete-submit-btn  submit-btn"></input>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_prod"])) {
    $sql = "delete from product where product_id = '$prod_id'";
    $result = $con->query($sql);
    if ($result) {
        echo "<p style = 'color:green'>Deleted product sucessfully!</p>";   
    }
    else{
        echo "<p style = 'color:red'>Cannot delete: It's seem like we had deals with this product</p>";
    }
    $con->close();
}
?>