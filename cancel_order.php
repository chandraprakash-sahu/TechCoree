<?php
		session_start();
	
		include "Conn.php";
		
			if(!isset($_SESSION['email'])){
				header("location: profile.php");
			}
			
		 $oid = $_GET['o_id'];
		
			$sql="delete from order_tbl where o_id = '$oid'";
			$result = mysqli_query($conn , $sql);
			
			if($result){
				?>
					<script>	
						alert("Order Cancel successfully")
						window.open("profile.php?tab=order","_self");
						
					</script>
				<?php	
			}else{
				?>
					<script>
					 alert("Error deleting Order")
					 window.open("profile.php?tab=order","_self");
					</script>
				<?php	
			}
			
?>