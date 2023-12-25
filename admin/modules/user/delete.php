<div class="addproduct-form-container">
    </style>
    <h3>Delete user </h3>
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
                    <?php echo "<input type = 'password' name = 'password' placeholder = 'This user password'>"; ?>
                </td>
            </tr>
        </table>
        <p style = 'color: red'>If you choose to delete, you will delete all the information relevant to this user as cart items and orders.</p>
        <br>
        <input type="submit" name="delete_user" value="Submit" class="add-submit-btn  submit-btn"></textarea>
        <input type="reset" name="reset" value="Reset" class="submit-btn"></input>
    </form>
    <!-- <?php
    // if (isset($_POST['delete_user'])) {
    //     $sql = "delete from cart where email = '$email'";
    //     $result = ($con->query($sql));
    //     if ($result)
    //         echo "<p>Deleted cart items</p>";
    //      $sql = "delete from order where email = '$email'";
    //     $result = $con->query($sql);
    //     if ($result)
    //         echo "<p>Deleted order</p>";
    //     $sql = "delete from user where email = '$email'";
    //     $result = $con->query($sql);
    //     if ($result)
    //         echo "<p>Deleted cart user</p>";
    //     $con->close();
    // }
    ?> -->

</div>