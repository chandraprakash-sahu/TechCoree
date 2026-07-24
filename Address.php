<?php
		session_start();
		include "Conn.php";
			
			if(!isset($_SESSION['email'])){
				
				header("location: profile.php");
			}
			
			$email = $_SESSION['email'];
			
			if($_SERVER["REQUEST_METHOD"]=="POST"){
					$first_name = $_POST['first_name'];
					$last_name = $_POST['last_name'];
					$house = $_POST['house_no'];
					$road = $_POST['road'];
					$state = $_POST['state'];
					$city = $_POST['city'];
					$pincode = $_POST['pincode'];
					$brief_add = $_POST['brief_add'];
					
					
					$sql="insert into Address_tbl (first_name,last_name,email , house_no ,road, state,city,pincode,brief_add) values('$first_name','$last_name','$email','$house','$road','$state','$city','$pincode','$brief_add')";
					
					if($conn->query($sql)){
						echo"<input type='button'  onclick='alert('Data entered Successfuly')' >";
						header("location: profile.php");
						
					}else{
							echo"<input type='button'  onclick='alert('Something is Wrong')' >";
							header("location: profile.php");
							
					}
				
			}
			
			
?>