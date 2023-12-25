<?php
if (isset($_GET["page"])){
    $temp = $_GET["page"];
}
else {
    $temp = '';
}
     
if ($temp == "login"){
    include("main/login.php");
}
else
if ($temp == "register"){
    include("main/register.php");
}
else
if ($temp == "forgotpassword"){
    include("main/forgotpassword.php");
}
else
if ($temp == "product_details") {
    include("main/product_details.php");
}
else
if ($temp == "resetpassword") {
    include("main/resetpassword.php");
}
else if ($temp == "myprofile") {
                if (isset($_SESSION["ulogin"])) {
                    include("main/myprofile.php");
                } else {
                    header("location:index.php");
                    include("main/homepage.php");
                }
            }
else
 if ($temp == "cart"){
        if (isset($_SESSION["ulogin"])) {
            include ("main/cart.php");
        }
        else{
            header("location: index.php?page=login");
        }
}
else
if ($temp == "order") {
    if (isset($_SESSION["ulogin"])) {
        include("main/order.php");
    } else {
        header("location: index.php?page=login");
    }
}
else
if ($temp == "myorder") {
    if (isset($_SESSION["ulogin"])) {
        include("main/myorder.php");
    } else {
        header("location: index.php?page=login");
    }
}
else

{
    include("main/homepage.php");
    
}

?>