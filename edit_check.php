<?php
ob_start();
session_start();

   if(isset($_POST['publish']))
   { 
    
    $dbservername ="localhost";
    $dbuser="root";
    $dbpassword="";
    $dbname="blogger";    
    $conn=mysqli_connect($dbservername,$dbuser,$dbpassword,$dbname);
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conn,$id);
    $id=htmlentities($id);
    $title=$_POST['title'];
    $title=mysqli_real_escape_string($conn,$title);
    $title=htmlentities($title);
    
    $data=$_POST['ckeditor'];
    /* sql injection*/
    $data=mysqli_real_escape_string($conn,$data);
    /*javascript*/
    $data=htmlentities($data);
    $sql="update posts set title='$title',content='$data' where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res)
    {
     $_SESSION['message']="<div class=' teal-text'>Post is Updated</div>";
     header("Location:edit.php?id=".$id);
    }
    else
    {
      $_SESSION['message']="<div class=' red-text'>Sorry Something Went Wrong</div>";
      header("Location:edit.php?id=".$id);
    }
    
}

   ?>
   