<?php
		session_start();
	
		include "Conn.php";
		
			if(!isset($_SESSION['email'])){
				header("location: profile.php");
			}
			
		echo $id = $_GET['a_id'];
		
			$sql="delete from address_tbl where a_id = '$id'";
			$result = mysqli_query($conn , $sql);
			
			if($result){
				?>
					<script>	
						alert("Data deleted successfully")
						window.open("profile.php?tab=address","_self");
						
					</script>
				<?php	
			}else{
				?>
					<script>
					 alert("Error deleting Address")
					 window.open("profile.php?tab=address","_self");
					</script>
				<?php	
			}
			
?>