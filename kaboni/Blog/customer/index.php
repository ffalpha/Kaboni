
          <?php include "include/customer_header.php"?>


        <div class="content">
            <div class="container-fluid">
<!--
                <div class="row">
                    <div class="col-md-4">
                    fsasfasfafs
                    </div>

                    <div class="col-md-8">
saffsasaffsa
                </div>

            </div>
            
            
-->
       <div class="container">
  <div class="row">
    <div class="col-sm-6" style="background-color:yellow;">
      <center><img src="./assets/album.png" alt="..."/> <h2>My Albums</h2></centrer> 
    </div>
    <div class="col-sm-6" style="background-color:Green;">
        <center><img src="./assets/boy.png" alt="..."/> <h2>My Profile</h2></centrer> 
    </div>
  </div>
  
   <div class="row">
    <div class="col-sm-6" style="background-color:Blue;">
      <center><img src="./assets/album.png" alt="..."/> <h2>My Orders</h2></centrer> 
    </div>
    <div class="col-sm-6" style="background-color:pink;">
      <p>Sed ut perspiciatis...</p>
    </div>
  </div>
</div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
            
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Kaboni.lk</a>We make your Dream Come True
                </p>
            </div>
        </footer>

    </div>
</div>

          <?php include "include/customer_footer.php"?>
		<script type="text/javascript">
        
        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome Back <b> <?php echo $_SESSION['first_name']?> </b> - Hope you will have a nice day"

            },{
                type: 'info',
                timer: 4000
            });
</script>