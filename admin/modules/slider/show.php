
<div class="view-and-search">
    <div class = "gr-by-prod" style = "width: 700px;">
        <form action = "" method = "POST">
            <span>Group by product</span>
            <select name="prod" id="" style = "height: 35px ; font-size: 12pt; cursor: pointer; width: 400px; border-radius: 5px; padding-left: 10px;">
                <?php
                $sql = "select * from product";
                $result = $con->query($sql);
                for ($i = 0; $i < $result->num_rows; $i++){
                    $row = $result->fetch_row();
                        echo "<option value = '$row[0]'>$row[2]</option>";
                }
                ?>
            </select>
            <input type="submit" class="search_sub" value = "Submit" name = "prod_sub">
        </form>
    </div>
</div>
<div class="table-container" id="users-table-container">

    <table border=0 id="users-table">
        <thead>
            <tr>
                <th style="width: 15%;">ID
                </th>
                <th style="width: 45%;">Image
                </th>
                <th style="width: 20%;">Relevant Product
                </th>
                <th style="width: 20%;">Actions
                </th>
            </tr>
        </thead>
            <?php
            if(isset($_POST["prod_sub"])){
                $key = $_POST["prod"];
                $sql = "select * from slider where product_id = '$key'";
            } else {
                $sql = "select * from slider  order by created_at desc";
            }
            $result = mysqli_query($con, $sql);
            if ($result->num_rows < 1) {
                echo "<tr><td colspan = 4><p style = 'color: red'>No image founded!</p></td></tr>";
            } else {
                $temp = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $temp++;
                    if ($temp % 2 == 0) {
                        echo "<tr class = 'stripped-row'>";
                    } else {
                        echo "<tr>";
                    }
                    echo "<td >$row[slide_id]</td>
    
                    <td ><img src = '../upload/$row[image]'></td> ";
                    $sql1 = "select title from product where product_id = '$row[product_id]'";
                    $result1 = $con->query($sql1);
                    $title = $result1->fetch_row()[0];
                    echo "<td >$title</td>"
                    ;
                    echo "<td class = 'category-actions'>";
                    echo "<i class='fas fa-caret-down   actions-button'></i>";
                    echo "<ul class='category-actions-sub-menu'>";
                    echo "<a style = 'color:black; text-decoration:none' href = 'index.php?page=slider&action=update&id=" . $row['slide_id'] . " '>";
                    echo "<li>
                                    <i class='fas fa-edit '></i>
                                    <span>Edit</span>
                                </li>
                            </a>";
                    echo "<a style = 'color:black; text-decoration:none' href = 'index.php?page=slider&action=delete&id=" . $row['slide_id'] . " '>";
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
                <?php echo '<span class='page-value'>$temp images</span> 
            </div>
        </div>
    </div>
</main>";
            }
            $con->close();
            ?>
            <!-- <div class="pagingation-nav-container">
                <ul class="pagination-nav">
                    <li class="control-button  disabled" id="previous-button">
                        <a href="">Prev</a>
                    </li>
                    <li class="page-item actived">
                        <a href="">1</a>
                    </li>
                    <li class="page-item ">
                        <a href="">2</a>
                    </li>
                    <li class="page-item ">
                        <a href="">3</a>
                    </li>
                    <li class="control-button  " id="next-button">
                        <a href="">Next</a>
                    </li>
                </ul>
            </div> -->
</div>