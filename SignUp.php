<html>
<head>
			<title>Sign Up</title>
			<link rel="stylesheet" href="style.css">
			
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/style.css">
			<script src="js/jquery.min.js"></script>
			<script src="js/script.js"></script>
			<script src="js/bootstrap.min.js"></script>
</head>
<body class="background">


		<div class="wrapper2">
			<?php
				session_start();
				
					include "Conn.php";
						
					
							if(isset($_POST['registor'])){
							$name = $_POST['username'];
							$email = $_POST['email'];
							$password = $_POST['password'];
							$c_password = $_POST['c_password'];
							
								
								$query = "select * from resistration_tbl where email='{$email}'";
				$res = mysqli_query($conn, $query);

				if (mysqli_num_rows($res) > 0){
					
					echo "<div class=''>
						<a href='#' class='' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>warning!</strong> This email is used, Try another One Please!</div>";
				}else{
					
					if($password == $c_password){

						$sql = "insert into resistration_tbl(username,email,password) values('$name','$email','$password')";

						$result = mysqli_query($conn, $sql);
						
						if($result){

							echo"<div class='alert alert-success alert-dismissible fade in'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<strong>success !</strong> You are register successfully!!!</div>";
							?>
								<script type="text/javascript">
									alert("You are Registered Successfully")
									window.open("login.html","_self");
								</script>
							<?php
					
					} else {
								
								echo"<div class=''><p>Something is worng!!</p></div>";
							
						}
					}else{
						echo "<div class=''>
						<a href='#' class='' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>warning!</strong> Password does not match.</div>";
					}
					
				}
							
										
			}
					
			?>
		
			<h1 class="signup21">Sign Up</h1>
				<form method="post" class="formHT">
					<div>
							<label for="fullname-input" class="label2">
								<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
							</label>
						<input class="input21" type="text" name="username" id="fullname-input" value="" placeholder="Fullname" REQUIRED>	
					</div>
					<div>
							<label for="email-input" class="label2">
								<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/></svg>
							</label>
						<input class="input21" type="email" name="email" id="email-input" value="" placeholder="Email" REQUIRED>	
					</div>
					<div>
							<label for="Password-input" class="label2">
								<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z"/></svg>
							</label>
						<input class="input21" type="Password" name="password" id="Password-input" value="" placeholder="Password" REQUIRED>	
					</div>
					<div>
							<label for="repeatpassword-input" class="label2">
								<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z"/></svg>
							</label>
						<input class="input21" type="password" name="c_password" id="repeatpassword-input" value="" placeholder="Repeat Password" REQUIRED>	
					</div> 
					
						<button name="registor" type="submit" class="signupbtn">Sign Up</button>
						
				</form>
					<div>
						<button class="goggle_l">
							<a href="google-login.php">Login with<i class="fa-brands fa-google"></i>oggle </a>
						</button>
					</div>
					<p>Already Have an Account?<a href="login.html" class="Loginbtn21">Login</a></p>
		</div>


</body>
</html>
