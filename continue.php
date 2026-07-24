<?php
session_start();
include "conn.php";

if(!isset($_SESSION['email'])){
    header("location: login.html");
    exit();
}

$uid = $_SESSION['uid'];
$pid = $_GET['p_id'];
$email = $_SESSION['email'];
$cart_id = isset($_GET['cart_id']) ? $_GET['cart_id'] : ''; // optional cart id

// Fetch address
$select3 = "SELECT * FROM address_tbl WHERE email = '$email' AND is_default = 1 LIMIT 1";
$result3 = $conn->query($select3);

if (mysqli_num_rows($result3) == 0) {
    echo "<script>
        alert('Please set a default address before placing an order.');
        window.location.href = 'profile.php';
    </script>";
    exit();
}
$add = mysqli_fetch_array($result3);


// Combine full address
$full_add = $add['first_name'] . " " . $add['last_name'] . ", House No. " .
            $add['house_no'] . ", " . $add['road'] . ", " . $add['state'] .
            ", " . $add['city'] . " - " . $add['pincode'] . ", " .
            $add['brief_add'];

// Insert order (no price or product name)
$insert = "INSERT INTO order_tbl (c_id, p_id, address) VALUES ('$uid', '$pid', '$full_add')";

if($conn->query($insert)){

    // ✅ If order was placed from cart, remove that product
    if(!empty($cart_id)){
        $delete = "DELETE FROM cart_tbl WHERE cart_id = '$cart_id'";
        $conn->query($delete);
    }

    echo "<script>
        alert('Order Confirmed...');
        window.open('index.php', '_self');
    </script>";

} else {
    echo "Error: " . $conn->error;
}
?>
