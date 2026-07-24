<?php
	include "Conn.php";
	$id = $_GET['u_id'];
	
		$query1= "DELETE FROM resistration_tbl WHERE u_id = '$id'";
		$result= mysqli_query($conn,$query1);
		
		if($result){
			?>
			<script>
							alert("User deleted Successfully")
								window.open("all_user.php","_self");
			</script>
			<?php
		}else{
			?>
			<script>
				alert("something is wrong")
				window.open("all_user.php","_self");
			</script>
			<?php
		}
?>