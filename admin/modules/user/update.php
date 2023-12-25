<div class="addproduct-form-container">
    </style>
    <span>Update user </span>
    <?php $email = $_GET["id"];
    $sql = "select * from user where email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <form action="" method="POST">
        <?php echo "<input name='email' type='text'value = '$row[email]' required placeholder = 'User email (unique required)'>" ?>
        <br>
        <?php echo "<input type='text' name = 'fullname' required value = '$row[fullname]'placeholder = 'User fullname'   > " ?>
        <br>
        <?php echo "<input type='text' name = 'phone' required value = '$row[phone_number]'  placeholder = 'Phone number'  > " ?>
        <br>
        <?php echo "<input type='text' name = 'address' required value = '$row[address]' placeholder = 'Address'   > " ?>
        <br>
        <input type="submit" name="update_user" value="Submit" class="add-submit-btn  submit-btn"></textarea>
        <input type="reset" name="reset" value="Reset" class="submit-btn"></input>
    </form>
    <?php
    if (isset($_POST['update_user'])) {
        $new_email = $_POST['email'];
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        if ($new_email == $email){
            $sql = "update user set fullname = '$fullname', phone_number = '$phone', address = '$address' where email = '$email'";
        }
        else{
            $sql = "update user set email = '$new_email', fullname = '$fullname', phone_number = '$phone', address = '$address' where email = '$email'";
        }
        $result = $con->query($sql);
        if ($result){
            echo "<p style = 'color: green'>Update user successfully!</p>";
        }
        else {
            echo "<p style = 'color: red'>This email is belonged to another user!</p>";
        }
        $con->close();
    }
    ?>

</div>

