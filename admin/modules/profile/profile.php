<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitPro"]) ) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $ad_name = $_POST["ad_name"];
    $sql = "select * from admin where ad_name = '$ad_name' and ad_name != '$_SESSION[login]' ";
    $result = $con->query($sql);
    if ($result->num_rows > 0){
        echo '<p style = color:red;>This admin name is not available!</p>';
    }
    else{
        $sql = "select * from admin where ad_email = '$email' and ad_email != '$_SESSION[email]'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            echo '<p style = color:red;>This email is not available!</p>';
        }
        else{
            $sql = "update admin set ad_email = '$email', ad_name = '$ad_name', fullname = '$name' where ad_name = '$_SESSION[login]'  ";
            $result = $con->query($sql);
            if ($result == true) {
                echo '<p style = color:red;>Update successfully!</p>';
                $_SESSION["email"] = $email;
                $_SESSION["name"] = $name;
                $_SESSION["login"] = $ad_name;
            }
        }
    }
    $con->close();
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updatePass"])) {
        $cur_pass = md5($_POST["cur_pass"]);
        $new_pass = md5($_POST["new_pass"]);
        $conf = md5($_POST["conf"]);
        if ($cur_pass != $_SESSION["pass"]) {
            echo '<p style = color:red;>Wrong password!</p>';
        } else {
            if ($new_pass != $conf) {
                echo '<p style = color:red;>Confirm failed!</p>';
            } else {
                $sql = "update admin set ad_password = '$new_pass' where ad_name = '$_SESSION[login]'  ";
                $result = $con->query($sql);
                if ($result == true) {
                    echo '<p style = color:red;>Successfully changed!</p>';
                    $_SESSION["pass"] = $new_pass;
                }
            }
        }
    }
    $con->close();
}
?>