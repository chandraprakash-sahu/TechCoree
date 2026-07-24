<?php
		session_start();
		include"Conn.php";
		
		if(!isset($_SESSION['email'])){
				header("location: profile.php");
			}
			
	 $id = $_GET['a_id'];
	 $email=$_SESSION['email'];
		
			if($_SERVER["REQUEST_METHOD"]=="POST"){
					$house = $_POST['house_no'];
					$road = $_POST['road'];
					$state = $_POST['state'];
					$city = $_POST['city'];
					$pincode = $_POST['pincode'];
			$brief_add =$_POST['brief_add'];
			
			$update="update address_tbl set house_no ='$house',road='$road',state='$state',city='$city',pincode='$pincode', brief_add='$brief_add' where a_id='$id' and email='$email'";
			
			if($conn->query($update)){
				echo "Address updated";
			}else{
				echo"error updating address";
				
			}
				header("location; profile.php");
				exit();
			
			
					
			}
			
			$sql=" select * from address_tbl where a_id = '$id' and email ='$email'";
				$result = $conn->query($sql);
				
				if($result-> num_rows ==1){
					$row= $result->fetch_assoc();
				}else{
					echo"address not found";
					exit();
				}
				
			
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Address</title>
<link rel="stylesheet" href="icons/css/all.min.css">

<style>
    /* Page background */
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1f1f1f, #2c2c2c, #000);
        color: #fff;
        height: 100vh;
        margin: 20px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Form container */
    .form-container {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 30px 40px;
        width: 380px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(8px);
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #fff;
        letter-spacing: 1px;
    }

    /* Input wrapper (for icon + input) */
    .input-group {
        position: relative;
        margin-bottom: 18px;
    }

    .input-group i {
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
        color: #aaa;
        font-size: 16px;
    }

    .input-group input,
    .input-group textarea {
        width: 87%;
        padding: 12px 12px 12px 38px;
        border: none;
        outline: none;
        border-radius: 8px;
        font-size: 15px;
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        transition: all 0.3s ease;
    }

    .input-group input:focus,
    .input-group textarea:focus {
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 0 0 8px rgba(0, 140, 255, 0.3);
    }

    .input-group textarea {
        resize: none;
        height: 80px;
    }

    /* Submit button */
    .form-container button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #007bff, #0047b3);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .form-container button:hover {
        background: linear-gradient(135deg, #0056b3, #003080);
    }
</style>
</head>

<body>

<div class="form-container">
    <h2><i class="fa-solid fa-location-dot"></i> Edit Address</h2>

    <form method="post">
        <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="first" placeholder="First Name" value="<?php echo $row['first_name']; ?>" required>
        </div>
        <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="last" placeholder="Last Name" value="<?php echo $row['last_name']; ?>" required>
        </div>
        <div class="input-group">
            <i class="fa-solid fa-house"></i>
            <input type="text" name="house_no" placeholder="House No..." value="<?php echo $row['house_no']; ?>" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-road"></i>
            <input type="text" name="road" placeholder="Road..." value="<?php echo $row['road']; ?>" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-map"></i>
            <input type="text" name="state" placeholder="State..." value="<?php echo $row['state']; ?>" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-city"></i>
            <input type="text" name="city" placeholder="City..." value="<?php echo $row['city']; ?>" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-location-pin"></i>
            <input type="text" name="pincode" placeholder="Pincode..." value="<?php echo $row['pincode']; ?>" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-landmark"></i>
            <textarea name="brief_add" placeholder="Nearby Landmarks..."><?php echo $row['brief_add']; ?></textarea>
        </div>

        <button type="submit"><i class="fa-solid fa-check"></i> Update Address</button>
    </form>
</div>

</body>
</html>
