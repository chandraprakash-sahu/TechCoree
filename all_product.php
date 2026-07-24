<?php
session_start();
include("conn.php");

if (!isset($_SESSION['type'])) {
    header("location:login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css"> <!-- ✅ Separated CSS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="icon" type="image/png" href="img/TC logo.png">
</head>
<body>
    <!-- <a onclick="history.back()"><i class="fa-solid fa-arrow-left"></i></a> -->
    <div class="container">
    
        <h3>All Product List</h3>
		<a href="add_product.php"><h4>+Add Product</h4></a>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM product_tbl";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><img src="../TechCoree/product_img/<?php echo $row['img']; ?>" alt="Product Image"></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td>&#x20B9;<?php echo $row['price']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td>
                                <a href="update_product.php?p_id=<?php echo $row['p_id']; ?>" class="btn-action edit">Edit</a>
                                <a onclick="return confirm('Are you Sure?') " href="delete_product.php?p_id=<?php echo $row['p_id']; ?>" class="btn-action delete">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
