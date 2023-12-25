<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["profUpdate"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $sql = "select * from user where email = '$email' and email != '$_SESSION[ulogin]'";
    $result = $con->query($sql);
    if ($result->num_rows>0)
    {
        echo "'<p style = color:red;>This email has been taken, please try another one!</p>";
    }
    else{
        $sql = "update user set email = '$email', fullname = '$name', phone_number = '$phone', address = '$address' where email = '$_SESSION[ulogin]'  ";
        $result = $con->query($sql);
        if ($result == true) {
            echo '<p style = color:red;>Update successfully!</p>';
            $_SESSION["ulogin"] = $email;
            $_SESSION["name"] = $name;
            $_SESSION["phone"] = $phone;
            $_SESSION["address"] = $address;
        }
    }
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["passUpdate"])) {
        $cur_pass = md5($_POST["cur_pass"]);
        $new_pass = md5($_POST["new_pass"]);
        $conf_pass = md5($_POST["conf_pass"]);
        if ($cur_pass != $_SESSION["pass"]) {
            echo '<p style = color:red;>Wrong password!</p>';
        } else {
            if ($new_pass != $conf_pass) {
                echo '<p style = color:red;>Confirm failed!</p>';
            } else {
                $sql = "update user set password = '$new_pass' where email = '$_SESSION[ulogin]'  ";
                $result = $con->query($sql);
                if ($result == true) {
                    echo '<p style = color:red;>Successfully changed!</p>';
                    $_SESSION["pass"] = $new_pass;
                }
            }
        }
    }
}
?>