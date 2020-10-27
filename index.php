<?php
include 'includes\header.php';
?>
<?php
include 'includes\navigation.php';
?>
<div class="container-fluid">
 <div class="row">
  <!--this is a main area-->
  <div class="col-lg-9 col-md-9 col-sm-12">
    <div class="container-fluid main_area">
      <div class="row">
        <!--card start-->
       <?php
       $sql="select * from posts order by id desc";
       $res=mysqli_query($conn,$sql);
       if(mysqli_num_rows($res)>0)
       {
         while($row=mysqli_fetch_assoc($res))
         {
      ?>

   


        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card " >
          <!--<img class="card-img-top" src="img\image1.jpg" alt="Card image cap">-->
           <div class="card-body">
           <h5 class="card-title text-truncate"><?php echo ucwords($row['title']); ?></h5>
           <span class="d-inline-block text-truncate" style="max-width: 150px;">
           <?php echo ucwords($row['content']) ?></span>
             <div class="card-link">
             <a href="post.php?id=<?php echo $row['id']; ?>">Read More...</a>
             </div>
           </div>
          </div>
        </div>
        <?php
         }
        }
        ?> 
     </div>
   </div>
  </div>
   <!--this is a sidebar area-->
  <div class="col-lg-3 col-md-3 col-sm-12">
  <?php
 include 'includes\sidebar.php';
 ?>

    
   </div>
</div>
</div>
 <?php
 include 'includes\footer.php';
 ?>
 

