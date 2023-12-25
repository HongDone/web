<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $_SESSION["query"] = $_POST["s_query"];
}

function show_single_category($result, $i){
    include("../config/connection.php");
    $row = $result->fetch_row();
    $id = $row[0];
    $name = $row[1];
    $sql = "select count(*) from product where category_id = '$id' order by category_id desc";
    $total_prods = $con->query($sql)->fetch_row()[0];
    if ($i % 2 != 0) {
        echo "<tr class = 'stripped-row'>";
    } else {
        echo "<tr>";
    }
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    echo "<td>$total_prods</td>";
    echo "<td class = 'category-actions'>";
    echo "<i class='fas fa-caret-down   actions-button'></i>";
    echo "<ul class='category-actions-sub-menu'>";
    echo "<a style = 'color:black; text-decoration:none' href = 'index.php?page=category&action=update&id=".$id." '>";
                               echo "<li>
                                    <i class='fas fa-edit '></i>
                                    <span>Edit</span>
                                </li>
                            </a>";
    echo "<a style = 'color:black; text-decoration:none' href = 'index.php?page=category&action=delete&id=".$id." '>";
                                echo "<li class='delete-button '>
                                    <i class='fas fa-trash   '></i>
                                    Delete
                                </li>
                            </ul>";
    echo "</td>";
    echo "</tr>";
    $con->close();
}
function show_all_category($result){
    for ($i = 0; $i < $result->num_rows; $i++) {
        show_single_category($result, $i);
    }
}
?>
<div class="view-and-search">
    <div class="search-box">
        <form method="POST" action="">
            <span>Find categories</span>
            <input type="text" name="s_query" class="search-term" id="category-search-term">
            <input type="submit" name="search" class="search_sub" value="Search">
        </form>
    </div>
</div>
<div class="table-container" id="category-table-container">
    <table border=0 id="category-table">
        <thead>
            <tr>
                <th style="width: 10%;" id="category-id">ID
                </th>
                <th style="width: 20%;" id="title">Category Name
                </th>
                <th style="width: 15%;" id="total_pro">Total Product
                </th>
                <th style="width: 15%;" id="category-actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $temp = 0;
            if (isset($_SESSION["query"])) {
                $sql = "select * from category where category_id like '%$_SESSION[query]%' or category_name like '%$_SESSION[query]%' ";
                $totalItemsQuery = "SELECT COUNT(*) as total FROM category where category_id like '%$_SESSION[query]%' or category_name like '%$_SESSION[query]%' ";
            } else {
                $sql = "select * from category order by category_id desc ";
                $totalItemsQuery = "SELECT COUNT(*) as total FROM category";             
            }
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                $temp = $result->num_rows;
                show_all_category($result);
            } else {
                echo "<tr><td colspan = 4 style = 'color: red; height: 35px;' >Let create firt category!</td></tr>";
            }
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
        <span>categories</span>
</div>
