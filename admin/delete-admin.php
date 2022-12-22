<?php
//include constants.php file here
include('../config/constant.php');

//1. get the id of admin to be deletd
$id = $_GET['id'];


//2. create sql query to delete admin
$sql = "DELETE FROM Grocery_admin WHERE id =$id";


//execute the query
$res = mysqli_query($conn, $sql);
//check the query executed successfully or not
if($res==true){
//echo 'Admin Deleted';
//create session variable to display msg

$_SESSION['delete'] = "<div class='success'>Admin Deleted successfully</div>";
header('location:'.SITEURL. 'admin/manageAdmin.php');


}
else {
   // echo 'Failed to delete Admin';

   $_SESSION['delete']="<div class = 'error'>Failed to delete admin. try again later</div>";
   header('location:'.SITEURL. 'admin/manageAdmin.php');
}

//3. redirect to manage admin page with msg (success/ error)
?>