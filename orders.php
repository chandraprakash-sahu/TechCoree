<?php
session_start();
include("conn.php");

if (!isset($_SESSION['type'])) {
    header("location:login.html");
}
	
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Products</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="icons/css/all.min.css">
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
	width: 100px;
	height: 80px;
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
	font-size: 1.2rem;
	font-weight: bold;
	color: #007bff;
	margin-bottom: 10px;
}

.actions-02 button {
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

.actions button:hover {
	background-color: #0056b3;
}


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

	.left{
		flex-direction: column;
		align-items: flex-start;
	}
}

	</style>
</head>
<body>
	
<div class="container">
<a onclick="history.back()"><i class="fa-solid fa-arrow-left"></i></a>
    <h3>All Orders<i class="fa-solid fa-cart-shopping"></i></h3>
    
    <div class="cart-wrapper">
        <?php
        $cart="SELECT resistration_tbl.email,resistration_tbl.username,order_tbl.o_id,order_tbl.p_id,order_tbl.c_id,product_tbl.product_name,product_tbl.description,product_tbl.price,product_tbl.img FROM order_tbl JOIN product_tbl ON order_tbl.p_id = product_tbl.p_id JOIN resistration_tbl ON order_tbl.c_id = resistration_tbl.u_id";
        $cart_result= $conn->query($cart);
        if($cart_result->num_rows > 0){
            while($c_row = $cart_result->fetch_assoc()){
        ?>
        <div class="cart-item">
            <!-- Left Partition -->
            <div class="left">
                <img src="../TechCoree/product_img/<?php echo $c_row['img'];?>" alt="Product Image">
                <div class="info">
					<h4><?php echo $c_row['username']; echo " , User-Id:".$c_row['c_id']?></h4>
                    <h5><?php echo $c_row['product_name'];?></h5>
                    <p><?php echo $c_row['description'];?></p>
                    <p><?php echo $c_row['o_id'];?></p>
                </div>
            </div>

            <!-- Right Partition -->
            <div class="right">
                <div class="price">&#x20B9;<?php echo $c_row['price'];?></div>
                <div class="actions-02">
				
                   <a onclick="return confirm('Delete Orders?')"; href="delete_orders.php?o_id=<?php echo $c_row['o_id'];?>"><button type="submit"> Delete</button></a>
                  
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>

</body>
</html>
