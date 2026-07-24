<?php
session_start();
$activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'profile';
include("conn.php");
$email = $_SESSION['email'];

if (!isset($_SESSION['email'])) {
    header("location:login.html");
}

$uid = $_SESSION['uid'];
$email = $_SESSION['email'];
			$query = "select * from resistration_tbl where email = '{$email}'";
			
					$res = mysqli_query($conn, $query);
					
					$data=(mysqli_num_rows($res));
					
					$row = mysqli_fetch_array($res);
					
					if($_SERVER["REQUEST_METHOD"]=="POST"){
						
						$first_name=$_POST['first_name'];
						
						$last_name=$_POST['last_name'];
						
						$email=$_SESSION['email'];
						
								$sql="update resistration_tbl set first_name='$first_name' , last_name='$last_name' where email = '$email'";
						
						if($conn->query($sql)===true){
							
							$_SESSION['first_name'] = $first_name;
							
							$_SESSION['last_name'] = $last_name;
							
						} else{
							
							echo "Error updating.".$conn->error;
							
						}
					}
			if (isset($_POST['set_default'])) {
				$selected_aid = $_POST['default_address'];
				$email = $_SESSION['email'];

				// Reset all addresses to not default
				$conn->query("UPDATE address_tbl SET is_default = 0 WHERE email = '$email'");

				// Set chosen one as default
				$conn->query("UPDATE address_tbl SET is_default = 1 WHERE a_id = '$selected_aid'");

				echo "<script>alert('Default address updated successfully!'); window.location.href='profile.php';</script>";
			}


?>
<!DOCTYPE html>

<html lang="en">
	<head>
	
		<meta charset="UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
			<title>Profile Settings</title>
			
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="icon" type="image/png" href="img/TC logo.png">
			<script src="js/jquery.min.js"></script>
			<link rel="stylesheet" href="icons/css/all.min.css">
			<script src="js/bootstrap.min.js"></script>
			
			<link rel="stylesheet" href="CSS/style.css">
	
		  <style>
			
			#updateBtn{
				
				display: none;
				
			}
			.product_order{
				display: flex;
			}
			.product_order .img_order{
				flex: 1;
			}
			.product_order .p_desc{
				position: relative;
				flex: 1;
				margin: 20px;
			}
			.product_order .p_desc span{
					position: absolute;
					top: 80%;
					left: 80%;
			} 
			.product_order .img_order button{
				margin:10px;
				padding: 10px;
				bg: none;
			}
			.img_order{
	  
				  width:200px;
				  
			  }
			 .img_order img{
				 
				 max-width:100%;
				 
			 }
			.actions a {
				margin-bottom: 20px;
				font-size: 14px;
				padding:12px;
				border-radius:1000px;
				text-decoration: none;
				color: black;
			}
		  </style>
		  
	</head>
	
	<body>
	
