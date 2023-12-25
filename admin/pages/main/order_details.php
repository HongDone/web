<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./css/order_details.css">
    <link rel="stylesheet" href="./css/order.css">

</head>
<?php
$order_id = $_GET["id"];
$sql = "select * from orders where order_id = '$order_id' limit 1";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
<main class = "main">
<div class="container2">
    <main style = 'font-size: 12pt'>
       

            <div id="main">

                <div id="detail">

                    <!-- CHI TIẾT ĐƠN HÀNG -->

                    <div class="row" style="margin-bottom: 0px">
                        <div class="col-6">
                            <h3>Oder Details</h3>
                        </div >
                        <?php
                            echo "<div style = 'text-align: right' text-right'>";
                            echo "<span class='payment_status $row[payment_status] ' style = 'padding: 7px; border-radius : 5px;'>
                            $row[payment_status]</span>";
                            echo "</div>";
                        
                        ?>
                    </div>
                    <div id="Oder-Details"></div>

                    <div class="row" id="info">
                        <div class="col-2">
                            <h4>Oder #</h4>
                        </div>
                        <div class="col-10">
                            <p class="big">
                                <?php echo $order_id; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row" id="info">
                        <div class="col-2">
                            <h4>Order Date</h4>
                        </div>
                        <div class="col-10">
                            <p class="big">
                                <?php echo $row['order_date']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row" id="info">
                        <div class="col-2">
                            <h4>SubTotal</h4>
                        </div>
                        <div class="col-10">
                            <p class="big price" >
                                <?php echo $row['price'];
                                echo "đ"; ?>
                            </p>
                        </div>
                    </div>

                    <h3 id="Oder-Details">Customer Details</h3>
                    <div class="row" id="info">
                        <div class="col-2">
                            <h4>Full name</h4>
                        </div>
                        <div class="col-10">
                            <p class="big">
                                <?php echo $row['fullname']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row" id="info">
                        <div class="col-2">
                            <h4>Email</h4>
                        </div>
                        <div class="col-10">
                            <p class="big">
                                <?php echo $row['email'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="row" id="info">
                        <div class="col-2">
                            <h4>Phone</h4>
                        </div>
                        <div class="col-10">
                            <p class="big">
                                <?php echo $row['phone_number']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row" id="info">
                        <div class="col-2">
                            <h4>Address</h4>
                        </div>
                        <div class="col-10">
                            <p class="big">
                                <?php echo $row['address']; ?>
                            </p>
                        </div>
                    </div>


                    <h3 id="Oder-Details">Oder Items</h3>
                    <?php
                    $sql = "select * from cart where order_id = '$order_id' ";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='row'>
                    <div class='col-3'>";
                        $sql1 = "select * from product where product_id = '$row[product_id]'";
                        $result1 = mysqli_query($con, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $image = $row1['image'];
                        $title = $row1['title'];
                        echo "<a href='#'><img src='../upload/$image' style = 'width: 300px; height: 200px;' class='img-fluid'></a>
                    ";
                        echo "</div> 
                    <div class='col-6'>
                        <p class='big'>$title<br>Qty: $row[quantity]</p>
                    </div>
                    <div class='col-3 text-right'>
                        <h3 >$row[total_price]đ</h3>
                    </div>
                </div>
                <div id='Oder-Details'></div>
                ";
                    }
                    ?>
                </div>
            </div>
       
    </main>
</div>
</main>
