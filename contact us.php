<?php
session_start();

include("conn.php");

		$fullname="";
		$email="";
		
			if(isset($_SESSION['first_name'])&&isset($_SESSION['last_name'])){
					$fullname = $_SESSION['first_name']." ".$_SESSION['last_name'];
				
			}
			if(isset($_SESSION['email'])){
				$email = $_SESSION['email'];
				
			}
			
			$message="";
			
			if($_SERVER["REQUEST_METHOD"]=="POST"){
					$name = $_POST['username'];
					$email1 = $_POST['email'];
					$message = $_POST['message'];
					
					$sql="insert into contact_msg(fullname , email , message) values('$name' , '$email1' , '$message')";
					
					if($conn->query($sql)===true){
						
						?>
							<script>
								alert('Your Message Sent Successfully');
									
							</script>	
						<?php
					}else{
						$message= "Error: ".$conn->error;
					}
					
					
			}

?>
<html>
<head>
		<meta name="viewport" content="width-device-width, initial-scale=1.0">
		<title>Contact Us</title>
		<link rel="icon" type="image/png" href="img/TC logo.png">
		<link rel="stylesheet" href="icons/css/all.min.css">
		<link rel=" stylesheet" href="css/style.css">
</head>
<body>
		<!-- navbar - start -->
		<nav class="nav21">
				<div class="nav-logo21">
						<p><a href="index.php">TechCore</a></p>
				</div>
				<div class="nav-menu21">
					<ul>
						<li class="nav-item"><a href="index.php" class="link ">Home</a></li>
						<li class="nav-item"><a href="Services.php" class="link activeeee">Services</a></li>
						<li class="nav-item"><a href="About Us.php" class="link">AboutUs</a></li>
						<li class="nav-item"><a href="contact us.php" class="link">Contact Us</a></li>
						<?php
						if (!isset($_SESSION['email']))
							{
						
						?>
						<div class="nav-button21">
							<a href="Login.html" class="bttn white-btn">Login&nbsp;<i class="fa-solid fa-right-to-bracket"></i></a>
							<a href="SignUp.php" class="bttn ">Sign Up&nbsp;<i class="fa-solid fa-user-plus"></i></a>
						</div>
						<?php
							}
							else
							{
							$username =$_SESSION["username"];	
						?>
						<li class="nav-item"><a href="profile.php" class="linkk"> <h3 style="color:white;"><i class="fa-solid fa-user"></i><strong><?php echo $_SESSION['username'];?> </strong><i class="fa-solid fa-angle-down"></i></h3></a>
						
							<ul class="dropdown-menu">
								<li class="dropdown-item"><a href="profile.php">Profile</a></li>
								<li class="dropdown-item"><a href="cart.php">Cart<i class="fa-solid fa-cart-shopping"></i></a></li>
								<li class="dropdown-item"><a href="profile.php?tab=order" onclick="">Orders</a></li>
								<!-- <li class="dropdown-item"><a href="#">Pc builds</a></li> -->
								<li class="dropdown-item"><a href="products.php">Products</a></li>
								<hr>
								<li class="dropdown-item"><a href="#"></a><a href="Logout.php" class="">Log Out..<i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
							</ul>
							
						</li>
						<?php
							}
						?>	
					</ul>
				</div>
				
					<div class="ham-menu " onclick="toggleMenu()">
							<span></span>
							<span></span>
							<span></span>
					</div>
				
			
				
		</nav>
		<!-- navbar - End -->
		
		
			<div class="contact-form">
				<div class="heaading">
					<h1>Contact Us</h1>
				</div>
				<div class="container">
					<div class="main">
						<div class="content3">
							<h2>Contact Us</h2>	
							
							<form method="post">	
							
							<?php 
								if(isset($_SESSION['email'])){

								
							?>
								<input type="text" name="username" placeholder="Fullname" id="username-ip" value="<?php echo $username;?>" required>	
								
								<input type="email" name="email" placeholder="Email" id="email-ip" value="<?php echo $email;?>" required>
								
								<textarea type="text" name="message" placeholder="Need our help?..." required></textarea>

								<?php
								}else{	
								?>
									<input type="text" name="username" placeholder="Fullname" id="username-ip" value="" required>	
								
								<input type="email" name="email" placeholder="Email" id="email-ip" value="<?php echo $email;?>" required>
								
									<textarea type="text" name="message" placeholder="Need our help?..." required></textarea>
								<?php
								}
								?>
									<button type="submit" value="submit" class="bttn">Submit</button>
							</form>	
								
						</div>
							<div class="form-img3">
								<img src="img/contact.jpg">
							</div>
					</div>
				</div>
				
			</div>
		<!-- Footer - start		 -->
			<div class="body2">
				<footer class="footter">
						<div class="roww">
							<div class="coll">
									<h2 class="logo">TechnoHive</h2>
									<p>Managed Services refer to the practice of outsourcing the responsibility for maintaining and overseeing a range of IT operations and systems to a third-party service provider, commonly known as a Managed Service Provider (MSP)</p>
							</div>
							<div class="coll">
								<h3>Office</h3>
								<p>Main Road New Raipur</p>
								<p>Capital City Raipur</p>
								<p>Chhattisgarh, INDIA</p>
								<p class="email">technohive123@hotmail.com</p>
								<h4>+91 1234567890</h4>
							</div>
							<div class="coll">
								<h3>Links</h3>
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="services.php">Services</a></li>
									<li><a href="contact us.php">Contact</a></li>
									<li><a href="about us.php">About Us</a></li>
								</ul>
							</div>
						</div>
				</footer>
			</div>
		<!-- Footer - End	 -->
		
		<script>
			function toggleMenu(){
				document.querySelector('.nav-menu21').classList.toggle('activee');
			}
			
		</script>
		
</body>
</html>