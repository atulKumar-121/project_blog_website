<?php
ob_start();
session_start();
if(isset($_SESSION['username']))
{
include 'includes_login/navigation.php';
include 'includes_login/database.php';
?>
<div class="row main">
     <div class="col l12 m12 s12">
     <ul class="collection with-header">
     <li class="collection-header teal">
    <h5 class="white-text center">Recent Comment</h5>
    <?php
    if(isset($_SESSION['message_comment_two']))
    {
      echo $_SESSION['message_comment_two'];
      unset($_SESSION['message_comment_two']);
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
                     <a href="delete_comment_two.php?id=<?php echo $row3['id'];?>" class="dont_approve" id="">
                     <span><i class="material-icons tiny red-text text-darken4" >close</i> Delete</span></li></a>
                     <?php
                          }
                        }
                     ?></ul>
    </div>
    </div>
    <?php
     include 'includes_login/dashboard_footer.php';
    }
    else{
      header("Location:login.php");
     }
    ?>