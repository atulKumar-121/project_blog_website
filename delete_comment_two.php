<?php
ob_start();
session_start();
include 'includes_login/database.php';
if(isset($_GET['id']))
{
     
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conn,$id);
    $id=htmlentities($id);
    $sql1="select status from comment where id=$id";
    $res1=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($res1))
    {
        $row1=mysqli_fetch_assoc($res1);
        if($row1['status']==0)
        {
          $sql="update comment set status=1 where id=$id";
          $res=mysqli_query($conn,$sql);
          if($res)
          {
          $_SESSION['message_comment_two']="<div class='chip white teal-text'>Comment is removed from the main post</div>";
          header("Location:comment.php");
          }
          else
          {
          $_SESSION['message_comment_two']="<div class='chip white red-text'>Sorry Something went wrong</div>";
          header("Location:comment.php");
          }
        }
        else
        {
            $_SESSION['message_comment_two']="<div class='chip white red-text'>The Given Comment is not in the Main Post</div>";
            header("Location:comment.php");

        }
    }
    

}
?>