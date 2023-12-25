<div class="addproduct-form-container">
    </style>
    <h3>Deactive user </h3>
    <hr>
    <?php $email = $_GET["id"];
    $sql = "select * from user where email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <style>
        hr{
             margin-bottom: 20px;
        }
        h3{
            margin-bottom: 10px;
        }
        h4{
            display:inline;
            margin-right: 10px;
            
             margin-bottom: 20px;
        }
        span{
            text-align: left;
        }
    </style>
    <form action="" method="POST">
        <table border = 0>
            <tr>
                <td style = 'width: 45%;'>
                    <?php echo "<h4>Email</h4> ";?>
                </td>
                <td>
                    <?php echo "$row[email]"; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo "<h4>Full name</h4> ";?>
                </td>
                <td>
                    <?php echo "$row[fullname]"; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo "<h4>Phone number</h4> ";?>
                </td>
                <td>
                    <?php echo "$row[phone_number]"; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo "<h4>Address</h4> ";?>
                </td>
                <td>
                    <?php echo "$row[address]"; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo "<h4>Confirm password</h4> ";?>
                </td>
                <td>
                    <?php echo "<input type = 'password' required name = 'password' placeholder = 'This user password'>"; ?>
                </td>
            </tr>
        </table>
        <p style = 'color: red'>If you choose to deactive, they won't be able to login again.</p>
        <br>
        <input type="submit" name="deactive_user" value="Submit" class="add-submit-btn  submit-btn"></textarea>
        <input type="reset" name="reset" value="Reset" class="submit-btn"></input>
    </form>
    <?php
    if (isset($_POST['deactive_user'])) {
        $pass = md5($_POST['password']);
        $sql = "select * from user where password = '$pass' and email = '$row[email]'";
         $result = ($con->query($sql));
         if ($result->num_rows>0){
            $sql = "update user set is_active = 0 where password = '$pass' and email = '$row[email]'";
            echo "<p style = 'color:green'>Deactived user!</p>";
         }
         else{
            echo "<p style = 'color:red'>Wrong password!</p>";
         }
    }
    ?> 

</div>