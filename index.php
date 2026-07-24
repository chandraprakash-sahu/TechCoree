<?php
session_start();
include("conn.php");
?>
<html>
<head>
		<meta name="viewport" content="width-device-width, initial-scale=1.0, maximum-scale=1.0 ,user-scalable=no"> 
			<title>Tech Core</title>
			<link rel="stylesheet" href="CSS/style.css">
			<link rel="stylesheet" href="icons/css/all.min.css">
			<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script defer src="js/script.js"></script>
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
						<li class="nav-item"><a href="index.php" class="link activeeee">Home</a></li>
						<li class="nav-item"><a href="Services.php" class="link">Services</a></li>
						<li class="nav-item"><a href="About Us.php" class="link">AboutUs</a></li>
						<li class="nav-item"><a href="contact us.php" class="link">Contact Us</a></li>
						<?php
						if (!isset($_SESSION['uid'])) {
							?>
								<div class="nav-button21">
									<a href="Login.html" class="bttn white-btn">
										Login&nbsp;<i class="fa-solid fa-right-to-bracket"></i>
									</a>
									<a href="SignUp.php" class="bttn">
										Sign Up&nbsp;<i class="fa-solid fa-user-plus"></i>
									</a>
								</div>
							<?php
							} else {
								$uid = $_SESSION['uid'];
								$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'User';
							?>
								<li class="nav-item">
									<a href="profile.php" class="link">
										<p style="color:white;">
											<i class="fa-solid fa-user"></i>
											<strong><?php echo htmlspecialchars($username); ?></strong>
											<i class="fa-solid fa-angle-down"></i>
										</p>
									</a>

									<ul class="dropdown-menu">
										<li class="dropdown-item"><a href="profile.php">Profile</a></li>
										<li class="dropdown-item">
											<a href="cart.php">Cart <i class="fa-solid fa-cart-shopping"></i></a>
										</li>
										<li class="dropdown-item">
											<a href="profile.php?tab=order" class="order">Orders</a>
										</li>
										<li class="dropdown-item"><a href="products.php">Products</a></li>
										<hr>
										<li class="dropdown-item">
											<a href="Logout.php">Log Out <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
										</li>
									</ul>
								</li>
							<?php
							}
							?>
					</ul>
				</div>
					<?php
						if (!isset($_SESSION['email']))
							{
						
						?>
						<div class="nav-button21">
							<!-- <button data-modal-target="#pcbuildModal" class="pcbuild-btn">My PC Build</button> -->
						</div>
						<?php
							}
						?>
							<!-- PC Build Modal -->
								<div class="modal-pcbuild" id="pcbuildModal">
								<div class="modal-pcbuild-content">
									<div class="modal-pcbuild-header">
									<h2><i class="fa-solid fa-computer"></i> My PC Build</h2>
									<span class="close-pcbuild">&times;</span>
									</div>
									<div class="modal-pcbuild-body" id="pcbuild-products">
									<!-- Dynamic product data from database will be inserted here -->
									 <div class="pcbuild-item">
										<img src="images/gpu.jpg" alt="GPU">
										<div class="pcbuild-item-details">
										<h4>RTX 4070 GPU</h4>
										<p>₹54,999</p>
										</div>
									</div>
									<div class="pcbuild-item">
										<img src="images/cpu.jpg" alt="CPU">
										<div class="pcbuild-item-details">
										<h4>Ryzen 9 7900X</h4>
										<p>₹39,499</p>
										</div>
									</div>
									<p>Loading your build...</p>
									</div>
									<div class="modal-pcbuild-footer">
									<button class="refresh-btn" onclick="loadPcBuild()">Refresh</button>
									<button class="close-btn" onclick="closePcBuild()">Close</button>
									</div>
								</div>
								</div>
								<div class="overlay-pcbuild" id="overlay-pcbuild"></div>


								
					<div class="ham-menu " onclick="toggleMenu()">
							<span></span>
							<span></span>
							<span></span>
					</div>
				
			
				
		</nav>
				
		<!-- navbar - End -->
		
		
		<!-- carousel - start -->
					<div class="carousel-container">
						<button class="prev btnn" onclick="moveSlide(-1)">&#10094;</button>
						<div class="carousel">
							<div class="carousel-slide">
								<div class="carousel-item">
									<img src="img/3.jpg" alt="Image 1">
									<div class="carousel-text">
										<h2>The macbook</h2>
										<p>13.3 inch Quad HD Display</p>
										<a href="#" class="carousel-btn">Learn More</a>
									</div>
								</div>
								<div class="carousel-item">
									<img src="img/2.jpg"alt="Image 2">
									<div class="carousel-text">
										<h2>The Multidisplay</h2>
										<p>The dual display computer with powerfull processor</p>
										<a href="#" class="carousel-btn">Learn More</a>
									</div>
								</div>
								<div class="carousel-item">
									<img src="img/1.jpg" alt="Image 3">
									<div class="carousel-text">
										<h2>The Multitasking computer</h2>
										<p>16GB Of Ram to do multitasking</p>
										<a href="#" class="carousel-btn">Learn More</a>
									</div>
								</div>
							</div>
						</div>
						<button class="next btnn" onclick="moveSlide(1)">&#10095;</button>
						
							<div class="conttainer">
								<div class="icon">
								<i class="search fas fa-solid fa-magnifying-glass"></i>
								</div>
								<div class="inputt">
									<input type="text" placeholder="Search..." id="search">
									<i class="clear fa-solid fa-xmark"></i>
								</div>
							
							</div>
					</div>
				
					
		<!-- carousel - End -->	
					
		<!-- Product - Strat -->	
			<div class="body">
					
					<div class="grid-container ">
						
							
							
						<?php
							$sql="select * from product_tbl limit 9";
								$result =mysqli_query($conn,$sql);
								$data = mysqli_num_rows($result);
								
							if($data){	
								while($row=mysqli_fetch_array($result)){
									$id = $row['p_id'];
						?><div class="card ">
								<?php
										if(isset($_SESSION['email'])){
									?>
									<a href="view_product.php?p_id=<?php echo$row['p_id'].",".'u_id='.$uid;?>">
								<img src="../TechCoree/product_img/<?php echo $row['img'];?>" class="img21" ><br>
								<h4 class="heading3">
									<span class="inner-heading"><?php echo $row['product_name'];?></span><br>
									<span class="inner-heading "><?php echo $row['description'];?></span><br>
								</h4>
								<div class="foott">
									
									<button>Buy Now</button>
									
									<span>&#x20B9;<?php echo $row['price'];?></span>
								</div>
									</a>
						<?php 
							}else{
								?>	
									<a href="view_product.php?p_id=<?php echo$row['p_id'];?>">
								<img src="../techcoree/product_img/<?php echo $row['img'];?>" class="img21" ><br>
								<h4 class="heading3">
									<span class="inner-heading"><?php echo $row['product_name'];?></span><br>
									<span class="inner-heading "><?php echo $row['description'];?></span><br>
								</h4>
								<div class="foott">
									
									<button>Buy Now</button>	
									
									<span>&#x20B9;<?php echo $row['price'];?></span>
								</div>
									</a>    
								<?php
							}
							?>								
								
								</div>
							<?php 
								}
							}
							?>		
							
														
					</div>
			</div>
			<!-- Product - end -->	
		
		
		
		<!-- Laptop check out - start -->
		<div class="desiggn ">
			<div class="headding ">
				<h1 class="">Check out The Best Laptop</h1>
				<h2 class="">For YOU!!</h2>
			</div>
			<div class="contaiiner ">
					<div class="caard ">
						<img src="img/9.jpg">
						<p>High performance</p>
						<a href="products.php">Check it</a>
					</div>
					<div class="caard ">
						<img src="img/11.jpg">
						<p>Multitasking</p>
						<a href="products.php">Check it</a>
					</div>
					<div class="caard ">
						<img src="img/10.jpg">
						<p>The Slimest</p>
						<a href="products.php">Check it</a>
					</div>
					<!-- <div class="caard ">
						<img src="img/30.jpg">
						<div class="det-01">
						 	<p>Latest </p>
							<a href="products.php">Check it</a>
						</div>
					</div> -->
			</div>
		
		</div>
		<!-- Laptop check out - End -->
		
		<!-- Products to sell  - Start -->


		<div class="sliderrr">
			<h3 class="headdd">You May Like</h3>
				<div class="slider-container">
				
					<?php
							$sql2="select * from product_tbl order by rand() limit 6";
								$result2 =mysqli_query($conn,$sql2);
								$data2 = mysqli_num_rows($result2);
								
							if($data2){	
								while($row2=mysqli_fetch_array($result2)){
									$id = $row2['p_id'];
									if(isset($_SESSION['email'])){
						?>
						
							<div class="product-card"><a href="view_product.php?p_id=<?php echo$row2['p_id'].",".'u_id='.$uid;?>" style="text-decoration:none;">
								<img src="../TechCoree/product_img/<?php echo $row2['img'];?>" alt="Product 1">
								
								<div class="product-info">
									<h3><?php echo $row2['product_name'];?></h3>
									<p><?php echo $row2['description'];?></p>
									<a class="price">&#x20B9;<?php echo $row2['price'];?></a>
								</div>
							</a></div>
					
						<?php 
									}else{
										?>
						<div class="product-card"><a href="view_product.php?p_id=<?php echo$row2['p_id'];?>" style="text-decoration:none;">
								<img src="../TechCoree/product_img/<?php echo $row2['img'];?>" alt="Product 1">
								
								<div class="product-info">
									<h3><?php echo $row2['product_name'];?></h3>
									<p><?php echo $row2['description'];?></p>
									<a class="price">&#x20B9;<?php echo $row2['price'];?></a>
								</div>
							</a></div>
										<?php

									}
								}
							}
							?>		
							
					<!-- Add more product-card divs here -->
				</div>
		</div>

		
		<!--  Products to sell - End -->
			
			<!-- service - Strat -->	
				<div class="  ">
						<div class="box21 ">
							<div  class="">
									<h2>Services for you</h2>
									<button><a href="#">Get Service</a></button>
							</div>
							<div class="gridd-container">
								<div class="card2 ">
									<div class="immg">
										<img src="img/12.jpg">
									</div>
									<h4>IT Support and Help Desk</h4>
									<p> A help desk is a service or support system that provides assistance to customers or users who have issues with a product, service, or system.</p>
								</div>
								<div class="card2 ">
									<div class="immg">
										<img src="img/13.jpg">
									</div>
									<h4>Network Services</h4>
									<p>Network services refer to the range of activities and technologies that are involved in the management, operation, and optimization of a network.</p>
								</div>
								
								<div class="card2 ">
									<div class="immg">
										<img src="img/14.jpg">
									</div>
									<h4>Cybersecurity Services</h4>
									<p>Cybersecurity services are a range of practices, tools, and technologies designed to protect computer systems, networks, and data from cyberattacks, unauthorized access, damage, or theft</p>
								</div>
								<div class="card2 ">
									<div class="immg">
										<img src="img/15.jpg">
									</div>
									<h4>Software Development and Support</h4>
									<p>Software development and support are crucial aspects of the lifecycle of any software application, from its initial design and development .</p>
								</div>
								<div class="card2 ">
									<div class="immg">
										<img src="img/16.jpg">
									</div>
									<h4>Data Recovery Services</h4>
									<p>Data Recovery Services refer to the process of retrieving lost, corrupted, or inaccessible data from damaged or malfunctioning storage devices like hard drives, SSDs, RAID arrays, or cloud storage. </p>
								</div>
								
								<div class="card2 ">
									<div class="immg">
										<img src="img/17.jpg">
									</div>
									<h4>Hardware Repair and Upgrades</h4>
									<p>Hardware Repair and Upgrades refer to services that focus on fixing, maintaining, and enhancing the physical components of a computer or other electronic devices like laptops, desktops, servers, smartphones, and networking equipment. </p>
								</div>
								
								
							</div>
						</div>
				</div>
				<!-- service - end -->
				
				<!-- New tech - Start -->


		<div class="sliderrr">
			<h3 class="headdd">Tech You May Like</h3>
				<div class="slider-container">
					<?php
							$sql2="select * from product_tbl order by rand() limit 6";
								$result2 =mysqli_query($conn,$sql2);
								$data2 = mysqli_num_rows($result2);
								
							if($data2){	
								while($row2=mysqli_fetch_array($result2)){
									$id = $row2['p_id'];
									if(isset($_SESSION['email'])){
						?>
						
							<div class="product-card"><a href="view_product.php?p_id=<?php echo$row2['p_id'].",".'u_id='.$uid;?>" style="text-decoration:none;">
								<img src="../TechCoree/product_img/<?php echo $row2['img'];?>" alt="Product 1">
								
								<div class="product-info">
									<h3><?php echo $row2['product_name'];?></h3>
									<p><?php echo $row2['description'];?></p>
									<a class="price">&#x20B9;<?php echo $row2['price'];?></a>
								</div>
								</a>
							</div>
					
						<?php 
									}else{
										?>
							<div class="product-card"><a href="view_product.php?p_id=<?php echo$row2['p_id']?>" style="text-decoration:none;">
								<img src="../TechCoree/product_img/<?php echo $row2['img'];?>" alt="Product 1">
								
								<div class="product-info">
									<h3><?php echo $row2['product_name'];?></h3>
									<p><?php echo $row2['description'];?></p>
									<a class="price">&#x20B9;<?php echo $row2['price'];?></a>
								</div>
								</a>
							</div>
										
										<?php
									}
								}
							}
							?>		
							
					<!-- Add more product-card divs here -->
				</div>
		</div>

		
		<!--  Products to sell - End -->
				
					<!-- Subscription - start		 -->
					
					<div class="sub-body ">
						<div class="headingg ">
							<h2>Subscription</h2>
							<p>Being digital is new Trend.</p>
						</div>
							<div class="containerr ">
								<div class="cardd ">
									<h3><i class="fa-solid fa-bolt"></i>Free Plan <i class="fa-solid fa-indian-rupee-sign"></i>0/M</h3>
									<hr>
								
									<li><i class="fa-solid fa-check"></i> Basic product access</li>
									<li><i class="fa-solid fa-check"></i> Standard delivery</li>
									<li><i class="fa-solid fa-check"></i> Limited support (email only)</li>
									<li><i class="fa-solid fa-xmark"></i> No free shipping</li>
									<li><i class="fa-solid fa-xmark"></i> No priority updates</li>
										
										<div class="pay-btn">
											<button>Pay Now</button>
										</div>
								</div>
								
								<div class="cardd ">
									<h3><i class="fa-solid fa-bolt"></i>Pro Plan <i class="fa-solid fa-indian-rupee-sign"></i>49/M</h3>
										<hr>	

									<li><i class="fa-solid fa-check"></i> Access to all products</li>
									<li><i class="fa-solid fa-check"></i> Fast delivery service</li>
									<li><i class="fa-solid fa-check"></i> Free shipping on orders above <i class="fa-solid fa-indian-rupee-sign"></i>100</li>
									<li><i class="fa-solid fa-check"></i> Priority email support</li>
									<li><i class="fa-solid fa-check"></i> Monthly discount coupons</li>
										
										<div class="pay-btn">
											<button>Pay Now</button>
										</div>
								</div>
								
								<div class="cardd ">
									<h3><i class="fa-solid fa-bolt"></i>Premium Plan <i class="fa-solid fa-indian-rupee-sign"></i>79/M</h3>
										<hr>
									<li><i class="fa-solid fa-check"></i> Unlimited access to all premium features</li>
									<li><i class="fa-solid fa-check"></i> Express 24-hour delivery</li>
									<li><i class="fa-solid fa-check"></i> Free shipping on all orders</li>
									<li><i class="fa-solid fa-check"></i> VIP customer support (chat & phone)</li>
									<li><i class="fa-solid fa-check"></i> Early access to new products</li>
									<li><i class="fa-solid fa-check"></i> Exclusive member-only offers</li>
										
										<div class="pay-btn">
											<button>Pay Now</button>
										</div>
								</div>
							</div>
					</div>
					
					<!-- Subscription - end-->
				
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
						
				<!-- <p class="center">Chandra Prakash Sahu || All Right Reserved@2025</p> -->
				</footer>
				
			</div>
		<!-- Footer - End	 -->
		<script>
			function toggleMenu(){
				document.querySelector('.nav-menu21').classList.toggle('activee');
			}
				
			let search = document.querySelector(".search");
			let clear = document.querySelector(".clear");
			
			search.onclick = function(){
			document.querySelector(".conttainer").classList.toggle('active');
			}
			clear.onclick = function(){
			document.getElementById("search").value = "";
		}
			

				// scroll on animatiion
			const observer = new IntersectionObserver((entries) => {
					entries.forEach((entry) => { 
					console.log(entry)
						if(entry.isIntersecting){
							entry.target.classList.add('show');
						}else{
							entry.target.classList.remove('show');
						}
						});
						});
						
			const hiddenElements = document.querySelectorAll('.hidden');
			hiddenElements.forEach((el) => observer.observe(el));
			// scroll on animation - end

						//pc build modal - start
			 	const openModalBtn = document.querySelector('[data-modal-target="#pcbuildModal"]');
				const modal = document.getElementById('pcbuildModal');
				const overlay = document.getElementById('overlay-pcbuild');
				const closeModalBtn = document.querySelector('.close-pcbuild');

				openModalBtn.addEventListener('click', () => {
					modal.classList.add('active');
					overlay.classList.add('active');
					loadPcBuild(); // load data when opened
				});

				closeModalBtn.addEventListener('click', closePcBuild);
				overlay.addEventListener('click', closePcBuild);

				function closePcBuild() {
					modal.classList.remove('active');
					overlay.classList.remove('active');
				}

				function loadPcBuild() {
					// Example dynamic content loader (replace with PHP AJAX)
					const container = document.getElementById('pcbuild-products');
					
				}
				//pc build modal - End

		</script>
</body>
</html>
		