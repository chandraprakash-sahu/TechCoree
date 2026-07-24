<?php
session_start();

include("conn.php");


if (!isset($_SESSION['email'])) {
    header("location:login.html");
}
$uid = $_SESSION['uid'];
	
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My cart || TechCore</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="icons/css/all.min.css">
	<link rel="stylesheet" href="CSS/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="icon" type="image/png" href="img/TC logo.png"> 
	<style>
		.cart-wrapper {
	display: flex;
	flex-direction: column;
	gap: 20px;
}

.cart-item {
	display: flex;
	justify-content: space-between;
	align-items: center;
	background: #fff;
	border-radius: 8px;
	box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
	padding: 15px 20px;
	transition: transform 0.2s;
}

.cart-item:hover {
	transform: scale(1.01);
}

/* Left Partition */
.left {
	display: flex;
	align-items: center;
	gap: 15px;
	flex: 2;
}

.left img {
	width: 120px;
	height: 120px;
	border-radius: 5px;
	object-fit: cover;
}

.left .info h5 {
	margin: 0;
	font-size: 1.5rem;
	color: #333;
}

.left .info p {
	margin: 5px 0 0;
	color: #555;
	font-size: 1.1rem;
}

/* Right Partition */
.right {
	text-align: right;
	display: flex;
	flex-direction: column;
	align-items: flex-end;
	flex: 1;
}

.right .price {
	font-size: 1.2em;
	font-weight: bold;
	color: #007bff;
	margin-bottom: 10px;
}

.actions button {
	border: none;
	padding: 6px 12px;
	background-color: #007bff;
	color: white;
	cursor: pointer;
	border-radius: 5px;
	font-size: 14px;
	margin: 5px 0;
	transition: background-color 0.3s;
}

.actionn a {
	text-decoration:none;
}
.actions button:hover {
	background-color: #0056b3;
}

/* Mobile Responsive */
@media (max-width: 768px) {
	.cart-item {
		flex-direction: column;
		align-items: flex-start;
	}

	.right {
		align-items: flex-start;
		width: 100%;
		margin-top: 10px;
	}

	.left {
		flex-direction: column;
		align-items: flex-start;
	}
}

	</style>
</head>
<body>
	
 <div class="container"> <!-- "Container" class also for contact form -->
    <h3>My Cart<i class="fa-solid fa-cart-shopping"></i></h3>
    
    <div class="cart-wrapper">
        <?php
        $cart=" SELECT resistration_tbl.u_id,resistration_tbl.username,cart_tbl.cart_id,cart_tbl.p_id,cart_tbl.c_id,product_tbl.product_name,product_tbl.description,product_tbl.price,product_tbl.img FROM cart_tbl JOIN product_tbl ON cart_tbl.p_id = product_tbl.p_id JOIN resistration_tbl ON cart_tbl.c_id = resistration_tbl.u_id WHERE cart_tbl.c_id = '$uid'";
        $cart_result= $conn->query($cart);
        if($cart_result->num_rows > 0){
            while($c_row = $cart_result->fetch_assoc()){
        ?>
        <div class="cart-item">
            <!-- Left Partition -->
            <div class="left">
                <img src="../TechCoree/product_img/<?php echo $c_row['img'];?>" alt="Product Image">
                <div class="info">
                    <h5><?php echo $c_row['product_name'];?></h5>
                    <p><?php echo $c_row['description'];?></p>
                </div>
            </div>

            <!-- Right Partition -->
            <div class="right">
                <div class="price">&#x20B9;<?php echo $c_row['price'];?></div>
                <div class="actionns">
                    <a class="white" href="remove_cart.php?cart_id=<?php echo $c_row['cart_id']?>">Remove</a>
                   <a class="white" href="buy_now.php?p_id=<?php echo $c_row['p_id']; ?>&cart_id=<?php echo $c_row['cart_id']; ?>">Order Now</a>

                </div>
            </div>
        </div>
        <?php
			}
			
        }else{
				?>
				<p>Your Cart is Empty!!</p>
				<?php
			}
        ?>
    </div>
</div>

</body>
</html>
