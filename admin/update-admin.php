<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br> <br>

        <?php
        $id = $_GET['id'];  //get id of selected admin
        $sql = "SELECT * FROM Grocery_admin WHERE id=$id";   //crate sql query to get the details

        $res = mysqli_query($conn, $sql);  //Execute the query
        //check the query is executed or not
        if ($res == true) {
            //check the data is available or not
            $count = mysqli_num_rows($res);

            //check we have admin data or not
            if ($count == 1) {
                //redirect to manage admin page
                // echo "Admin available";
                $row = mysqli_fetch_assoc($res);


                $full_name = $row['full_name'];
                $username = $row['username'];
            } else {
                header('location:' . SITEURL . 'admin/manageAdmin.php');
            }
        }


        ?>

        <form action="" method="POST">
            <table class="tbl-30">

                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>

                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <input type="submit" name="submit" value="Update Admin" class="btn-sec">
                    </td>

                </tr>
            </table>


        </form>
    </div>

</div>

<?php
//check whether the submit is clicked or not
if (isset($_POST['submit'])) {
    //echo "submit";
    //get all values form to update
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $sql = "UPDATE Grocery_admin SET 
    full_name = '$full_name',
    username = '$username' 
    WHERE id ='$id'
    ";

    //execute query
    $res = mysqli_query($conn, $sql);

    //check the query executed successfully or not
    if ($res == true) {
        //query executed and admin updated
        $_SESSION['update'] = "<div class='sucess'>Admin updated successfully.</div>";
        //redirect to manage admin page
        header('location:' . SITEURL . 'admin/manageAdmin.php');
    } else {
        //Failed to update admin
        $_SESSION['update'] = "<div class='error'>Failed to Delete admin.</div>";
        //redirect to manage admin page
        header('location:' . SITEURL . 'admin/manageAdmin.php');
    }
}


?>





<?php include('partials/footer.php'); ?>