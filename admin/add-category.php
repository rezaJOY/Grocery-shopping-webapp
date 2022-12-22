<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>


        <br> <br>

        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }


        ?>
        <br>
        <!-- ADD CATEGORY FORM STARTS  -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>

                    <td>Select image:</td>
                    <td>
                        <input type="file" name="image">
                        <!--!hereee  -->
                    </td>
                    

                    

                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add category" class="btn-sec">
                    </td>
                </tr>




            </table>




        </form>

        <?php

        if (isset($_POST['submit'])) {
            //  echo 'joyyyy';
            $title = $_POST['title'];


            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "No";
            }

            if (isset($_POST['active'])) {

                $active = $_POST['active'];
            } else {

                $active = "No";
            }

            // print_r($_FILES['image']);
            //  die();
           if (isset($_FILES['image']['name'])) {
                //tp uploAD THE IMAGE WE NEED IMAGE NAME AND SOURCE PATH AND DESTINATION PATH

               $image_name = $_FILES['image']['name'];
              $ext = end(explode('.', $image_name));

               $image_name = "food_category_" . rand(000, 999) . '.' . $ext;


                $source_path = $_FILES['image']['tmp_name'];


                $destination_path = "../images/Category/" . $image_name;
                //finally upload yhe image
                $upload = move_uploaded_file($source_path, $destination_path);
                if ($upload == false) {
                 $_SESSION['upload'] = "<div class='error'>Failed to Upload image.</div>";

               header('location:' . SITEURL . 'admin/add-category.php');
                    //die();
              }
            } else {

                $image_name = ' ';
            }




            //sql query to insert into database

            $sql = "INSERT INTO Grocery_category SET
       title='$title',
       image_name='$image_name',
       featured='$featured',
       active='$active'
       ";

            $res = mysqli_query($conn, $sql);

            //check executed on not added or not

            if ($res == true) {
                $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                header('location:' . SITEURL . 'admin/manageCategory.php');
            } else {
                $_SESSION['add'] = "<div class='error'>Failed to add category.</div>";
                header('location:' . SITEURL . 'admin/add-category.php');
            }
        }
        ?>







    </div>


</div>




<?php include('partials/footer.php'); ?>