<?php
if (isset($_GET['logout'])&&$_GET['logout']==1){
    session_destroy();
    $con->close();
    header("location: login.php");
}
?>
<nav class="navbar">
    <i class="fa-solid fa-bars" id="sidebar-close"></i>
    <div class="admin-control">
        <i class="fa fa-user-circle  actions-button" aria-hidden="true"></i>
        <ul class="admin-action">
            <a href="index.php?page=profile" style = "text-decoration: none; color: black;">
            <li id="view-admin-profile">
                <i class="fas fa-user-edit    "></i>
                My profile
            </li>
            </a>
            <li id="admin-log-out">
                <a href="index.php?logout=1" style = "text-decoration: none; color: black;">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Log out 
                </a>
            </li>
        </ul>
    </div>
</nav>