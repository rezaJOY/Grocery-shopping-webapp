<?php

include('../config/constant.php');


if(isset($_GET['id']) AND isset($_GET['image_name']))
{
 $id = $_GET['id'];
 
$image_name=$_GET['image_name'];

if($image_name!=""){


    $path="../images/Category/".$image_name;
    $remove = unlink($path);

    if($remove==false){
     $_SESSION['remove']="<div class='error'>Failed to remove Category image.</div>";      
      header('location:'.SITEURL.'admin/manageCategory.php');
      die();


    }
}

$sql="DELETE FROM Grocery_category WHERE id=$id";


$res = mysqli_query($conn,$sql);

if($res==true)
{
$_SESSION['delete']="<div class ='success'>Category Deleted successfully.</div>";
header('location'.SITEURL.'admin/manageCategory.php');

}
else{

    $_SESSION['delete']="<div class ='error'>Failed to delete category</div>";
header('location'.SITEURL.'admin/manageCategory.php');
}










}
else{

    header('location:'.SITEURL.'admin/manageCategory.php');
}

?>