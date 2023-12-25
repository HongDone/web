<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $_SESSION["query"]  = $_POST["s_query"];
}

function show_single_product($result, $i)
{
    include("../config/connection.php");
    $sql = "select * from category";
    $row = mysqli_fetch_assoc($result);
    $id = $row['product_id'];
    $title = $row['title'];
    $image = $row['image'];
    $cate_id = $row['category_id'];
    $price = $row['price'];
    $sql = "select category_name from category where category_id = '$cate_id'";
    $cate_name = $con->query($sql)->fetch_row()[0];
    if ($i % 2 != 0) {
        echo "<tr class = 'stripped-row'>";
    } else {
        echo "<tr>";
    }
    echo "<td>$id</td>";
    echo "<td>$title</td>";
    echo "<td><img src='../upload/$image'</td>";
    echo "<td>$cate_name</td>";
    echo "<td>$price</td>";
    echo "<td class = 'product-actions'>";
    echo "<i class='fas fa-caret-down   actions-button'></i>";
    echo "<ul class='product-actions-sub-menu'>";
    echo "<a style = 'color:black; text-decoration:none' href = 'index.php?page=product&action=update&id=" . $id . " '>";
    echo "<li>
                                    <i class='fas fa-edit '></i>
                                    <span>Edit</span>
                                </li>
                            </a>";
    echo "<a style = 'color:black; text-decoration:none' href = 'index.php?page=product&action=delete&id=" . $id . " '>";
    echo "<li class='delete-button '>
                                    <i class='fas fa-trash   '></i>
                                    Delete
                                </li>
                            </ul>";
    echo "</td>";
    echo "</tr>";
    $con->close();
}
function show_all_product($result)
{
    for ($i = 0; $i < $result->num_rows; $i++) {
        show_single_product($result, $i);
    }
}
?>
<div class="view-and-search">
    <div class="search-box">
        <form method="POST" action="">
            <span>Find product</span>
            <input type="text" name="s_query" class="search-term" id="product-search-term">
            <input type="submit" name="search" class="search_sub" value="Search">
        </form>
    </div>
    <div class = "gr-by-category" style = "width: 500px;">
        <form action = "" method = "POST">
            <span>Group by category</span>
            <select name="sel_cate" id="" style = "height: 35px ; font-size: 12pt; cursor: pointer; width: 200px; border-radius: 5px; padding-left: 40px;">
                <?php
                $sql = "select * from category";
                $result = $con->query($sql);
                for ($i = 0; $i < $result->num_rows; $i++){
                    $row = $result->fetch_row();
                        echo "<option value = '$row[0]'>$row[1]</option>";
                }
                ?>
            </select>
            <input type="submit" class="search_sub" value = "Submit" name = "submit_gr_by_cate">
        </form>
    </div>
</div>
<div class="table-container" class="product-table-container">
    <table border=0 id="product-table">
        <thead>
            <tr>
                <th style="width: 10%;">ID
                </th>
                <th style="width: 25%;" >Product Name
                </th>
                <th style="width: 20%;">Image
                </th>
                <th style="width: 15%;">Category
                </th>
                <th style="width: 15%;">Price
                </th>
                <th style="width: 25;" id="product-actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $itemsPerPage = 5;
            if (isset($_GET['id'])) {
                $currentPage = $_GET['id'];
            } else {
                $currentPage = 1;
            }
            $offset = ($currentPage - 1) * $itemsPerPage;

            $temp = 0;
            if (isset($_POST["submit_gr_by_cate"])) {
                if (isset($_SESSION["query"]))
                    unset($_SESSION["query"]);
                $gr = $_POST["sel_cate"];
                $sql = "select * from product where category_id = '$gr' LIMIT $offset, $itemsPerPage ";
                $totalItemsQuery = "SELECT COUNT(*) as total FROM product where category_id = '$gr'";
                // $result = $con->query($sql);
                // if ($result->num_rows > 0) {
                //     $temp = $result->num_rows;
                //     show_all_product($result);
                // } else {
                //     echo "<tr><td colspan = 6 style = 'color: red; height: 35px;' >Found no products!</td></tr>";
                // }
                
            } else {
                if (isset($_SESSION["query"])) {
                    $sql = "select * from product where product_id like '%$_SESSION[query]%' or title like '%$_SESSION[query]%' LIMIT $offset, $itemsPerPage  ";
                    $totalItemsQuery = "SELECT COUNT(*) as total FROM product where product_id like '%$_SESSION[query]%' or title like '%$_SESSION[query]%'";
                }
                else{
                     $sql = "select * from product order by created_at desc LIMIT $offset, $itemsPerPage ";
                    $totalItemsQuery = "SELECT COUNT(*) as total FROM product";
                }   
                }
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                $temp = $result->num_rows;
                show_all_product($result);
            } else {
                echo "<tr><td colspan = 6 style = 'color: red; height: 35px;' >Found no products!</td></tr>";
            }
            $totalItemsResult = mysqli_query($con, $totalItemsQuery);
            $totalItems = mysqli_fetch_assoc($totalItemsResult)['total'];
            $totalPages = ceil($totalItems / $itemsPerPage);
            $con->close();
            ?>
        </tbody>
    </table>
</div>
<div class="pagination-container">
    <div class="showing-status">
        <span>Total: </span>
        <?php
        echo "<span class='value'>$temp</span>"
            ?>
        <span>products</span>
    </div>
    <?php
    echo "<div class='pagingation-nav-container'>";
    echo "<ul class='pagination-nav'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "
                    <a href='index.php?page=product&id=$i'>
                    <li class='page-item'>
                    
                    $i
                    
                    </li>
                    </a>
                    ";
    }
    echo "</ul>
        </div> ";
    ?>
</div>