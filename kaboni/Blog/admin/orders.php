

<?php include "include/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "include/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome

                        <small><?php echo  $_SESSION['first_name'] ?></small>
                    </h1>

       <table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <td>Order Id</td>
            <td>Order Date</td>
            <td>Pacakage</td>
            <td>Order Status</td>
            <td>Description </td>
            <td>Change status</td>
            <td>View payment</td>
            <td>Cancel the order</td>
        </tr>
    </thead>
    <tbody>
 <tbody>

        <?php
      $id =$_SESSION['email'];
        $query="SELECT * FROM orders where cemail = '$id'";
        $result=mysqli_query($connect,$query);
        while($row=mysqli_fetch_assoc($result))
        {  
        ?><tr>
                        <td><?php echo $row['oid']; ?></td>
                       <td><?php echo $row['date']; ?></td>
                       <td><?php echo $row['package']; ?></td>
                       <td><?php echo $row['status']; ?></td>
                       <td><?php echo $row['description']; ?></td>
                      <td> <select name="role" id="post_cat"> 
                    <option value='Order Aproved.Wating for Payment'>Order Aproved.Wating for Payment</option>
                    <option value='Payment Approved'>Payment Approved</option>
                    </select><br><br>
                    <input type="submit"   name="changec" value="Change" class="btn btn-danger" /></td>
                    <td></td>
                     <td align="center" class="colcolar"><a href="./orders.php?delete=<?php echo $row['oid'];?>"  ><img src="images/delete.png"   ></a></td> </tr>
         <?php } ?>

    </tbody>
</table>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


        <?php include "include/admin_footer.php"; ?>