<?php
ob_start();
session_start();
include 'database.php';
if(isset($_POST['update_password']))
{    
    $username=$_SESSION['username'];
    $username=mysqli_real_escape_string($conn,$username);
    $username=htmlentities($username);
    $newpassword=$_POST['password'];
    $newpassword=mysqli_real_escape_string($conn,$newpassword);
    $newpassword=htmlentities($newpassword);
    $sql1="update users set password='$newpassword' where username='$username'";
    $res1=mysqli_query($conn,$sql1);
    if($res1)
    {
        $_SESSION['confirm_msg']="<div class='chip white teal-text'>Password Changed</div>";
          header("Location:setting.php");
    }
    else
    {
        $_SESSION['confirm_msg']="<div class='chip white red-text'>Sorry, Something went wrong</div>";
        header("Location:setting.php");
    }
}
else if(isset($_POST['update_email']))
{   
    $username=$_SESSION['username'];
    $username=mysqli_real_escape_string($conn,$username);
    $username=htmlentities($username);
    $newemail=$_POST['email'];
    $newemail=mysqli_real_escape_string($conn,$newemail);
    $newemail=htmlentities($newemail);
    $sql2="update users set password='$newemail' where username='$username'";
    $res2=mysqli_query($conn,$sql2);
    if($res2)
    {
        $_SESSION['confirm_msg']="<div class='chip white teal-text'>Email Changed</div>";
          header("Location:setting.php");
    }
    else
    {
        $_SESSION['confirm_msg']="<div class='chip white red-text'>Sorry, Something went wrong</div>";
        header("Location:setting.php");
    }

}
else if(isset($_POST['update_number']))
{
    $username=$_SESSION['username'];
    $username=mysqli_real_escape_string($conn,$username);
    $username=htmlentities($username);
    $newnumber=$_POST['number'];
    $newnumber=mysqli_real_escape_string($conn,$newnumber);
    $newnumber=htmlentities($newnumber);
    $sql3="update users set password='$newemail' where username='$username'";
    $res3=mysqli_query($conn,$sql3);
    if($res2)
    {
        $_SESSION['confirm_msg']="<div class='chip white teal-text'>Number Changed</div>";
        header("Location:setting.php");
    }
    else
    {
        $_SESSION['confirm_msg']="<div class='chip white red-text'>Sorry, Something went wrong</div>";
        header("Location:setting.php");
    }


}
else
{
    header("Location:login.php");
}
?>