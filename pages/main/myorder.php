<head>
    <link rel="stylesheet" href="./css/myorder.css">
</head>
<div class = "container1">
    <main>

<section>
    <h1 class="titletable">My orders</h1>
    <table class="orderinfor">
        <style>
            th{
                text-align:center
            }
        </style>
        <tr >
            <th   style ="text-align:center">Order #</th>
            <th><b>Date</b></th>
            <th><b>Status</b></th>
            <th><b>SubTotal</b></th>
            <th><b>Items</b></th>
            <th><b>Actions</b></th>
        </tr>
        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>
        <?php
        include "./modules/cart.php";
        $sql = "select * from orders where email = '$_SESSION[ulogin]' order by order_date desc";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows < 1) {
            echo "<tr><td colspan = 6><p style = 'color: red'>No order yet!</p></td></tr>";
        }
        else {
            $temp = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $temp++;
                echo "<tr>   
                       <td  class='ordernumber' style = 'text-align:center'><a href='index.php?page=order&id=$row[order_id]'>$row[order_id]</a></td>
                        <td class='orderdate'>$row[order_date]</td>
                        <td class='status'>
                        <span class='span-status'>
                        $row[payment_status]
                        </span>
                        </td>
            <td class='subtotal'><span>$row[price]</span>đ</td>";
                $items = $con->query("select count(*) from cart where order_id = '$row[order_id]'")->fetch_row()[0];
            echo "<td class='quantity'>$items item(s)</td>
            <td class='action'>";
                if ($row['payment_status'] == "unpaid") {
                    echo "<a href = 'index.php?page=myorder&action=payment&id=$row[order_id]'><button class='btn-action'>Pay</button></a>";
                }         
                echo "</td>
        </tr>
        <tr>
            <td colspan='6'>
                <hr>
            </td>
        </tr>";
            }
            echo "</table>";
            echo "<p style='margin-left: 200px'> Total: $temp orders</p>";
        }
        ?>

</section>
</main>
</div>
