<?php
	session_start();
	
		include "Conn.php";
		
						
		
		if(isset($_POST['login'])){
				$email = $_POST['email'];
				$password = $_POST['password'];
				
				
				
					$sql = "select * from admin_tbl where email = '$email' and password = '$password'";
					
					$result = mysqli_query($conn , $sql);
					$row = mysqli_fetch_array($result , MYSQLI_ASSOC);
					$count = mysqli_num_rows($result);

								
								if($row["usertype"]==""){
										$_SESSION['uid'] = $row['u_id'];
										$_SESSION['email'] = $row['email'];
										$_SESSION['username'] = $row['username'];
										$_SESSION['first_name'] = $row['firstname'];
										$_SESSION['last_name'] = $row['last_name'];
										
									echo "<div class='message'><p>You are Login Successfully</p></div><br>";
									header("location:index.php");
								}elseif($row["usertype"]=="admin"){
									$_SESSION['uid'] = $row['u_id'];
									$_SESSION['username'] = $row['username'];
									$_SESSION['type'] = $row['usertype'];
									$_SESSION['email'] = $row['email'];
									echo "<div class='message'><p>You are Login Successfully</p></div><br>";
									header("location: Admin.php");
								}
								else {
									
									echo "<div class='message'><p>Wrong Email or Password</p></div><br>";
								}
								
								
		}
		
		

			
			
		
?>