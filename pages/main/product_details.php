<?php 
if (isset($_GET["id"])){
    $prod_id = $_GET["id"];
    $query = "select * from product where product_id = '$prod_id' ";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $price = (float)$row['price'];
}
?>
<head>
    <link rel="stylesheet" href="./css/productdetails.css">
</head>
<div class="container1">
    <section>
        <form method = "POST" action ="" style = "display:flex">
        <div class="imageproduct">
         <?php echo "<img src= './upload/$row[image]' > "?>
        </div>
        <div class="infor">
        <p class="nameproduct"><h1 style = "font-family: 'Poppins', sans-serif;" ><?php echo "$row[title]" ?></h1></p>
        <span class="price"><h3 style = "color: red"><?php echo "$row[price]" ?></span>đ</h3><br>
        <class="quantity">Quantity
        <input type="number" min = 1 value = "1" name = 'quantity' placeholder="1"><br><br>
        <?php
           echo  "<input type = 'submit' name = 'addtocart' value = 'Add to Cart' class='btn-addtocart' id='addtocart'><i class='bx bx-cart-alt'></i></input><br><br>";
           ?>
        <p class="description"><?php echo $row['description'] ?></p>
        </div>
        </form>
    </section>
    <script src="script.js"></script>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addtocart"])) {
    if (!isset($_SESSION["ulogin"])){
        header("location: index.php?page=login");
    }
    $quantity = (int)$_POST["quantity"];
    $total_price = $price * $quantity;
    $sql = "select * from cart where bought = 0 and product_id = '$prod_id' and email = '$_SESSION[ulogin]'";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows>0){
        $row = mysqli_fetch_assoc($result);
        $quantity += (int) $row['quantity'];
        $total_price += (float)$row['total_price']*(int) $row['quantity'];
        echo $quantity;
        echo $total_price;
        $sql = "update cart set quantity = '$quantity', total_price = '$total_price' where bought = 0 product_id = $prod_id and email = '$_SESSION[ulogin]'";
        mysqli_query($con, $sql);
    }
    // if ($result){
    //     $row = mysqli_fetch_assoc($result);
    //     echo (int)$row['quantity'];
    //     $new_quan = $quantity + (int)$row['quantity'];
    //     echo (float) $row['total_price'];
    //     $new_total_price = $total_price + (float)$row['total_price'];
    //     $con->query("update cart set quantity = '$new_quan', total_price = '$new_total_price' where product_id = '$prod_id' and email = '$_SESSION[ulogin]' ");
    // } 
    else {
        $sql = "insert into cart(product_id, email, quantity, total_price) values ('$prod_id', '$_SESSION[ulogin]', '$quantity', '$total_price')";
        $con->query($sql);
    }
    echo "<script>alert('Added to your cart!');</script>";
    }
?>