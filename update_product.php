<?php
	session_start();
	include "Conn.php";
	$id = $_GET['p_id'];
	
	$cat_result = $conn->query("SELECT * FROM category_tbl");

	$sql = "SELECT * FROM product_tbl WHERE p_id='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$product_name = $_POST['product_name'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$image_name = $row['img']; // default image
		$cat = $_POST['category_id'];

		if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === 0) {
			$new_name = $_FILES["photo"]["name"];
			$image_size = $_FILES["photo"]["size"];
			$image_tmp = $_FILES["photo"]["tmp_name"];

			$maxsize = 5 * 1024 * 1024; // 5MB

			if ($image_size > $maxsize) {
				echo "<script>alert('Error: File size is too large');</script>";
			} else {
				$image_name = $new_name;
				move_uploaded_file($image_tmp, "../TechCoree/product_img/" . $image_name);
			}
		}

		$sql2 = "UPDATE product_tbl SET product_name='$product_name', description='$description', price='$price', img='$image_name', category='$cat' WHERE p_id='$id'";
		$result = mysqli_query($conn, $sql2);

		if ($result) {
			echo "<script>alert('Product updated successfully');</script>";
			header("Location: all_product.php");
			
		} else {
			echo "<script>alert('Something went wrong');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icons/css/all.min.css">
	<title>Update Product</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="icon" type="image/png" href="img/TC logo.png">
</head>
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
<body>

	<div class="form-container-01">
		<h1 class="form-title-02">Update Product</h1>
		<form action="" method="POST" enctype="multipart/form-data" class="product-form-03">
			<div class="form-group-04">
				<label class="label-05" for="photo"><i class="fa-solid fa-image"></i>Upload New Image</label>
				<input type="file" id="photo" name="photo" class="input-field-06">
				<small class="note-07">Max size: 5MB</small>
				<br><br>
				<label class="label-05"><i class="fa-solid fa-image"></i>Current Image:</label><br>
				<img src="../TechCoree/product_img/<?php echo $row['img']; ?>" alt="Current Image" style="max-width: 100%; height: auto; border-radius: 6px;">
			</div>

			<div class="form-group-04">
				<label class="label-05" for="product_name"><i class="fa-solid fa-tag"></i>Product Name</label>
				<input type="text" id="product_name" name="product_name" class="input-field-06" value="<?php echo $row['product_name']; ?>" required>
			</div>

			<div class="form-group-04">
				<label class="label-05" for="price"><i class="fa-solid fa-indian-rupee-sign"></i>Price</label>
				<input type="number" id="price" name="price" class="input-field-06" value="<?php echo $row['price']; ?>" required>
			</div>


			<div class="form-group-04">
				<label class="label-05" for="description"><i class="fa-solid fa-align-left"></i>Description</label>
				<input type="text" id="description" name="description" class="input-field-06" value="<?php echo $row['description']; ?>" required>
			</div>

			<div class="form-group-04">
				<label for="category_id" class="label-05"><i class="fa-solid fa-align-left"></i>Category</label>
				
				<select type="text" id="category_id" name="category_id" class="input-field-06" required>
					<option value=""><?php if(!empty($row['category'])){echo $row['category'];}else{echo "Select Category";}; ?></option>
					<?php while ($cat = $cat_result->fetch_assoc()) { ?>
						<option value="<?php echo $cat['category_name']; ?>">
							<?php echo $cat['category_name']; ?>
						</option>
					<?php } ?>
				</select>
			</div>

			<div class="button-group-08">
				<input type="reset" value="Clear" class="btn-09 reset-btn">
				<input type="submit" name="submit" value="Update" class="btn-09 submit-btn">
			</div>
		</form>
	</div>

</body>
</html>
