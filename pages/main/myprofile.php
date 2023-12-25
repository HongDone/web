<head>
    <link rel="stylesheet" href="./css/myprofile.css">
</head>
<div class = "container1">
    <main>
<div class="myprofile-container">
    <div class="infor">
        <?php include "./modules/myprofile.php"?>
        <form action="" name="profile" method="POST">
            <h3 class = "label">My Profile</h3>
            <hr>
            <div class = "name">
                <div class="full-name">
                    <p class="title">Full Name</p>
                    <?php
                    echo "<input type='text' name = 'name' maxlength='100' value = '$_SESSION[name]'>";
                    ?>
                </div>
            </div>
            <div class="contact">
                <div class="email">
                    <p class="title">Email</p>
                    <?php
                    echo "<input type='text' name = 'email' maxlength='30' value='$_SESSION[ulogin]'>";
                    ?>
                </div>
                <div class="phone-number">
                    <p class="title"> Phone Number</p>
                    <?php
                    echo "<input type='text' name = 'phone' maxlength='11' value='$_SESSION[phone]'>";
                    ?>
                </div>
            </div>
            <div class = "address-cont">
                <div class="address">
                    <p class="title">Address</p>
                    <?php
                    echo "<input type='text'style = 'width:96%' name = 'address' maxlength='100' value = '$_SESSION[address]'>";
                    ?>
                </div>
            </div>
            <input type="submit" style = 'width : 97%;' name = "profUpdate" value="Update My Profile" class="update" style="width: 100%;">
        </form>
    </div>
    <div class="update-password">
            <h3 class = "label">Update Password</h3>
            <hr>
            <form action="" name="password" method="POST">
                <div class="password-container">
                    <div class="password">
                        <input type="text" name = "cur_pass" class="current-password" placeholder="Your current password"
                            onfocus="clearPlaceHolder(this)">
                        <i class="fas fa-eye   password-toggle-button"></i>
                    </div>
                    <div class="password">
                        <input type="text" name = "new_pass" class="new-password" placeholder="Enter your new password"
                            onfocus="clearPlaceHolder(this)">
                        <i class="fas fa-eye   password-toggle-button"></i>
                    </div>
                    <div class="password">
                        <input type="password" name = "conf_pass" class="confirm-password" placeholder="Confirm your new password"
                            onfocus="clearPlaceHolder(this)">
                    </div>
                </div>
                <input type="submit"  name = "passUpdate" value="Update My Password" class="update" style="width: 100%;">
            </form>
    </div>

</div>
</main>
</div>

