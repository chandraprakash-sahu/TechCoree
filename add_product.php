<?php
	
		session_start();
	include ("Conn.php");
	
	$cat_result = $conn->query("SELECT * FROM category_tbl");

	if(isset($_POST['submit'])){
		$product_name = $_POST['product_name'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$cat = $_POST['category_id'];
		
		$image_name = $_FILES["photo"]["name"];
		$image_size = $_FILES["photo"]["size"];
		$image_tmp = $_FILES["photo"]["tmp_name"];
		
		$maxsize = 5 * 1024 * 1024;
		if($image_size > $maxsize){
			echo "<script>alert('Error: File size is not allowed.');</script>";
		}else{
			$sql = "INSERT INTO product_tbl(product_name, description, price, img , category) 
					VALUES ('$product_name','$description','$price','$image_name','$cat')";
			$result = $conn->query($sql);
				
			if($result){
				move_uploaded_file($image_tmp,"../TechCoree/product_img/".$image_name);
				echo "<script>alert('File uploaded successfully.');</script>";
				header("location: add_product.php");
			}else{
				echo "Something went WRONG.";
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icons/css/all.min.css">
	<title>Add Product</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="icon" type="image/png" href="img/TC logo.png">            
	<style>
body{
	background: #f2f2f2;
	font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
}

	</style>
</head>
<body >
<div class="form-container-01">
		<h1 class="form-title-02">Add New Product</h1>
		<form action="" method="POST" enctype="multipart/form-data" class="product-form-03">
			
			<div class="form-group-04">
				<label for="product_name" class="label-05"><i class="fa-solid fa-tag"></i>Product Name</label>
				<input type="text" id="product_name" name="product_name" class="input-field-06" required>
			</div>

			<div class="form-group-04">
				<label for="price" class="label-05"><i class="fa-solid fa-image"></i>Price</label>
				<input type="number" id="price" name="price" class="input-field-06" required>
			</div>

			<div class="form-group-04">
				<label for="photo" class="label-05"><i class="fa-solid fa-image"></i>Upload Image</label>
				<input type="file" id="photo" name="photo" class="input-field-06" required>
				<small class="note-07">Max size of 2MB allowed.</small>
			</div>

			<div class="form-group-04">
				<label for="description" class="label-05"><i class="fa-solid fa-align-left"></i>Description</label>
				<input type="text" id="description" name="description" class="input-field-06" required>
			</div>
			
			<div class="form-group-04">
				<label for="category_id" class="label-05"><i class="fa-solid fa-align-left"></i>Category</label>
				
				<select type="text" id="category_id" name="category_id" class="input-field-06" required>
					<option value="">-- Select Category --</option>
					<?php while ($cat = $cat_result->fetch_assoc()) { ?>
						<option value="<?php echo $cat['category_name']; ?>">
							<?php echo $cat['category_name']; ?>
						</option>
					<?php } ?>
				</select>
			</div>

			<div class="button-group-08">
				<input type="reset" name="reset" value="Clear" class="btn-09 reset-btn">
				<input type="submit" name="submit" value="Submit" class="btn-09 submit-btn">
			</div>
		</form>

		<div class="product-link-10">
			<a href="all_product.php" class="link-btn-11">View All Products</a>
		</div>
	</div>

</body>
</html>
