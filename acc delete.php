<?php
	session_start();
		
	include "Conn.php";



if (!isset($_SESSION['email'])) {
    header("location:login.html");
}
		if($_SERVER["REQUEST_METHOD"]=="POST"){

			if(!isset($_POST['password'])){
					echo "Please Enter the password";
					
			}
				$email = $_SESSION['email'];
				$entered_password=$_POST['password'];
				
				$sql = "select * from resistration_tbl where email = '$email' and password = '$entered_password'";
				
				$result = $conn->query($sql);
				
				if($result->num_rows == 1){
					
					$delete = "delete from resistration_tbl where email = '$email'";
					
					if($conn->query($delete)){
						session_destroy();
						
						header("location: index.html");
					}else{
						echo "something went worng";
					}
				}else{
					echo "worng password";
					
				}
	
		}
?>
<html>
	<body>
		<form method="post">
		<input name="password" type="password" placeholder="Confirm Your password">
		<button type ="submit" value="submit">submit</button>
		
	</body>
</html>