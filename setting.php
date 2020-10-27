<?php
ob_start();
session_start();
if(isset($_SESSION['username']))
{
 include 'includes_login/navigation.php';
 include 'includes_login/database.php';
?>
<div class="main">
<div class="card-panel">
<h3 class="center teal-text">
Settings
</h3>
<?php
if(isset($_SESSION['confirm_msg']))
{
echo $_SESSION['confirm_msg'];
unset($_SESSION['confirm_msg']);
}
?>
<h5>Update Password</h5>
<form action="update.php" method="POST">
<input type="password" name="password" placeholder="Change Password..."> 
 <div class="center">
<input type="submit" value="Update Password..." name="update_password" class="btn" >
</div>
</form>
<h5>Update Email</h5>
<form action="update.php" method="POST">
<input type="text" name="email" id="email" placeholder="Change Email..."> 
<label for="email"  data-error="Invalid email format"></label>
 <div class="center">
<input type="submit" value="Update Email..." name="update_email" class="btn" >
</div>
</form>
<h5>Update Phone Number</h5>
<form action="update.php" method="POST">
<input type="text" name="number" placeholder="Change Phone Number..."> 
<div class="center">
<input type="submit" value="Change Phone Number.." name="update_number" class="btn" >
</div>
</form>
</div>
</div>
<?php
include 'includes_login/dashboard_footer.php';
    }
else
    {
      header("Location:login.php");
    }

?>

