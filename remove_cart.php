<?php
		session_start();
	
		include "Conn.php";
		
			if(!isset($_SESSION['email'])){
				header("location: profile.php");
			}
			
		echo $id = $_GET['cart_id'];
		
			$sql="delete from cart_tbl where cart_id = '$id'";
			$result = mysqli_query($conn , $sql);
			
			if($result){
				?>
					<script>	
						alert("Data deleted successfully")
						window.open("cart.php","_self");
						
					</script>
				<?php	
			}else{
				?>
					<script>
					 alert("Error deleting Address")
					 window.open("cart.php","_self");
					</script>
				<?php	
			}
			
?>