<?php
include 'includes/header.php';
include 'includes/navigation.php';
?>
<div class="container-fluid">
 <div class="row">
 <div class="col-lg-9 col-md-9 col-sm-12">
  <div class="row">
  <?php
  if (isset($_GET['search']))
   {
    $q=$_GET['search_value'];
    $q=mysqli_real_escape_string($conn,$q);
    $q=htmlentities($q);
    $sql="select * from posts where title like '$q' or content like '$q' or title like '%$q%' or content like '%$q%'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    { 
        while($row=mysqli_fetch_assoc($res))
         {
      ?>
   <!--this is a main area-->
   <div class="col-lg-4 col-md-3 col-sm-6">
          <div class="card " >
          <!--<img class="card-img-top" src="img\image1.jpg" alt="Card image cap">-->
           <div class="card-body">
           <h5 class="card-title text-truncate"><?php echo $row['title']; ?></h5>
           <p class="card-text text-truncate"> <?php echo $row['content']; ?></p>
             <div class="card-link">
             <a href="post.php?id=<?php echo $row['id']; ?>">Read More...</a>
             </div>
           </div>
          </div>
        </div>
        <?php
         }
        }
    else{
        ?>
    <h5 class="text-danger "> Sorry Your Input Data Is Not Available In the Blog</h5>
    <?php
    }
    ?>
    </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12">
     <?php
     include 'includes\sidebar.php';
    }
    else
   {
    header("Location:index.php");
   }
   ?>



 