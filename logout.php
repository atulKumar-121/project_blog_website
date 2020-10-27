<?php
include 'includes_login/header.php';
if(isset($_SESSION['username']))
{
    unset($_SESSION['username']);
    
    
    $_SESSION['message']="<div class='white-text'> You have succesfully logout</div>";
     
    header("Location:login.php");

}
else
{
    header("Location:login.php");
}
?>