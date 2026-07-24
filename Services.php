<?php
session_start();

include("conn.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="icons/css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/png" href="img/TC logo.png">
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
							$uid =$_SESSION["uid"];	
						?>
						<li class="nav-item"><a href="profile.php" class="linkk"> <h3 style="color:white;"><i class="fa-solid fa-user"></i><strong><?php echo $_SESSION['username'];?> </strong><i class="fa-solid fa-angle-down"></i></h3></a>
						
							<ul class="dropdown-menu">
								<li class="dropdown-item"><a href="profile.php">Profile</a></li>
								<li class="dropdown-item"><a href="cart.php">Cart<i class="fa-solid fa-cart-shopping"></i></a></li>
								<li class="dropdown-item"><a href="profile.php?tab=order">Orders</a></li>
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
		
            <div class="ser-container">
                <div class="context222">
                    <img class="img11" src="img/Services.jpg" alt="">
                    <div class="heading2222">
                        <h1>Computer Services</h1>
                        <p>At TechCore, we deliver end-to-end technology solutions designed to power innovation, enhance security, and drive business success.</p>
                        <div>
                            <button>Learn More</button>
                        </div>
                    </div>
                </div> 
                
            </div>
			
		
            <div class="ser-container2">
                <div class="heading2">
                    <h2> Our Services</h2>
                </div>
                        <div class="content">
                            <div class="card-ser">
								<input id="checkbox" type="checkbox">
									<h2>Network Service</h2>
										<p>Ensure seamless connectivity and performance with our robust network infrastructure solutions.We design, implement, and maintain networks that keep your business connected and secure — 24/7.</p>
									<div class="show">
										<li class="li-sty-none">LAN/WAN setup and management</li>
										<li class="li-sty-none">Network monitoring and optimization</li>
										<li class="li-sty-none">Secure wireless solutions</li>
										<label for="checkbox">Show Less</label>
									</div>
										<label for="checkbox">Show More</label>
                            </div>
                            <div class="card-ser">
                                <input id="checkbox1" type="checkbox">
                                  <h2>IT Support</h2>
										<p>Fast, reliable, and proactive IT support for your entire organization.Our experts ensure minimal downtime and smooth operation so you can focus on what matters most — growth.</p>	
									<div class="show">
										<li class="li-sty-none">On-site and remote assistance</li>
										<li class="li-sty-none">Hardware & software troubleshooting</li>
										<li class="li-sty-none">Regular maintenance and updates</li>
											<label for="checkbox1">Show Less</label>
									</div>
											<label for="checkbox1">Show More</label>
                              </div>
                              <div class="card-ser">
                                <input id="checkbox2" type="checkbox">
                                  <h2>CyberSecurity</h2>
                                  <p>Protect your digital assets from evolving cyber threats.We provide advanced, real-time protection and risk management to safeguard your business data.</p>
                                  <div class="show">
                                     <li class="li-sty-none">Threat detection & prevention</li>
                                     <li class="li-sty-none">Firewall & endpoint security</li>
                                     <li class="li-sty-none">Data encryption and backup</li>
									  <label for="checkbox2">Show Less</label>
                                  </div>
                                      <label for="checkbox2">Show More</label>
                              </div>
                              <div class="card-ser">
                                <input id="checkbox3" type="checkbox">
                                  <h2>Software Development</h2>
                                  <p>Transform your ideas into powerful digital products.Our experienced developers craft custom software tailored to your unique business needs.</p>
                                  <div class="show">
                                     <li class="li-sty-none">Web & mobile app development</li>
                                     <li class="li-sty-none"> Custom ERP & CRM solutions</li>
                                     <li class="li-sty-none">UI/UX design and prototyping</li>
                                  <label for="checkbox3">Show Less</label>
                                  </div>
                                      <label for="checkbox3">Show More</label>
                              </div>
                              <div class="card-ser">
                                <input id="checkbox4" type="checkbox">
                                  <h2>Cloud Solutions</h2>
                                  <p>Simplify your IT environment with secure and scalable cloud infrastructure.We help you migrate, manage, and optimize your cloud operations seamlessly.</p>
                                  <div class="show">
                                      <li class="li-sty-none">Cloud migration services</li>
                                      <li class="li-sty-none">Data storage and management</li>
                                      <li class="li-sty-none">Cloud app development</li>
                                  <label for="checkbox4">Show Less</label>
                                  </div>
                                      <label for="checkbox4">Show More</label>
                              </div>
							  <div class="card-ser">
                                <input id="checkbox5" type="checkbox">
                                  <h2>System Integration</h2>
                                  <p>Unify all your digital tools and systems for smooth business operations.We ensure your applications, databases, and platforms work together efficiently.</p>
                                  <div class="show">
                                      <li class="li-sty-none">API integration</li>
                                      <li class="li-sty-none">Database synchronization</li>
                                      <li class="li-sty-none">Automation & interoperability solutions</li>
                                  <label for="checkbox5">Show Less</label>
                                  </div>
                                      <label for="checkbox5">Show More</label>
                              </div>
                             
                        </div>
            </div>
          


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