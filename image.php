<?php
ob_start(); 
session_start();
include 'includes_login/navigation.php';
$dir="../img/";
/* scan dir scans a complete directory and returns array */
$files=scandir($dir);
if($files)
{
?>
<div class="main">
<div class="row">

<?php
     foreach($files as $file)
    { 
         
?>
<div class="col l2 m3 s4">
<div class="card">
<div class="card-image">
<img src="../img/<?php echo $file ;?>" alt="">
<span class="card-title"><?php echo $file ;?></span>
</div>
</div>
</div>

<?php

} 

}
?>
</div>
</div>
<?php
include 'includes_login/dashboard_footer.php';
?>