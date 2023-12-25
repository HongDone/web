<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $_SESSION["query"]  = $_POST["s_query"];
}
if (isset($_GET["action"])){
    unset($_GET["action"]);
}

?>
<div class="view-and-search">
    <div class="search-box">
        <form method="POST" action="">
            <span>Find user: </span>
            <input type="text" name="s_query" class="search-term" id="product-search-term">
            <input type="submit" name="search" class="search_sub" value="Search">
        </form>
    </div>
</div>
<div class="table-container" id="users-table-container">
    <table border=0 id="users-table">
        <thead>
            <tr>
                <th style="width: 15%;">Email
                </th>
                <th style="width: 25%;">Full Name
                </th>
                <th style="width: 20%;">Phone Number
                </th>
                <th style="width: 20%;">Address
                </th>
                <th style="width: 20%;">Actions</th>
            </tr>
            <?php
            $itemsPerPage = 5;
            if (isset($_GET['id'])) {
                $currentPage = $_GET['id'];
            } else {
                $currentPage = 1;
            }
            $offset = ($currentPage - 1) * $itemsPerPage;

            if (isset($_POST["s_query"])) {
                $sql = "select * from user where email  like  '%$_POST[s_query]%'
         or fullname  like  '%$_POST[s_query]%' or phone_number  like  '%$_POST[s_query]%' or address  like  '%$_POST[s_query]%'
        order by created_at desc LIMIT $offset, $itemsPerPage";
                $totalItemsQuery = "SELECT COUNT(*) as total FROM user  where email  like  '%$_POST[s_query]%'
         or fullname  like  '%$_POST[s_query]%' or phone_number  like  '%$_POST[s_query]%' or address  like  '%$_POST[s_query]%'
        order by created_at ";
                unset($_POST["s_query"]);
            } else {
                $sql = "select * from user  order by created_at desc LIMIT $offset, $itemsPerPage";
                $totalItemsQuery = "SELECT COUNT(*) as total FROM user ";
            }

            $result = mysqli_query($con, $sql);
            if ($result->num_rows < 1) {
                echo "<tr><td colspan = 6><p style = 'color: red'>No user founded!</p></td></tr>";
            } else {
                $temp = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $temp++;
                    if ($temp % 2 == 0) {
                        echo "<tr class = 'stripped-row'>";
                    } else {
                        echo "<tr>";
                    }
                    echo "<td >$row[email]</td>
    
                    <td >$row[fullname]</td>

                    <td >$row[phone_number]</td>
                    <td>$row[address] </td>";
                    echo "<td class = 'category-actions'>";
                    echo "<i class='fas fa-caret-down   actions-button'></i>";
                    echo "<ul class='category-actions-sub-menu'>";
                    echo "<a style = 'color:black; text-decoration:none' href = 'index.php?page=user&action=update&id=" . $row['email'] . " '>";
                    echo "<li>
                                    <i class='fas fa-edit '></i>
                                    <span>Edit</span>
                                </li>
                            </a>";
                    echo "<a style = 'color:black; text-decoration:none' href = 'index.php?page=user&action=delete&id=" . $row['email'] . " '>";
                    echo "<li class='delete-button '>
                                    <i class='fas fa-trash   '></i>
                                    Delete
                                </li>
                            </ul>";
                    echo "</td>";
                    "</tr>";
                }
                echo "</table>
        </div>
        <div class='pagination-container'>
            <div class='showing-status'>
                <span>Total: </span>
                <?php echo '<span class='page-value'>$temp users</span> 
            </div>";

            $totalItemsResult = mysqli_query($con, $totalItemsQuery);
            $totalItems = mysqli_fetch_assoc($totalItemsResult)['total'];
            $totalPages = ceil($totalItems / $itemsPerPage);
                echo "<div class='pagingation-nav-container'>";
                echo "<ul class='pagination-nav'>";
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "
                    <a href='index.php?page=user&id=$i'>
                    <li class='page-item'>
                    
                    $i
                    
                    </li>
                    </a>
                    ";
                }
                echo "</ul>
            </div> ";
        
    echo"</div>
    </div>
</div>";
}
 $con->close();
?>
</div>