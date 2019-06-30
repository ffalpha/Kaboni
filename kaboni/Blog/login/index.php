
<?php  require 'db.php';
session_start();
if(isset($_SESSION['email'])){
   $email= $_SESSION['email'];
    $result =mysqli_query($connect,"SELECT * FROM users WHERE uemail='$email'");
    $user = $result->fetch_assoc();
     if($user['urole']=='Admin'){
        header("location:../admin/index.php");}
           if($user['urole']=='Customer'){
        header("location:../customer/index.php");}
}else{
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KABONI.LK Login</title>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>

		<div class="login-form">
				
			<div class="sign-in-htm">
			<form action="#" method="post">
				<div class="group">
					<label for="user" class="label">Email</label>
					<input name="email" type="text" class="input" >
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input name="password" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" name='login' class="button" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
				<img src="logo.png" >
				</form>
			</div>
             <form action="#" method="post">  		
			<div class="sign-up-htm">
			     <div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input" name="email" required>
				</div>
				<div class="group">
					<label for="user" class="label">First Name</label>
					<input id="user" type="text" class="input"  name="fname" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password"  name="password"required>
				</div>
				<div class="group">
					<label for="user" class="label">Telephone Number</label>
					<input id="user" class="input" type="tel" name="phone" pattern="[0]{1}[0-9]{9}" required>
				</div>
			
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name='register'>
				</div>
					<label for="tab-1">Already Member?</a>
				<img src="logo.png" >
				<div class="hr"></div>
				<div class="foot-lnk">
				
				</div>
				
			</div>
			</form>
		</div>
		
	</div>
</div>
</body>
</html>
<?php } ?>