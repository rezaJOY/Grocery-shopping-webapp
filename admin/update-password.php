<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>


        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        ?>


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="current password">
                    </td>
                </tr>
                <tr>
                    <td>New password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="new password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="confirm password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-sec">





                    </td>

                    </td>
                </tr>


            </table>
        </form>
    </div>


</div>



<?php
if (isset($_POST['submit'])) {
    //echo 'clicked';

    //get the data from form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);   //md5 is encryption
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);



    //check the user with current id and pass exists

    $sql = "SELECT * FROM Grocery_admin WHERE id=$id AND password='$current_password'";
    //execute the query
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            //echo "User found";
            //user exist and password can be changed
            //chechk it matchs or not
            if ($new_password == $confirm_password) {
               $sql2="UPDATE Grocery_admin SET
               password='$new_password'
               WHERE id=$id
               ";

               //execute the query
               $res2=mysqli_query($conn, $sql2);


               if($res2==true){
                $_SESSION['change-pwd'] = "<div class='success'> password changed successfully. </div>";

                //redirect the user
                header('location:' . SITEURL . 'admin/manageAdmin.php');

               }
               else{
                $_SESSION['change-pwd'] = "<div class='error'> Failed to change password. </div>";

                //redirect the user
                header('location:' . SITEURL . 'admin/manageAdmin.php');

               }


            } else {
                $_SESSION['pwd-not-match'] = "<div class='error'> password did not match. </div>";

                //redirect the user
                header('location:' . SITEURL . 'admin/manageAdmin.php');
            }
        } 
        else {

            $_SESSION['user-not-found'] = "<div class='error'> user not found. </div>";

            //redirect the user
            header('location:' . SITEURL . 'admin/manageAdmin.php');
        }
    }




    //check the user matches or not


    //change is all above is true
}

?>




<?php include('partials/footer.php'); ?>