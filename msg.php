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
	<title>All Messages</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="icons/css/all.min.css">
	<link rel="stylesheet" href="CSS/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="icon" type="image/png" href="img/TC logo.png">
	<style>
		body {
			background-color: #f4f6f9;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			color: #333;
			padding: 20px;
			
		}
		h3 {
			text-align: center;
			margin-bottom: 30px;
			color: #007bff;
		}
		.m-wrapper {
			display: flex;
			flex-direction: column;
			gap: 20px;
			max-width: 900px;
			margin: 0 auto;
		}
		.m-item {
			display: flex;
			justify-content: space-between;
			align-items: flex-start;
			background: #fff;
			border-radius: 10px;
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
			padding: 20px;
			transition: transform 0.3s ease;
			position: relative;
		}
		.m-item:hover {
			transform: scale(1.01);
		}
		.left {
			display: flex;
			flex-direction: column;
			gap: 10px;
			flex: 3;
		}
		.left h4 {
			margin: 0;
			font-size: 1.4rem;
			font-weight: 600;
		}
		.left p {
			margin: 5px 0;
			color: #555;
			font-size:1.2em;
		}
		.left h5 {
			margin: 0;
			font-size: 1rem;
			color: #888;
		}
		.right {
			display: flex;
			flex-direction: column;
			align-items: flex-end;
			justify-content: space-between;
		}
		.actions-01 {
			display: flex;
			flex-direction: row;
			gap: 10px;
		}
		.actions-01 button {
			border: none;
			padding: 8px 14px;
			border-radius: 6px;
			font-size: 12px;
			cursor: pointer;
			transition: all 0.3s ease;
		}
		.reply-btn {
			background-color: #28a745;
			color: #fff;
		}
		.reply-btn:hover {
			background-color: #218838;
		}
		.remove-btn {
			background-color: #dc3545;
			color: #fff;
		}
		.remove-btn a{
			text-decoration:none;
		}
		.remove-btn:hover {
			background-color: #c82333;
		}
		@media (max-width: 768px) {
			.cart-item {
				flex-direction: column;
				align-items: flex-start;
			}
			.right {
				align-items: flex-start;
				margin-top: 15px;
			}
		}
	</style>
</head>
<body>

<div class="container">
	<a onclick="history.back()"><i class="fa-solid fa-arrow-left"></i></a>
    <h3>Messages <i class="fa-solid fa-envelope-open-text"></i></h3>
    
    <div class="m-wrapper">
        <?php
        $cart = "SELECT * FROM contact_msg";
        $cart_result = $conn->query($cart);
        if ($cart_result->num_rows > 0) {
            while ($c_row = $cart_result->fetch_assoc()) {
        ?>
        <div class="m-item">
            <!-- Left Side -->
            <div class="left">
                <h4><i class="fa-solid fa-user"></i><?php echo $c_row['fullname']." ". $c_row['m_id']; ?></h4>
                <p><?php echo  $c_row['message']; ?></p>
                <h5><?php echo $c_row['email']; ?></h5>
            </div>

            <!-- Right Side -->
            <div class="right">
                <div class="actions-01">
                    <a href="#<?php echo $c_row['email']; ?>">
                        <button class="reply-btn"><i class="fas fa-reply"></i> Reply</button>
                    </a>
                    
                    <a onclick="return confirm('Delete Message?')" href="delete_msg.php?m_id=<?php echo $c_row['m_id'];?>"> <button type="submit" class="remove-btn"><i class="fas fa-trash"></i> Remove</button></a>
                    
                </div>
            </div>
        </div>
        <?php
            }
        } else {
            echo "<p>No messages found.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>

