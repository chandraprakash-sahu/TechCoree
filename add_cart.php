<?php
		session_start();
	include "Conn.php";
	
	if(!isset($_SESSION['email'])){
		header("location: login.html");
	}
		
	$uid = $_SESSION['uid'];
	$pid= $_GET['p_id'];
	$email=$_SESSION['email'];
		
	$select1="select * from resistration_tbl where u_id = '$uid'";
	$result1=$conn->query($select1);
	$row1 = mysqli_fetch_array($result1);
	
	$select2="select * from product_tbl where p_id = '$pid'";
	$result2=$conn->query($select2);
	$row2= mysqli_fetch_array($result2);
	$product_name=$row2['product_name'];
	$price= $row2['price'];
	$img= $row2['img'];
		
	$insert ="insert into cart_tbl(c_id,p_id) values('$uid','$pid')";
	$result3= $conn->query($insert);
	if($result3){
				echo"<script>
					alert('Added to Cart...');
						window.location.href='view_product.php?p_id=$pid';
				</script>";
				exit;
		}
?>