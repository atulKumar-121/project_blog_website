<?php
include 'includes_login\header.php';
if($conn)
{
   if(isset($_POST["sign_up"]))
  {
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $password=$_POST['password'];
 /*query injection*/
    $email=mysqli_escape_string($conn,$email);
    $username=mysqli_escape_string($conn,$username);
    $password=mysqli_escape_string($conn,$password);
    $first_name=mysqli_escape_string($conn,$first_name);
    $last_name=mysqli_escape_string($conn,$last_name);
    $number=mysqli_escape_string($conn,$number);
    /* cross server attack done by javascript when code is written in input filled*/

    $email=htmlentities($email);
    $username=htmlentities($username);
    $password=htmlentities($password);
    $first_name=htmlentities($first_name);
    $last_name=htmlentities($last_name);
    $number=htmlentities($number);
      /* entries sanitised , enter into database*/
      /* encruption off password*/
     //$password=password_hash($password,PASSWORD_DEFAULT);
      $query="select * from users where Email='$email' or Username='$username'";
      $res=mysqli_query($conn,$query);
      if(mysqli_num_rows($res))
      {
         header("Location:login.php");
         $_SESSION['message']="Account already exists,Please Login";

      }
      else
      {
      $sql="insert into users(Email,First_name,Last_name,Username,Phone,password) value('$email',' $first_name','$last_name','$username','$number',' $password')";
      if(mysqli_query($conn,$sql))
      {
         header("Location:login.php");
         $_SESSION['message']="You have been sucessfully Registered,Login to Continue";
      }
      else
      {
         header("Location:login.php");
         $_SESSION['message']="Sorry something went wrong ,Please Signup Again";
      }
     }
      
   }

else
   {
       header("Location:login.php");

   }
}
 
?>