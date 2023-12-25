<div class="addproduct-form-container">
    </style>
    <h3>Delete slider </h3>
    <hr>
    <?php $id = $_GET["id"];
    $sql = "select * from slider where slide_id = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <style>
        hr {
            margin-bottom: 20px;
        }

        h3 {
            margin-bottom: 10px;
        }

        h4 {
            display: inline;
            margin-right: 10px;

            margin-bottom: 20px;
        }

        span {
            text-align: left;
        }
    </style>
    <form action="" method="POST">
        <table border=0>
            <tr>
                <td style='width: 45%;'>
                    <?php echo "<h4>ID</h4> "; ?>
                </td>
                <td>
                    <?php echo "$row[slide_id]"; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo "<h4>Relevant product</h4> "; ?>
                </td>
                <td>
                    <?php
                    $sql = "select title from product where product_id = '$row[product_id]'";
                    $result = $con->query($sql);
                    $title = $result->fetch_row()[0];
                    echo "$title"; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo "<h4>Slide image</h4> "; ?>
                </td>
                <td>
                    <?php echo "<img src = '../upload/$row[image]'>"; ?>
                </td>
            </tr>

        </table>
        <input type="submit" name="delete_slider" value="Submit" class="add-submit-btn  submit-btn"></textarea>
        <input type="reset" name="reset" value="Reset" class="submit-btn"></input>
    </form>
    <?php
    if (isset($_POST['delete_slider'])) {
    $sql = "delete from slider where slide_id = '$id'";

    $result = $con->query($sql);
    if ($result)
    echo "<p style = 'color:red'>Deleted slider</p>";
        else
            echo $con->error;
    $con->close();
    }
    ?> 

</div>