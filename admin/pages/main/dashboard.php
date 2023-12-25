
<link rel="stylesheet" href="./css/dashboard.css">
<main class="main">
    <div class="container2">
        <div class="dashboard">
            <div class="heading">
                <h2 style="display: inline;">Dashboard</h2>
            </div>
            <div id="gerenal-infor">
                <div class="sub-container  custom-background">
                    <p class="cell-title">Active Customers</p>
                    <p class="value" id="active-customers">
                        <?php
                        $sql = "select count(*) from user";
                        $result = $con->query($sql);
                        echo $result->fetch_row()[0];
                        ?>
                    </p>
                </div>
                <div class="sub-container  custom-background">
                    <p class="cell-title">Active Products</p>
                    <p class="value" id="active-products">
                        <?php
                        $sql = "select count(*) from product  ";
                        $result = $con->query($sql);
                        echo $result->fetch_row()[0];
                        ?>
                    </p>
                </div>
                <div class="sub-container  custom-background">
                    <p class="cell-title">Orders</p>
                    <p class="value" id="orders">
                        <?php
                        $sql = "select count(*) from orders ";
                        $result = $con->query($sql);
                        echo $result->fetch_row()[0];
                        ?>
                    </p>
                </div>
                <div class="sub-container  custom-background">
                    <p class="cell-title">Total Income</p>
                    <p class="value" id="total-income">
                        <?php
                        $sql = "select sum(price) from orders where payment_status = 'paid' ";
                        $result = $con->query($sql);
                        echo ((int)$result->fetch_row()[0]/1000000)."tr";
                        ?>
                    </p>
                </div>
            </div>
            <div id=recently-infor>
                <div id="latest-orders" class="custom-background">
                    <h4 class="title-of-recentlty-infors">Latest Orders</h4>
                    <ul id="latest-orders-list">
                    <?php
                        $sql = "select * from orders order by order_date desc limit 5";
                        $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<li class='latest-order-infor'>
                            <div class='component-order-infor'>";
                        echo "<span class='order-number'>Order #$row[order_id]</span>";
                        $sql1 = "SELECT COUNT(*) FROM cart where order_id= '$row[order_id]'";
                        $result1 = $con->query($sql1);
                        echo "<span class='number-of-items'>" . $result1->fetch_row()[0] . " items</span><br>";
                        echo "<span class='created-day'>Created: </span>$row[order_date]<br>";
                        echo "<span class='owner'>Created by: $row[email]</span>";
                        echo "</div>";
                        echo "<div class='total-price'>$row[price]đ</div>";
                        echo "</li>";
                    }
                    ?>      

                    </ul>
                </div>
                <div id="latest-customers" class="custom-background">
                    <h4 class="title-of-recentlty-infors">Latest Customers</h4>
                    <ul id="latest-customers-list">
                        <?php
                        $sql = "select * from user order by created_at limit 5";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)){
                            echo "<li class='latest-customer-infor'>";
                            echo "<div class='customer-icon-container'>";
                            echo "<i class='fas fa-user-alt   '></i>" . "</div>";
                            echo "<div class='customer-infors'>";
                            echo "<h4>$row[fullname]</h4>";
                            echo "<p>$row[email]</p>";
                            echo "</div>";
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>