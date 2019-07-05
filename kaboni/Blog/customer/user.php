
	  <?php include "include/customer_header.php"?>

     <?php  
    $email=$_SESSION['email'];
    $query="Select * from users where uemail= '{$email}'";
    $result=mysqli_query($connect,$query);
    if(!$result){
    echo "Eroror";
}
 $row=mysqli_fetch_assoc($result);


?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Resgistration Date</label>
                                                <input type="text" class="form-control" disabled placeholder="Company" value="<?php  echo $row['date']?>">
                                            </div>
                                        </div>
                                 
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email" value="<?php  echo $row['uemail']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="Company" value="<?php  echo $row['ufirstname']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="<?php  echo $row['ulastname']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" value="<?php  echo $row['address']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Telephone number</label>
                                                <input type="text" class="form-control" placeholder="City" value="<?php  echo $row['utnumber']?>">
                                            </div>
                                        </div>
                                           <div class="form-group">
        <?php  if ($row['uimage']==""){
    echo "No image has set"; ?>         <input type="file"  class="btn btn-primary"  name="image"> <?php } ?> 
        
    </div>

                                     
                                    </div>

                          

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="../admin/images/users/<?php  echo $row['uimage']?>" alt="..."/>

                                      <h4 class="title"><?php  echo $row['ufirstname']?> <?php  echo $row['ulastname']?> <br />
<!--                                         <small><?php  echo $row['username']?></small>-->
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> <?php  echo $row['uemail']?><br>
                                                   <?php  echo $row['address']?> <br>
                                                   <?php  echo $row['utnumber']?>
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


            <?php include "include/customer_footer.php"?>
            