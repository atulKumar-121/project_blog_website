<?php
ob_start();
session_start();

include 'includes_login/database.php';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conn,$id);
    $id=htmlentities($id);
    $sql="delete from posts where id=$id";
    $res=mysqli_query($conn,$sql);
     if($res)
     {
         echo "<div class=' chip white teal-text'> Deleted Successfully </div>";
     }
     else
     {
         echo  "<div class='chip black red-text'>Sorry Something Went Wrong</div>";
     }

}
?>






 