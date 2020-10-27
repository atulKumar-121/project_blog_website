<?php
include 'includes_login\header.php';
if($conn)
{
   if(isset($_POST["login"]))
  {
     $username=$_POST['username'];
     $password=$_POST['password'];
     /*query injection*/
    $username=mysqli_escape_string($conn,$username);
    $password=mysqli_escape_string($conn,$password);
    /* cross server attack done by javascript when code is written in input filled*/
    $username=htmlentities($username);
    $password=htmlentities($password);
    $sql="select password from users where Username='$username'";
    $res=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($res);
      
  //  echo );
    if($password==$rows["password"])
    {
       $_SESSION['username']=$username;     
       header("Location:dashboard.php");
    }
    else
    { 
      $_SESSION['message']="Sorry,Credentials Don't match";
      header("Location:login.php");
        
    } 
  }
  else
  {
    header("Location:login.php");
  }
}
?>