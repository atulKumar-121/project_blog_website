<?php
include 'includes/database.php';
?>


<div class="container search-area">
      <div class="row">
        <div class="col">
          <form action="search.php" method="GET">
          <div class="card">
            <div class="card-body">
               <h5 class="card-title">Search</h5>
               <p class="card-text"> 
                <form>
                <div class="form-group">
                  <input type="text" class="form-control" id="Search" name="search_value" placeholder="Search Anything . . .">
                </div>
               </form>
              </p>
              <input type="submit" value="search" class="btn btn-outline-info" name="search"> </button>
             </div>
           </div>
        </div></form>
     </div>
     <div class="container trending-section">
       <div class="row">
         <div class="col">
         <div class="card">
           <div class="card-header">
            Trending Section . . .
            </div>
            <div class="card-body">
            <div class="list-group">
            <?php
            $sql="select * from posts order by view desc limit 5";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0)
            {

            while($row=mysqli_fetch_assoc($res))
            { 

             

            ?>
            <a href="post.php?id=<?php echo $row['id'];?>" class="list-group-item list-group-item-action list-group-item-info"><?php echo $row['title'];?></a>
            <?php
            }
          }
            ?> 

           </div>

            </div>
          </div>
       </div>
      </div>
    </div> 