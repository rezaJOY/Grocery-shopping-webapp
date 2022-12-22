<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //Display session msg if set
            unset($_SESSION['add']); // remove session msg
        }


        ?>



        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>

                </tr>
                <tr>
                    <td>User name:</td>
                    <td><input type="text" name="username" placeholder="Your Username"></td>

                </tr>

                <tr>

                    <td> Password: </td>
                    <td><input type="password" name="password" placeholder="Your Password"></td>

                </tr>
                <tr>
                    <td colspan="2"> </td>
                    <td><input type="submit" name="submit" placeholder="Add admin" class="btn-sec"></td>

                </tr>




            </table>


        </form>


    </div>




</div>





<?php include('partials/footer.php'); ?>

<?php

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //md5 password encryption

    //sql query to save the data in database

    $sql = "INSERT INTO Grocery_admin SET 
        full_name='$full_name', 
        username='$username',
        password='$password'
        ";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($res == TRUE) {
        //echo "Data inserted";
        $_SESSION['add'] = "Admin added successfully";
        header("location:" . SITEURL . 'admin/manageAdmin.php');
    } else {
        //echo "Failed to insert Data";
        $_SESSION['add'] = "Failed to add admin";
        header("location:" . SITEURL . 'admin/manageAdmin.php');
    }
}
?>