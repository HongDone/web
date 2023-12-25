<div class="addproduct-form-container">
    <h4>Create new user</h4>
    <form action="" method="POST" >
        <input type="text"  name="email" required placeholder="Email (unique required)">
        <br>
        <input type="text"  name="fullname" required placeholder="Full name">
        <br>
        <input type="text"  name="phone" required placeholder="Phone number">
        <br>
        <input type="text"  name="address" required placeholder="Adress">
        <br>
        <input type="text"  name="password" required placeholder="Password">
        <br>
        <input type="submit" name="add_user" value="Submit" class="add-submit-btn  submit-btn"></textarea>
        <input type="reset" name="reset" value="Reset" class="submit-btn"></input>
    </form>
    <?php
    if (isset($_POST['add_user'])) {
        $password = md5($_POST['password']);
        $sql = "INSERT INTO user (email, fullname , phone_number, address ,password) 
        values ('$_POST[email]','$_POST[fullname]','$_POST[phone]', '$_POST[address]', '$password')";
        $result = $con->query($sql);
        if ($result) {
            echo "<p style = 'color:green'>User added succesfully!</p>";
        }
        else{
            echo "<p style = 'color:red'>This email is belonged to another user!</p>";
        }
        $con->close();
    }
    ?>

</div>