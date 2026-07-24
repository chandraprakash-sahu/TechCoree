<?php
	
	session_start();
	include "Conn.php";
	$pid = $_GET['p_id'];
	
	$sql = "SELECT * FROM product_tbl WHERE p_id = '$pid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $row['product_name']; ?> | TechCore</title>
<link rel="stylesheet" href="font-awesome/icons/all.min.css">
<link rel="icon" type="image/png" href="img/TC logo.png">
<link rel="stylesheet" href="CSS/style.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<style>
	/* ======== RESET & BASE ======== */
	body {
		margin: 0;
		padding: 0;
		font-family: "Poppins", sans-serif;
		background: #f9f9f9;
		color: #333;
	}

	
</style>
</head>
<body>

<div class="product_container1">

	<div class="section1">
		<div class="image-box1">
			<img src="../TechCoree/product_img/<?php echo $row['img']; ?>" alt="<?php echo $row['product_name']; ?>">
		</div>

		<div class="desc-box1">
			<h2><?php echo $row['product_name']; ?></h2>
			<p class="description"><?php echo $row['description']; ?></p>

			<div class="price-box1">
				<p class="price">&#x20B9;<?php echo $row['price']; ?></p>
				<p class="discount">Save 37% <small>Inclusive of all taxes</small></p>
				<p><small>EMI starts at ₹1,357. No Cost EMI available</small></p>
			</div>

			<div class="features-box1">
				<h3><i class="fa-solid fa-angles-right"></i> About this item</h3>
				<ul>
					<li><i class="fa-solid fa-tag"></i> Lloyd Window AC with Non-Inverter Compressor: Economical, easy to install, low noise & elegant design.</li>
					<li><i class="fa-solid fa-tag"></i> Warranty: 1 Year on product, 5 Years on component (including PCB).</li>
					<li><i class="fa-solid fa-tag"></i> 100% Inner Grooved Copper Tubes for better cooling & durability.</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="bottom-fixed1">
		<?php
			if(isset($_SESSION['email'])){
				$uid = $_SESSION['uid'];
		?>
			<a href="buy_now.php?p_id=<?php echo $row['p_id'].',u_id='.$uid;?>" class="buy-btn1 color1">Proceed to Buy &raquo;</a>
			<a href="add_cart.php?p_id=<?php echo $row['p_id'].',u_id='.$uid;?>" class="buy-btn1 color2">+ Add to Cart</a>
		<?php
			}else{
		?>
			<a href="login.html" class="buy-btn1 color1">Proceed to Buy &raquo;</a>
			<a href="login.html" class="buy-btn1 color2">+ Add to Cart</a>
		<?php 
			} 
		?>
	</div>

</div>

</body>
</html>
