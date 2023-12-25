<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $_SESSION["query"] = $_POST["s_query"];
}

?>
<link rel="stylesheet" href="./css/order.css">
<main class="main">
    <div class="container2">
        <div class="orders">
            <h2 style="display: inline;">Order</h2>
        </div>
        <div class="view-and-search">
        <form method="POST" action="">
            <span>Find order</span>
            <input type="text" style = 'width: 200px' name="s_query" class="search-term" id="product-search-term">
        <input type="submit" name="search" class="search_sub" value="Search">
        </form>
        <div class = "gr-by-category" style = "width: 500px;">
        <form action = "" method = "POST">
            <span>Group by status</span>
            <select name="status" id="" style = "height: 35px ; font-size: 12pt; cursor: pointer; width: 200px; border-radius: 5px; padding-left: 40px;">
                <option value = "paid">Paid</option>
                <option value = "unpaid">Unpaid</option>
            </select>
                <input type="submit" class="search_sub" value="Submit" name="submit_gr_by_status">
            </form>
            </div>
        </div>
        <div class="table-container " id="orders-table-container">
            <table border=0 id="orders-table">
                <tr>
                    <th style="width: 10%;" id="order-id">ID
                    </th>
                    <th style="width: 20%;" id="owner">Customer Email
                    </th>
                    <th style="width: 20%;" id="order-price">Price
                    </th>
                    <th style="width: 15%;" id="payment-status">Payment Status</th>
                    <th style="width: 20%;" id="order-date">Order Date
                    </th>
                    <th style="width: 15%;" id="order-actions">Actions</th>
                </tr>
     <?php
     $itemsPerPage = 5;
     if (isset($_GET['id']) && is_numeric($_GET['id'])) {
         $currentPage = $_GET['id'];
     } else {
         $currentPage = 1;
     }

     $offset = ($currentPage - 1) * $itemsPerPage;

     if (isset($_POST["submit_gr_by_status"])) {
         $key = $_POST["status"];
         unset($_POST["submit_gr_by_status"]);

         $sql = "select * from orders where payment_status = '$key' order by order_date desc LIMIT $offset, $itemsPerPage";
         $totalItemsQuery = "SELECT COUNT(*) as total FROM orders where payment_status = '$key'";
     } else {
         if (isset($_SESSION["query"]) && $_SESSION["query"] != '') {
             if (isset($_SESSION["query"])) {
                 $totalItemsQuery = "SELECT COUNT(*) as total FROM orders where email  like  '%$_SESSION[query]%'";
                 $sql = "SELECT * FROM orders where email like '%$_SESSION[query]%' LIMIT $offset, $itemsPerPage";
             }
         } else {

             $sql = "SELECT * FROM orders LIMIT $offset, $itemsPerPage";
             $totalItemsQuery = "SELECT COUNT(*) as total FROM orders";
         }
         unset($_SESSION["query"]);
     }
    $result = mysqli_query($con, $sql);
    if ($result->num_rows < 1) {
        echo "<tr><td colspan = 6><p style = 'color: red'>No order founded!</p></td></tr>";
    }
        else {
            $temp = 0 ;
            while ($row = mysqli_fetch_assoc($result)) {
                $temp++;
                if ($temp%2==0){
                 echo "<tr class = 'stripped-row'>";
                }
                else
                {
                    echo "<tr>";
                }
                echo "<td >$row[order_id]</td>
    
                    <td >$row[email]</td>

                    <td >$row[price]</td>
                    <td> ";
                if ($row['payment_status']=='paid'){
                    echo "<div class='payment-status  paid '>Paid</div>";
                }
                else {
                     echo "<div class='payment-status unpaid '>Unpaid</div>";
                }
                        
                   echo "</td>
                    <td class='order-date'>$row[order_date]</td>
                   
                    <td class='order-actions'>
                     <a style = 'color:blue' href='index.php?page=order_details&id=$row[order_id]'>
                        <i class='fas fa-eye   view-details' ></i>
                    </a>
                    </td>
                </tr>";
         }
         
         echo "</table>
        </div>";
         $totalItemsResult = mysqli_query($con, $totalItemsQuery);
         $totalItems = mysqli_fetch_assoc($totalItemsResult)['total'];
         $totalPages = ceil($totalItems / $itemsPerPage);
         echo ($totalItems);
         echo $totalPages;
        echo "<div class='pagination-container'>
            <div class='showing-status'>
                <span>Total: </span>
                <?php echo '<span class='page-value'>$temp orders</span> 
            </div>";
        echo "<div class='pagingation-nav-container'>";
        echo "<ul class='pagination-nav'>";
       
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "
                    <a href='index.php?page=order&id=$i'>
                    <li class='page-item'>
                    
                    $i
                    
                    </li>
                    </a>
                    ";
        }
        
        echo "</ul>
        </div> ";
        echo "</div>
    </div>
</main>";
         $con->close();
     }
     
     ?>        

