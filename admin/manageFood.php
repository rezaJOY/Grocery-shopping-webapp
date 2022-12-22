<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Products</h1>

        <br><br>
        <br>
            <a href="<?php echo SITEURL;?>admin/add-food.php"class="btn-primary">Add Products</a>

            </br>
            <br></br>

            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            
            ?>
            
        <table class="tbl-full">
            <tr>
             <th>S.N.</th>
             <th>Full Name </th>
             <th>Username </th>
             <th>Actions </th>
            </tr>

             <tr>
                 <td>1.</td>
                 <td> ziaur reza joy </td>
                 <td> Rezajoy </td>
                 <td><a href="#" class="btn-sec">Update Admin</a>
                 <a href="#" class="btn-danger">Delete Admin</a>
                     
                    </td>
             </tr>
             <tr>
                 <td>2.</td>
                 <td>Ramisha e anjum</td>
                 <td> Ramisha</td>
                 <td><a href="#" class="btn-sec">Update Admin</a>
                 <a href="#" class="btn-danger">Delete Admin</a>
                    </td>
             </tr>
             <tr>
                 <td>3.</td>
                 <td>Maddy</td>
                 <td> Maddy97</td>
                 <td><a href="#" class="btn-sec">Update Admin</a>
                 <a href="#" class="btn-danger">Delete Admin</a>
                    </td>
             </tr>



        </table>
    </div>


</div>


<?php include('partials/footer.php'); ?>