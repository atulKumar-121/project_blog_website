 <?php
 ob_start();
 session_start();
 include 'includes_login/navigation.php';
 if (isset($_SESSION['username']))
  {
   # code...
   ?>
    <!-- side navigation completed-->
     <div class="main">
     <div class="row">
     <div class="col l6 m6 s12">
     <ul class="collection with-header">
     <li class="collection-header teal">
    <h5 class="white-text center"> Recent Posts</h5>
    <span id="message"> </span>
     </li>

     <?php
     $sql="select * from posts order by id desc";
     $res=mysqli_query($conn,$sql);
     if(mysqli_num_rows($res)>0)
     {
       while($row=mysqli_fetch_assoc($res))
       {
     ?>
     <li class="collection-item">
     <a href=""><?php echo $row['title']?></a>
     <br>
     <span> <a href="edit.php?id=<?php echo $row['id'];?>"><i class="material-icons tiny teal-text text-darken4">edit</i> Edit</a> |     
     <a href="" id="<?php echo $row['id']; ?>" class="delete"><i class="material-icons tiny red-text text-darken4" >close</i> Delete </a>|
     <a href=""> <i class="material-icons tiny green-text textdarken-4">share</i> Share </a></span></li>
     <?php
       }
      }
      else
      {
        echo "<div class='chip teal white-text '>No Blogs Yet .....</div>";
      }
     ?>
     </ul>

     </div>
     <div class="col l6 m6 s12">
     <ul class="collection with-header">
     <li class="collection-header teal">
    <h5 class="white-text center"> Recent Comment</h5>
    <?php
    if(isset($_SESSION['message_comment']))
    {
      echo $_SESSION['message_comment'];
      unset($_SESSION['message_comment']);
    }
    ?>
     </li>
     <?php
                      $sql4="select * from comment order by id desc";
                      $res6=mysqli_query($conn,$sql4);
                      if(mysqli_num_rows($res6)>0)
                      {
                          while($row3=mysqli_fetch_assoc($res6))
                          {

                    ?>
                     <li class="collection-item">
                      <?php echo $row3['comment_text'];?>
                      <span class="secondary-content"><?php echo $row3['email'];?></span>
                      <br>
                     <a href="delete_comment.php?id=<?php echo $row3['id'];?>" class="dont_approve" id=""><span><i class="material-icons tiny red-text text-darken4" >close</i> Delete 
     </span> 

                     </li></a>
                     <?php
                          }
                        }
                     ?> 
                     
      </ul>
     </div>
     
     </div>


     </div>   
     <div class="fixed-action-btn">
     <a href="write.php" class="btn-floating btn btn-large white-text pulse"><i class="material-icons">edit</i></a></div>
     
    
      <!--JavaScript at end of body for optimized loading-->
      <script  type="text/javascript"  src="jquery.js"></script>
      <script  type="text/javascript"  src="materialize.min.js"></script>
    
     
    <script>
    $(document).ready(function()
    {
        $('.button-collapse').sideNav();
    });
    </script>


    <script>
     
    const del=document.querySelectorAll(".delete");
   del.forEach(function(item,index)
   {
    item.addEventListener("click",deleteNow)
   })
   function deleteNow(e)
  {
  e.preventDefault();
  if(confirm("Do you Really want to delete this post"))
    {
      const xhr= new XMLHttpRequest();
       xhr.open("GET","delete.php?id="+Number(e.target.id),true)
       xhr.onload=function()
     {
        const msg= xhr.responseText;
        const message=document.getElementById("message")
        message.innerHTML=msg;
     }
       xhr.send()
    }
  } 
}
 </script>
<?php
  }
  else{

    $_SESSION['message']="Login to Continue";
    header("Location:login.php");
  }
  ?>

     </body>
  </html>