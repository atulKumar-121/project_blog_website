<?php
ob_start();
session_start();
if(isset($_SESSION['username']))
{
include 'includes_login/navigation.php';
include 'includes_login/database.php';
?>

<div class="row main ">
     <div class="col l12 m12 s12">
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
     <div class="fixed-action-btn">
     <a href="write.php" class="btn-floating btn btn-large white-text pulse"><i class="material-icons">edit</i></a></div>
     
        

     
<?php
include 'includes_login/dashboard_footer.php';
    }
    else
    {
      header("Location:login.php");
    }
?>
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
</script>
