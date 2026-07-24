<?php
	include "Conn.php";
	$id = $_GET['o_id'];
		$query1= "DELETE FROM order_tbl WHERE o_id = '$id'";
		$result= mysqli_query($conn,$query1);
		
		if($result){
			?>
			<script>
							alert("Order deleted Successfully")
				</script>
			<?php
			header("Refresh:0; url=orders.php");
		}else{
			?>
			<script>
				alert("something is wrong")
				
			</script>
			<?php
			header("Refresh:0; url=orders.php");
		}
?>