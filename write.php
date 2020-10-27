<?php
   ob_start();
   session_start();

 include 'includes_login/navigation.php';
 if(isset($_SESSION['username']))
 {
 ?>

  <div class="main">
  
   <form action="write_check.php" method="POST" enctype="mutlipart/form-data">
   <div class="card-panel">
   <?php
   if(isset($_SESSION['message']))
   {
     echo $_SESSION['message'];
     unset($_SESSION['message']);
   }
   ?>
  
   <h5 class="center teal-text"> Heading For Post</h5>
   <textarea name="title" class="materialize-textarea" placeholder="Heading For Post"></textarea>
    
     
      <h5 class="center teal-text" style="margin-top:20px">Post Content</h5>
   <textarea name="ckeditor" id="ckeditor" class="ckeditor"></textarea>
   
<div class="center"><input type="submit" value="Publish" name="publish" class="btn white-text"></div>
</div>
   </form>
   </div>

   <script  type="text/javascript"  src="ckeditor\ckeditor.js"></script>

  <?php
  include 'includes_login/dashboard_footer.php';
 }
 else{
 header("Location:login.php");
 }
  ?>