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
    
    $title=$_POST['title'];
    $title=mysqli_real_escape_string($conn,$title);
    $title=htmlentities($title);
    
    $data=$_POST['ckeditor'];
    /* sql injection*/
    $data=mysqli_real_escape_string($conn,$data);
    /*javascript*/
    //$data=htmlentities($data);
    $sql="insert into posts(title,content) values('$title','$data')";
    $res=mysqli_query($conn,$sql);
    if($res)
    {
    $_SESSION['message']="<div class=' teal-text'>Post is published</div>";
    header("Location:write.php");
    }
    else
    {
    $_SESSION['message']="<div class=' red-text'>Sorry Something Went Wrong</div>";
    header("Location:write.php");
    }
         
  }

    
?>
   