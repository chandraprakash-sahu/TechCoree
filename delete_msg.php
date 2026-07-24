<?php
		session_start();
	include "Conn.php";
	$id = $_GET['m_id'];
	
		$query1= "DELETE FROM contact_msg WHERE m_id = '$id'";
		$result= mysqli_query($conn,$query1);
		
		if($result){
			?>
			<script>
					alert("Message deleted Successfully");
				</script>
			<?php
				header("Refresh:0; url=msg.php");
		}else{
			?>
			<script>
				alert("something is wrong")
			</script>
			<?php
			header("Refresh:0; url=msg.php");
		}
?>