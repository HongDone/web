<?php


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
            <input type="text" name="q" class="search-term" id="product-search-term">
            <input type="submit" name="search" class="search_sub" value="Search">
        </form>
    </div>
    <div class = "gr-by-category" style = "width: 500px;">
        <form action = "" method = "POST">
            <span>Group by category</span>
            <select name="cate" id="" style = "height: 35px ; font-size: 12pt; cursor: pointer; width: 200px; border-radius: 5px; padding-left: 40px;">
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

            $temp = 0;
            if (isset($_POST["search"])) {
                $key = $_POST["q"];
                $sql = "select * from product where title like '%$key%' ;";
                unset($_POST["search"]);
            } else
                if (isset($_POST["submit_gr_by_cate"])) {
                    $key = $_POST["cate"];
                    $sql = "select * from product where category_id = '$key' ";
                    unset($_POST["submit_gr_by_cate"]);
                } else {
                    $shouldCallFunction = false;
                    $sql = "select * from product";
                }
         
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                $temp = $result->num_rows;
                show_all_product($result);
            } else {
                echo "<tr><td colspan = 6 style = 'color: red; height: 35px;' >Found no products!</td></tr>";
            }

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
</div>