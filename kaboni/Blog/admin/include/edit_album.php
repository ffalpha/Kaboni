
<?php


      if(isset($_GET['name'])){
          $name= $_GET['name'];
           $query1="SELECT * FROM album where name='{$name}'";
          $result1=mysqli_query($connect,$query1);
           $row1=mysqli_fetch_assoc($result1);
         
       }else{
          die("Error");
      }


?>


<div class="grid-containers">
    <div>
         <div class="form-group">
            <label for="title">Album Name</label>
            <input type="text" class="form-control" name="username"  value="<?php echo $row1['name']?>">  
        </div> 
        <label for="table"><span><h3>Album</h3></span></label>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <td>Id</td>
                    <td>Image</td>
                    <td>Date</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>

                <!--
<?php
$query="SELECT * FROM {$name}";
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($result))
{
?>
-->
                <form action="#" method="post">
                    <tr class="text-center">
                        <td width="20"><?php echo $row['id'];?></td>
                        <input type="hidden"  name="pid" value="<?php echo $row['id'];?>">
                        <td ><img src="images/albums/<?php echo $name;?>/<?php echo $row['imagename'];?>" width="150" height="75" > </td>
                        <td ><?php echo $row['date'];?></td>
                        <td  align="center"><a href="posts.php?source=edit_post&pid="  ><img src="images/refresh.png" ></a></td>
                        <td  align="center" class="colcolar"><a href="posts.php?delete="  ><img src="images/delete.png"  ></a></td> 
                    </tr>
                </form>
                <!--                                        <?php  }?>-->
            </tbody>
        </table>
    </div>
    <div>
        <div class="form-group">
            <label for="title">Authrozied user</label>
            <input type="text" class="form-control" name="username"  value="<?php echo $row1['user']?>">  
        </div> 
        
         <div class="form-group">
            <label for="title">Privacy Level</label>
            <input type="text" class="form-control" name="username"  required>  
        </div> 
    </div>  



</div>