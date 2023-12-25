<?php
if (isset($_GET["action"]) && $_GET["action"] == "cartdelete") {
    $id = $_GET["id"];  
    $con->query("delete from cart where cart_id = '$id'");
    echo "<script>alert('Deleted from your cart');</script>";
}
if (isset($_GET["action"]) && $_GET["action"] == "makeorder"){
    $price = $_GET["price"];
    echo $cart_price;
    $sql = "insert into orders (fullname, email, phone_number, address, price) 
    values ('$_SESSION[name]', '$_SESSION[ulogin]', '$_SESSION[phone]', '$_SESSION[address]', '$price')";
    if (!$con->query($sql)) {
        echo "Error: " . $con->error;
    }
    else{
        $sql = "SELECT order_id FROM orders where email = '$_SESSION[ulogin]' ORDER BY order_date desc LIMIT 1";
        $result = $con->query($sql);
        $order_id = ($result)->fetch_row()[0];
        $sql = "update cart set order_id = '$order_id', bought = 1 where email = '$_SESSION[ulogin]' and bought = 0 ";
        if (!$con->query($sql)) {
            echo "Error: " . $con->error;
        }
        else{
            header("location: index.php?page=order&id=$order_id");
        }
    }
}
if (isset($_GET["action"]) && $_GET["action"] == "payment") {
    $order_id = $_GET["id"];
    $con->query("update orders set payment_status = 'paid' where order_id = '$order_id'");
    if (!$con) {
        echo "Error: " . $con->error;
    }
    echo "<script>alert('Order paid');</script>";
}
?>