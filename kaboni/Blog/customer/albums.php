
	  <?php include "include/customer_header.php"?>

        
              <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">My Albums</h4>
                                
                            </div>
   

                    <div class="content">
                       
                       
<table class="ab" >

    <tr>
        <?php
        $query="SELECT * FROM album";
        $result=mysqli_query($connect,$query);
        while($row=mysqli_fetch_assoc($result))
        {  if($row['privacy']!="Private"){
        ?>
    
            <input type="hidden"  name="filename" value="<?php echo $row['name'];?>">
            <td align="center"> <a href="../admin/view/index.php?source=<?php echo  $row['name'];?>"><img src="../admin/images/folder.png"><br><label for="image"><?php echo  $row['name'];?>
                </label></a>
               </td>
    


        <?php } }?>
 
    </tr>
</table>
                        </div>
                        </div>
                    </div>

                </div>
                  </div>

            <?php include "include/customer_footer.php"?>
            