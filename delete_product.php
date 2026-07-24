<?php
	session_start();
	include "Conn.php";
	$id = $_GET['p_id'];
	
		$query1= "DELETE FROM product_tbl WHERE p_id = '$id'";
		$result= mysqli_query($conn,$query1);
		
		if($result){
			?>
			<script>
							alert("Product deleted Successfully")
								window.open("all_product.php","_self");
			</script>
			<?php
		}else{
			?>
			<script>
				alert("something is wrong")
				window.open("all_product.php","_self");
			</script>
			<?php
		}
?>