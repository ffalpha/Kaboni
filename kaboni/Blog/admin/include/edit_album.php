
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
            <input type="text" class="form-control" name="name" readonly value="<?php echo $row1['name']; $abname=$row1['name'];?> ">  
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
                        <td  align="center" class="colcolar"><a href="album.php?source=edit_album&name=<?php echo $abname?>&delete=<?php echo  $row['id']; ?>"  ><img src="images/delete.png"  ></a></td> 
                    </tr>
                </form>
                <!--                                        <?php  }?>-->
            </tbody>
        </table>
    </div>
   
    <div>
        <form action="#" method="post">
        <div class="form-group">
            <label for="title">Authrozied user</label>
            <input type="text" class="form-control" name="username"  value="<?php echo $row1['user']?>">  
        </div> 
        
         <div class="form-group">
            <label for="title">Privacy Level</label>
              <select name="privacy" id="privacy"> 
                   <?php if($row1['privacy']=="Public"){?>
                    <option value='Public' selected>Public</option><option value='Private'>Private</option><?php }else {?>
                    <option value='Private' selected>Private</option><option value='Public' >Public</option><?php } ?>
        </select>  
        </div> 
            <input type='submit' value='Update' name='updatedetails' class="btn btn-success">    
</form>
    </div>  


</div>
<!-- Updateing the album table-->
<?php 
    if (isset($_POST['updatedetails'])){
       
        $name=$abname;
        $privacy=$_POST['privacy'];
        $usermail=$_POST['username']; 
        $query2="UPDATE album SET privacy='{$privacy}',user='{$usermail}' WHERE name='{$name}'";
        $result2=mysqli_query($connect,$query2);
        confirm($result2);
        header('Location: ./album.php');
  
    }
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    
     $query="SELECT * FROM $abname where id={$id}";
     $result=mysqli_query($connect,$query);
     $row=mysqli_fetch_assoc($result);
    $image="./images/albums/$abname/{$row['imagename']}";
    if(file_exists($image)){
        unlink($image);
    } else {
        die('file does not exist');
    }
//    $query="Delete from posts where pid={$id}";
//    $result=mysqli_query($connect,$query);
//    header("Location:posts.php");
}



?>



