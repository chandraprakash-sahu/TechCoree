<?php

session_start();
include "Conn.php";

// Fetch all products with category names
$sql = "SELECT * FROM product_tbl";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Products | TechCore</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="img/TC logo.png">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f5f7fb;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 90%;
      margin: 50px auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 25px;
    }

    .product-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .product-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

    .product-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-bottom: 1px solid #eee;
    }

    .product-info {
      padding: 15px;
    }

    .product-info h3 {
      font-size: 18px;
      margin: 0;
      color: #333;
    }

    .category {
      color: #666;
      font-size: 13px;
      margin-top: 5px;
    }

    .description {
      font-size: 14px;
      color: #777;
      margin: 10px 0;
      min-height: 50px;
    }

    .price {
      font-weight: 600;
      color: #007bff;
      font-size: 17px;
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
    }

    .btn {
      padding: 8px 14px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.3s;
    }

    .btn-buy {
      background: #007bff;
      
    }
     .btn-buy a{
      text-decoration:none;
      color: white;
     }
    .btn-buy:hover {
      background: #0056b3;
    }

    .btn-cart {
      background: #ff9900;
      color: white;
    }

    .btn-cart:hover {
      background: #cc7a00;
    }

    h1.title {
      text-align: center;
      color: #222;
      margin-top: 30px;
      font-weight: 600;
    }

  </style>
</head>
<body>

<h1 class="title">🛍️ All Products</h1>

<div class="container">

    
  <?php 
    if(!isset($_SESSION['email'])){
  while ($row = $result->fetch_assoc()) { ?>
    <div class="product-card">
      <img src="Product_img/<?php echo $row['img']; ?>" alt="Product Image">
      <div class="product-info">
        <h3><?php echo $row['product_name']; ?></h3>
        <p class="category"><?php echo $row['category'] ?: 'Uncategorized'; ?></p>
        <p class="description"><?php echo substr($row['description'], 0, 60); ?>...</p>
        <div class="btn-group">
          <span class="price">₹<?php echo $row['price']; ?></span>
          <div>
            <button class="btn btn-buy"><a href="view_product.php?p_id=<?php echo$row['p_id'];?>">Buy Now</a></button>
          </div>
        </div>
      </div>
    </div>
        <?php 
        }
        }else{

            while ($row = $result->fetch_assoc()) { 
                $uid = $_SESSION['uid'];
            ?>
             <div class="product-card">
                <img src="Product_img/<?php echo $row['img']; ?>" alt="Product Image">
                <div class="product-info">
                    <h3><?php echo $row['product_name']; ?></h3>
                    <p class="category"><?php echo $row['category'] ?: 'Uncategorized'; ?></p>
                    <p class="description"><?php echo substr($row['description'], 0, 60); ?>...</p>
                    <div class="btn-group">
                    <span class="price">₹<?php echo $row['price']; ?></span>
                    <div>
                        <button class="btn btn-buy"><a href="view_product.php?p_id=<?php echo$row['p_id'].",".'u_id='.$uid;?>">Buy Now</a></button>
                    </div>
                    </div>
                </div>
                </div>
            <?php
        }
    }   
        ?>
</div>

</body>
</html>
