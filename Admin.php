<?php
session_start();
include("conn.php");
if (!isset($_SESSION['type'])) {
    header("location:login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Core Dashboard</title>
    <link rel="stylesheet" href="icons/css/all.min.css">
    <link rel="icon" type="image/png" href="img/TC logo.png">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <h3 class="h3">Welcome, <?php echo $_SESSION['username']; ?></h3>
       <a href="logout.php"> <button class="log-btn">Log Out</button></a>

        <div class="card-wrapper">
            <!-- All Products -->
			<a href="all_product.php" class="btn">
            <div class="card">
                <h2><i class="fas fa-box"></i> All Products</h2>
                <?php
                $sql = "SELECT COUNT(*) AS p_id FROM product_tbl";
                $res = $conn->query($sql);
                $row = mysqli_fetch_array($res);
                ?>
                <h4><?php echo $row['p_id']; ?></h4>
                </div>
			</a>
            <!-- Users -->
			<a href="all_user.php" class="btn">
            <div class="card">
                <h2><i class="fa-solid fa-users"></i> Users</h2>
                <?php
                $sql = "SELECT COUNT(*) AS u_id FROM resistration_tbl";
                $res = $conn->query($sql);
                $row = mysqli_fetch_array($res);
                ?>
                <h4><?php echo $row['u_id']; ?></h4>
                </div>
			</a>
            <!-- Orders -->
			 <a href="orders.php" class="btn">
				<div class="card">
					<h2><i class="fas fa-shopping-cart"></i> Orders</h2>
					<?php
					$sql = "SELECT COUNT(*) AS o_id FROM order_tbl";
					$res = $conn->query($sql);
					$row = mysqli_fetch_array($res);
					?>
					<h4><?php echo $row['o_id']; ?></h4>
				   </div>
				</a>
				
				 <!-- Messages -->
			<a href="msg.php" class="btn">
				 <div class="card">
					<h2><i class="fa-solid fa-message"></i> Messages</h2>
					<?php
					$sql = "SELECT COUNT(*) AS email FROM contact_msg";
					$res = $conn->query($sql);
					$row = mysqli_fetch_array($res);
					?>
					<h4><?php echo $row['email']; ?></h4>
				   </div>
			   </a>
            
               <a href="m_category.php" class="btn">
				 <div class="card">
					<h2><i class="fa-solid fa-folder"></i>Category</h2>
					<?php
					$sql = "SELECT COUNT(*) AS email FROM contact_msg";
					$res = $conn->query($sql);
					$row = mysqli_fetch_array($res);
					?>
					<h4><?php echo $row['email']; ?></h4>
				   </div>
			</a>
        </div>
    </div>
</body>
</html>
