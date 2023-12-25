<head>
    <link rel="stylesheet" href="./css/cart.css">
</head>
<div class = "container1">
    <main>
        <section>
    <div class="titletable"><b>Your Cart Items</b></div>
    <?php
    include("./modules/cart.php");
    $sql = "select * from cart where bought = 0 and email = '$_SESSION[ulogin]' order by created_at desc ";
    $result = mysqli_query($con, $sql);
    $cart_price = 0;
    if ($result->num_rows > 0) {
        echo "<div class='cartitemdiv'>";
        echo "<table class='cartitem'>";
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['cart_id'];
            $sql1 = "select * from product where product_id = '$row[product_id]' limit 1";
            $result1 = mysqli_query($con, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $title = $row1['title'];
            $unit_price = (float) $row1['price'];
            $image = $row1['image'];
            $email = $row["email"];
            $quantity = (int) $row["quantity"];
            $total_price = $quantity * $unit_price;
            $cart_price += $total_price;
            echo " 
            <tr>
                <td class='productimage' rowspan=2>
                    <img src='./upload/$image'>
                </td>
                <td class='productname'> $title
                </td>
                <td class='productprice'> $unit_price đ</b>
                </td>
            </tr>
            <tr>
                <td class='quantity'>
                    <b>Quantity:</b> $quantity
                </td>
                <td>
                    <a href='index.php?page=cart&action=cartdelete&id=$id'>Remove</a>
                </td>
            <tr>
                <td class='subtotal' style = 'padding-top: 30px;'><b>Subtotal</b></td>
                <td></td>
                <td class='pricesubtotal'><span><b>  $total_price </span> đ</td></b>
            </tr>
                        </tr>
            <tr>
                <td colspan=3>
                    <hr>
                </td>
            </tr>
            "
            ;
        }
    echo "  
            </tr>
            <tr>
                <td class='subtotal'><b>Total</b></td>
                <td></td>
                <td class='pricesubtotal'><span><b> $cart_price </span> đ</td></b>
            </tr>
            <tr>
                <td colspan=3><a href='index.php?page=cart&action=makeorder&price=$cart_price'><button class='btn-cartitem'>Proceed to checkout</button></a></td>
            </tr>
        </table>
    </div>";
    } else {
        echo "<p style = 'color: red; margin-left: 25%;'>Nothing yet.</p>";
    }
    $con->close();
    ?>
</section>
    </main>
</div>
<?php
?>