<div class="containerrrrr">
  
		<aside class="sidebarr">
	
			<div class="profile-header">
	  
				<div class="avatar"></div>
		
					<div class="username">
		
						<p>Hello,</p>
		  
						<span style="color:black;"><strong><?php echo $_SESSION['username'];?></strong></span>
		   
					</div>
		
			</div>
	  
				<nav class="menu">
				
											
					<hr>
					
						<div class="menu-group">
						
						  <h4>ACCOUNT SETTINGS</h4>
						  
						  <ul>
						  
							<li class="active"><a data-toggle="tab" href="#profile">Profile Information</a></li>
							
							<li><a data-toggle="tab" href="#address">Saved Addresses</a></li>
							
							<li><a data-toggle="tab" href="#order">My Orders</a></li>
							
							<li><a data-toggle="#" href="cart.php">My Cart</a></li>
							
							<!-- <li><a data-toggle="tab" href="#build">My Pc Builds</a></li> -->
							
						  </ul>
						  
						</div>
					
					<hr>
					
						<div class="menu-group">
						
						  <h4>PAYMENTS</h4>
						  
						  <ul>
						  
							<li>Gift Cards <span class="green">₹0</span></li>
							
							<li>Saved UPI</li>
							
							<li>Saved Cards</li>
							
						  </ul>
						  
						</div>
					
				</nav>
				  
					<div class="logout">
							<a href="Forget.php"> <button>Manage Password</button></a>
						   <hr>
						   <a href="logout.php"> <button>Logout</button></a>
					</div>
		</aside>
	
	<main class="content2">
			<a class="back" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i></a>
		<section class="section">
		  
			<div class="tab-content">

				<div id="profile" class="tab-pane fade in active">
				
					<form method="post" oninput="checkInputs()">
					
						<div class="section-header">
						
						  <h2>Personal Information</h2>
						  
						  
						</div>
						
						<div class="input-group">
						<?php
							  $sql3 = "SELECT * FROM resistration_tbl WHERE email = '$email'";
        							$result3 = $conn->query($sql3);

        						if($result3->num_rows > 0){
									$row3 = $result3->fetch_assoc()
								
						?>
						  <input class="input2" type="text" name="first_name" id="first_name" value="<?php if(!empty($row3['first_name'])){echo $row3['first_name'];}else{echo "First Name";}?>" >
						  
						  <input class="input2"  type="text" name="last_name" id="last_name" value="<?php if(!empty($row3['last_name'])){echo $row3['last_name'];}else{echo "Last Name";}?>" >
						  
						  <?php
								} 
						  ?>
						</div>
					

						<div class="section-header">
						
						  <h4>Email Address</h4>
						  
						  
						</div>
					
							<input class="input2"  type="email" value="<?php echo $_SESSION['email'];?>" disabled>
					
					

						<div class="section-header">
						
						  <h4>Mobile Number</h4>
						  
						  
						</div>
					
							<input class="input2" type="text" value="+917943634049" >

						<div class="actions">
						  
							<a href="acc delete.php" class="delete">Delete Account</a>
						  
						</div>
						
						<button type="submit" id="updateBtn">Update</button>
						
					</form>
					
				</div>
				
		<div id="address" class="tab-pane fade">

    <details>
        <summary style="cursor: pointer; color:#337ab7;"><h3>Add New Address+</h3></summary>

        <form method="post" action="Address.php">
            <div class="section-header">
                <a href="#">Edit</a>
            </div>

            <div class="input-group">
                <input class="input2" type="text" name="first_name" id="first_name" value="<?php if(!empty($_SESSION['first_name'])){echo $_SESSION['first_name'];}else{echo 'First Name';}?>" required>
                <input class="input2" type="text" name="last_name" id="last_name" value="<?php if(!empty($_SESSION['last_name'])){echo $_SESSION['last_name'];}else{echo 'Last Name';}?>" required>
            </div>

            <input class="input2" type="text" name="house_no" placeholder="House No" required>
            <input class="input2" type="text" name="road" placeholder="Road or Street" required>
            <input class="input2" type="text" name="state" placeholder="State" required>
            <input class="input2" type="text" name="city" placeholder="City" required>
            <input class="input2" type="text" name="pincode" placeholder="Pincode" required>
            <textarea name="brief_add" placeholder="Near by Landmarks"></textarea>

            <div>
                <button class="a-bttn" type="submit">Submit</button>
            </div>
        </form>
    </details>

    <hr>
    <div><h2>Saved Address</h2></div>

    <form method="POST" action="">
        <?php
        
        $sql2 = "SELECT * FROM address_tbl WHERE email = '$email'";
        $result = $conn->query($sql2);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px; border-radius:8px;'>";

                // Show default tag if this is default
                if($row['is_default'] == 1){
                    echo "<span style='color:green; font-weight:bold;'>✓ Default Address</span><br>";
                }

                echo "<strong>Full Name:</strong> ".$row3['first_name'].' '.$row3['last_name']."<br>";//from resistration tbl
                echo "<strong>House No.:</strong> ".$row['house_no']."<br>";
                echo "<strong>Road:</strong> ".$row['road']."<br>";
                echo "<strong>State:</strong> ".$row['state']."<br>";
                echo "<strong>City:</strong> ".$row['city']."<br>";
                echo "<strong>Pincode:</strong> ".$row['pincode']."<br>";
                echo "<strong>Landmark:</strong> ".$row['brief_add']."<br><br>";

                // ✅ Default address selector
                echo "<label><input type='radio' name='default_address' value='".$row['a_id']."' ".($row['is_default'] == 1 ? "checked" : "")."> Set as Default</label><br><br>";

                echo "<a href='edit add.php?a_id=".$row['a_id']."'>Edit</a> || ";
                echo "<a onclick=\"return confirm('Are you sure you want to delete this address?');\" href='delete add.php?a_id=".$row['a_id']."'>Delete</a>";

                echo "</div>";
            }

            echo "<button type='submit' name='set_default' class='btn btn-primary'>Save Default Address</button>";
        } else {
            echo "<p>No address saved yet.</p>";
        }
        ?>
    </form>

    <div class="actions">
        <a href="acc delete.php" class="delete">Delete Account</a>
    </div>

</div>

					<div id="order" class="tab-pane fade ">
						<div class="section-header">
								  <h3>My Orders</h3>
						</div>
						
						<?php
							$join=" SELECT resistration_tbl.u_id,resistration_tbl.username,order_tbl.o_id,order_tbl.p_id,product_tbl.product_name,product_tbl.description,product_tbl.price,product_tbl.img FROM order_tbl	JOIN product_tbl ON order_tbl.p_id = product_tbl.p_id JOIN resistration_tbl ON order_tbl.c_id = resistration_tbl.u_id WHERE order_tbl.c_id = '$uid'";
								$join_result= $conn->query($join);
								if($join_result->num_rows > 0){
											
											while($o_row = $join_result->fetch_assoc()){
						?>
								
									<hr>
							<div class="product_order">		
								<div class="img_order">
								  <img src="../TechCoree/product_img/<?php echo $o_row['img'];?>">
									<button style="border:none;"><a onclick="return confirm('Are you sure You want to cancle This Product')" href="cancel_order.php?o_id=<?php echo$o_row['o_id']?>">Cancle</a></button>
								</div>
								<div class="p_desc">
								  <h3><?php echo $o_row['product_name'];?></h3>
									<p><?php echo $o_row['description'];?></p>
									<span>&#x20B9;<?php echo $o_row['price'];?></span>
								</div>
								
								
							</div>
							<hr>
						
						<?php
											}
								}
						?>
							
					</div>

					<!-- <div id="build" class="tab-pane fade ">
						<div class="section-header">
								  <h3>My Pc Build</h3>
						</div>
					</div> -->
			</div>
		</section>
	</main>
</div>
  <script>
		function checkInputs(){
			const fname = document.getElementById('first_name').value.trim();
			const lname = document.getElementById('last_name').value.trim();
			const btn = document.getElementById('updateBtn').value.trim();
			
			if(fname !== "" || lname !== ""){
				btn.style.display="inline-block";
			}else{
				btn.style.display="none";
			}
		}


			// Any tab from any page - start 
			document.addEventListener("DOMContentLoaded", function() {
			const activeTab = "<?php echo $activeTab; ?>";
			if (activeTab) {
				const tabTrigger = document.querySelector(`[href="#${activeTab}"]`);
				if (tabTrigger) {
				tabTrigger.click(); // Simulate a click on that tab link
				}
			}
			});
			// Order tab from any page - End
  </script>
	</body>
</html>