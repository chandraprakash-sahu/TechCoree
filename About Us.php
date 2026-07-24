<?php
session_start();

include("conn.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
	<link rel="icon" type="image/png" href="img/TC logo.png">
    <link rel="stylesheet" href="icons/css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
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
						<li class="nav-item"><a href="Services.php" class="link ">Services</a></li>
						<li class="nav-item"><a href="About Us.php" class="link activeeee">AboutUs</a></li>
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
							$uid =$_SESSION["uid"];	
						?>
						<li class="nav-item"><a href="profile.php" class="linkk"> <h3 style="color:white;"><i class="fa-solid fa-user"></i><strong><?php echo $_SESSION['username'];?> </strong><i class="fa-solid fa-angle-down"></i></h3></a>
						
							<ul class="dropdown-menu">
								<li class="dropdown-item"><a href="profile.php">Profile</a></li>
								<li class="dropdown-item"><a href="cart.php">Cart<i class="fa-solid fa-cart-shopping"></i></a></li>
								<li class="dropdown-item"><a href="profile.php?tab=order">Orders</a></li>
								<!-- <li class="dropdown-item"><a href="#">Pc builds</a></li> -->
								<li class="dropdown-item"><a href="products.php">Prducts</a></li>
								<hr>
								<li class="dropdown-item"><a href="Logout.php" class="">Log Out..<i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
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
		
			
        <section class="hero">
            <div class="heading">
                <h1>About Us</h1>
            </div>
            <div class="hero-container">
                <div class="hero-content">
                    <h2>Empowering Businesses Through Technology</h2>
                    <p>At TechCore, we believe that technology is the foundation of progress. Founded with a vision to simplify IT for everyone, we specialize in delivering powerful, reliable, and scalable digital solutions that help businesses stay ahead in the modern world.</p>
                    <button class="cta-bttn">Learn More</button>
                </div>
                <div class="hero-image">
                    <img class="img-he" src="img/AboutUs.jpg">
                </div>
            </div>
            <div class="hero-container">
                <div class="hero-image">
                    <img class="img-he" src="img/AboutUs.jpg">
                </div>
                <div class="hero-content">
                    <h2>Who We Are ?</h2>
                    <p>We are a team of passionate technologists, developers, and IT professionals dedicated to building strong, future-ready systems.Our goal is to help businesses transform digitally — whether it’s improving operations, securing data, or developing next-gen software solutions.

With a customer-first mindset, we don’t just deliver services — we deliver partnerships that drive success.</p>
                    <button class="cta-bttn">Learn More</button>
                </div>
            </div>
            <div class="hero-container">
                <div class="hero-content">
                    <h2>What We Do</h2>
					<p>We provide a complete suite of technology services, including:</p>
                    <li >Network Design & Management</li>
                    <li >Cybersecurity & Data Protection</li>
                    <li >Software & Web Development</li>
                    <li >Cloud & IT Infrastructure Solutions</li>
                    <li >Technical Support & Maintenance</li>
                    <button class="cta-bttn">Learn More</button>
                </div>
                <div class="hero-image">
                    <img class="img-he" src="img/AboutUs.jpg">
                </div>
            </div>
        </section>
		
		
		
		<!-- Footer - start		 -->
			<div class="body2">
				<footer class="footter">
						<div class="roww">
							<div class="coll">
									<h2 class="logo">TechCore</h2>
									<p>Managed Services refer to the practice of outsourcing the responsibility for maintaining and overseeing a range of IT operations and systems to a third-party service provider, commonly known as a Managed Service Provider (MSP)</p>
							</div>
							<div class="coll">
								<h3>Office</h3>
								<p>Main Road New Raipur</p>
								<p>Capital City Raipur</p>
								<p>Chhattisgarh, INDIA</p>
								<p class="email">techcore123@hotmail.com</p>
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