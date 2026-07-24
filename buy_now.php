<?php
	
	session_start();
	include "Conn.php";
	if (!isset($_SESSION['email'])) {
    header("location:login.html");
}
	$pid = isset($_GET['p_id']) ? $_GET['p_id'] : '';
	$cart_id = isset($_GET['cart_id']) ? $_GET['cart_id'] : '';


	if(!isset($_SESSION['email'])){
		header("location: login.html");
		exit();
	}
	
	$uid = $_SESSION['uid'];
	$email = $_SESSION['email'];

	$sql = "SELECT * FROM product_tbl WHERE p_id = '$pid'";
	$result = mysqli_query($conn, $sql);
	$row2 = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buy Product | TechCore</title>
<link rel="stylesheet" href="font-awesome/icons/all.min.css">
<link rel="icon" type="image/png" href="img/TC logo.png">
<link rel="stylesheet" href="CSS/style.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<style>
	/* ===== GLOBAL ===== */
	body {
		margin: 0;
		padding: 0;
		font-family: "Poppins", sans-serif;
		background: #f5f6fa;
		color: #333;
	}

	h2, h3 {
		font-weight: 600;
		color: #2f3640;
	}
	
</style>
</head>
<body>

<div class="main-buy-container">

	<!-- LEFT SECTION -->
	<div class="left-section1">
		<div class="delivery-box1">
			<?php 
				$sql2 = "SELECT * FROM address_tbl WHERE email = '$email' AND is_default = 1 LIMIT 1";
				$result2 = $conn->query($sql2);

				if ($result2->num_rows > 0) {
					$row = $result2->fetch_assoc();
					echo "<h3>Delivered To:</h3>";
					echo "<h2>".$_SESSION['first_name'].' '.$_SESSION['last_name']."</h2>";
					echo "<p>House No. ".$row['house_no'].", ".$row['road'].", ".$row['state'].", ".$row['city']." - ".$row['pincode']."<br>".$row['brief_add']."</p>";
					echo "<button><a href='profile.php?tab=address' class='btn btn-primary'>Change Address</a></button>";
				} else {
					echo "<p>No default address found!</p>";
					echo "<button><a href='profile.php?tab=address' class='btn btn-white'>Add / Set Address</a></button>";
				}

			?>
		</div>

		<div class="product-box1">
			<div class="product-image1">
				<img src="../TechCoree/product_img/<?php echo $row2['img']; ?>" alt="<?php echo $row2['product_name']; ?>">
			</div>

			<div class="product-desc1">
				<h2><?php echo $row2['product_name']; ?></h2>
				<p>Storm Gray | High Sound Quality</p>
				<h3 class="discount"><i class="fa-solid fa-arrow-down"></i>37% OFF</h3>
				<p class="price">&#x20B9;<?php echo $row2['price']; ?></p>
				<hr>
					<div class="order-fixed1">
						<?php
							if(!empty($_GET['cart_id'])){
						?>
							<a href="continue.php?p_id=<?php echo $row2['p_id']; ?>&cart_id=<?php echo $_GET['cart_id']; ?>"
								onclick="return confirm('Are you sure you want to buy this product?');">
								Order Now &raquo;
								</a>

						<?php
							} else {
						?>
							<a href="continue.php?p_id=<?php echo $row2['p_id']; ?>"
							onclick="return confirm('Are you sure you want to buy this product?');">
							Order Now &raquo;
							</a>

						<?php
							}
						?>
					</div>

				<hr>
				<h3>Open Box Delivery</h3>
				<p><i class="fa-solid fa-tag"></i> Delivery agent will open the package so you can verify items before accepting.</p>
			</div>
		</div>
	</div>

	<!-- RIGHT SECTION -->
	<div class="payment-section1">
		<div class="payment-box1">
			<h2>Select Payment Method</h2>
			<form method="post" action="">
				<label><input type="radio" name="payment_method" value="Credit/Debit Card" onclick="showCardDetails1()"> Credit/Debit Card</label>
				<label><input type="radio" name="payment_method" value="UPI" onclick="hideCardDetails1()"> UPI</label>
				<label><input type="radio" name="payment_method" value="Net Banking" onclick="hideCardDetails1()"> Net Banking</label>
				<label><input type="radio" name="payment_method" value="Cash on Delivery" onclick="hideCardDetails1()"> Cash on Delivery</label>

				<div id="card-details1">
					<h3>Enter Card Details</h3>
					<label>Card Number</label>
					<input type="text" name="card_number" maxlength="16" placeholder="1234 5678 9012 3456">
					<label>Expiry Date</label>
					<input type="text" name="expiry_date" placeholder="MM/YY">
					<label>CVV</label>
					<input type="password" name="cvv" maxlength="3" placeholder="123">
					<label>Name on Card</label>
					<input type="text" name="card_name" placeholder="John Doe">
				</div>

				<hr>
				<h3>Other Options</h3>
				<label><input type="checkbox" name="save_card" value="1"> Save card for future payments</label>
				<label><input type="checkbox" name="use_wallet" value="1"> Use wallet balance if available</label>
				<button type="submit">Proceed</button>
			</form>
		</div>
	</div>

</div>



<script>
	function showCardDetails1(){
		document.getElementById("card-details1").style.display = "block";
	}
	function hideCardDetails1(){
		document.getElementById("card-details1").style.display = "none";
	}
</script>

</body>
</html>
