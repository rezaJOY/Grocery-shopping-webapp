<?php


//authorization-accesscontrol
//check whether the user is logged in or not

if(!isset($_SESSION['user'])) //ifuser session is not set

{
$_SESSION['no-login-message']="<div class='error text-center'> please login in to access admin.</div>";

header('location:'.SITEURL.'admin/login.php');


}
