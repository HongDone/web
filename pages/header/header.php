<?php
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    session_destroy();
    header("location: index.php");
}
?>
    <div class = "header">
        <div class="header-logo-brand-container">
            <a href="index.php">
                <img style = 'height: 140px; width: 130px; margin-top: 5px;' src="./images/Logo_web-removebg-preview.png" alt="">
            </a>
        </div>
        <div class="header-cart-and-user">
            <ul class="header-items-list">
                <li class="item">
                    <a href="index.php?page=cart">
                        <button class="cart-button  header-button">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </button>
                    </a> 
                </li>
                <li>
                    <button class="user-button  header-button" style="font-size: 14pt;">
                        <i class="fas fa-user-circle  user-infor"></i>
                    </button>
                    <ul class="user-infor-menu">
                        <a href="index.php?page=myprofile">
                            <li class="item" id="view-user-profile">
                            <i class="fas fa-user-edit    "></i>
                            My profile
                        </li>
                        </a>
                        <a href="index.php?page=myorder">
                        <li class="item" id="to-orders-page">
                            <i class="fas fa-receipt    "></i>
                            My orders
                        </li>   
                        </a>
                        <li class="item" id="user-log-out">
                            <a href="index.php?logout=1">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            Log out
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>