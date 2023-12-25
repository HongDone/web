
<link rel="stylesheet" href="./css/profile.css">
<main class = "main" style = "padding-top: 10px;">
    <div class="container">
        <div class="infor">
            <form action="" name="profile" method="POST">
<?php include ("./modules/profile/profile.php"); ?>
                <h3>My Details</h3>
                <hr>
                <div class="admin-name">
                    <div class="full-name">
                        <p class="title">Full Name</p>
                        <?php
                        echo "<input type='text' name = 'name' maxlength='30' value= '$_SESSION[name]'>";
                        ?>
                    </div>
                </div>
                <div class="contact">
                    <div class="email">
                        <p class="title">Email</p>
                        <?php
                        echo "<input type='text' name = 'email' maxlength='30' value= '$_SESSION[email]'>";
                        ?>
                    </div>
                </div>
                <div class="user-name-container">
                    <div class="user-name">
                        <p class="title">Admin Name</p>
                        <?php
                        echo "<input type='text' name = 'ad_name' maxlength='30' value= '$_SESSION[login]'>";
                        ?>
                    </div>
                </div>
                <input type="submit" name = "submitPro" value="Update My Profile" class="update">
            </form>
        </div>
            <div class="update-password">
                <h3>Update Password</h3>
                <hr>
                <form action="" name="password" method="POST">
                    <div class="password-container">
                        <div class="password">
                            <input type="text" name = "cur_pass" class="current-password" placeholder="Your current password"
                                onfocus="clearPlaceHolder(this)">
                            <i class="fas fa-eye-slash   password-toggle-button"></i>
                        </div>
                        <div class="password">
                            <input type="text" name = "new_pass" class="new-password" placeholder="Enter your new password"
                                onfocus="clearPlaceHolder(this)">
                            <i class="fas fa-eye-slash  password-toggle-button"></i>
                        </div>
                        <div class="password">
                            <input type="password" name = "conf" class="confirm-password" placeholder="Confirm your new password"
                                onfocus="clearPlaceHolder(this)">
                        </div>
                    </div>
                    <input type="submit" name = "updatePass" value="Update My Password" class="update">
            </div>
        </div>
      </div>   
</main>

