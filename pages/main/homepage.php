
<style>
    a{
        text-decoration: none;
        color: black;
    }
    a:hover{
        text-decoration: none;
        color: black;
    }
</style>
<div class = "container1" style = "background-color: white;">
 <main>
    <div class="slider-and-best-seller-products">
        <div class="slider-container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $sql = "select * from slider order by created_at desc limit 3";
                    $result = mysqli_query($con, $sql);
                    $temp = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $temp++;
                        if ($temp==1){
                            echo "<div class='carousel-item active'>";
                            echo "<a href = 'index.php?page=product_details&id=$row[product_id]'>";
                            echo "<img class='d-block w-100' src='./upload/$row[image]'>";
                            echo "</a>";
                            echo "</div>";
                        }
                        else
                        {                       
                            echo "<div class='carousel-item'>";
                            echo "<a href = 'index.php?page=product_details&id=$row[product_id]'>";
                            echo "<img class='d-block w-100' src='./upload/$row[image]'>";
                            echo "</a>";
                            echo "</div>";         
                        }
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="best-seller-products ">
            <h5>You should take a look</h5>
            <ul class="best-seller-list">
                <?php
                $sql = "select * from product order by created_at desc limit 4 ";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    for ($i = 0; $i < $result->num_rows; $i++) {
                        $row = $result->fetch_row();
                        echo "<li class='best-seller-item  product-item'>";
                        echo "<a href = 'index.php?page=product_details&id=$row[0]'>";
                        $name = $row[2];
                        $img = $row[4];
                        $price = $row[3];
                        echo "<img src='./upload/$img'>";
                        echo "<p class='product-title'>".$name."</p>";
                        echo "<div class='product-price-container'>";
                        echo "<span>Price: </span>";
                        echo "<p class='product-price'>".$price."đ</p>";
                        echo "</div>";
                        echo "</a>";
                        echo "</li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <div  id = "all-product">
        <h4 style="display: inline;">All Products</h4>
        <hr>
        <div>
            <div class="showing-status-and-search">
                <div class="search-box">
                    <form action="" method = "POST">
                        <input type="search" name = "q" id="search" placeholder="Search something..." />
                        <input type="submit" class = "homepage-search-btn" value = "Search" name = "search">
                    </form>
                </div>
                <div class = "gr_by_cate">
                    <form action="" method = "POST">
                       <select name="cate"  style = "width: 200px; border-radius: 10px; padding: 10px; height: 50px; cursor: pointer;" id="">
                            <?php
                                $sql = "select * from category";
                                 $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value = '$row[category_id]'>$row[category_name]</option>";
                            }
                        ?>
                       </select>
                        <input type="submit" class = "homepage-search-btn" value = "View" name = "gr_by_cate">
                    </form>
                </div>
            </div>
            <div>
                <ul class="all-product-container">
                <?php
                
                if (isset($_POST["search"])) {
                    $shouldCallFunction = true;
                    $key = $_POST["q"];
                    $sql = "select * from product where title like '%$key%' ;";
                    unset($_POST["search"]);
                } 
                else 
                if (isset($_POST["gr_by_cate"])){
                        $shouldCallFunction = true;
                    $key = $_POST["cate"];
                    $sql = "select * from product where category_id = '$key' ";
                    unset($_POST["gr_by_cate"]);
                }
                else{
                        $shouldCallFunction = false;
                     $sql = "select * from product";
                }

                $result = $con->query($sql);
                if($result->num_rows>0){
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<li class='product-item'>";
                        echo "<a href = 'index.php?page=product_details&id=$row[product_id]'>";
                        echo "<img src='./upload/$row[image]'> 
                        <p class='product-title'>$row[title]</p>
                        <div class='product-price-container'>
                            <span>Price: </span>
                            <p class='product-price'>$row[price]đ</p>
                        </div>";
                        echo '</a>';
                        echo '</li>';
                    }
                }
                else{
                    echo "<p style= 'color:red'>No product founded!</p>";
                }
                echo "</ul>";

                ?>
            </div>
     <ul>
</main>
</div>
<?php
// Kiểm tra điều kiện PHP và thêm mã JavaScript nếu điều kiện đúng
if ($shouldCallFunction) {
    echo '<script>';
    echo 'window.onload = scrollToElement;';
    echo 'function scrollToElement() {';
    echo ' var targetElement = document.getElementById("all-product");
        if (targetElement) {
            targetElement.scrollIntoView();
            behavior: "smooth";
        }  ';
    echo '}';
    echo '</script>';
}
?>
