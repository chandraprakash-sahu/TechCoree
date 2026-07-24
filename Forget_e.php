<?php
session_start();
include "conn.php";

$message = "";

if (isset($_POST['forgot'])) {
    $email = $_POST['email'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $conpass = $_POST['conpass'];

    // Validate inputs
    if (empty($email) || empty($oldpass) || empty($newpass) || empty($conpass)) {
        $message = "<div class='alert_101 error_101'>All fields are required.</div>";
    } else {
        $sql = "SELECT * FROM resistration_tbl WHERE email = '$email' AND password = '$oldpass'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count === 1) {
            if ($newpass === $conpass) {
                $update = "UPDATE resistration_tbl SET password = '$newpass' WHERE email = '$email'";
                if (mysqli_query($conn, $update)) {
                    $message = "<div class='alert_101 success_101'>Password updated successfully. Please <a href='login.html'>login</a>.</div>";
                } else {
                    $message = "<div class='alert_101 error_101'>Failed to update password. Try again.</div>";
                }
            } else {
                $message = "<div class='alert_101 warning_101'>New passwords do not match.</div>";
            }
        } else {
            $message = "<div class='alert_101 error_101'>Invalid email or old password.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/style.css">
	<link rel="icon" type="image/png" href="img/TC logo.png">
    <style>
        body {
            background: #f4f6f8;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

       
    </style>
</head>
<body>

<div class="container_101">
    <div class="title_101">Reset Password</div>

    <?php if (!empty($message)) echo $message; ?>

    <form method="post" action="" class="form_101">
        <div class="form_group_101">
            <label class="label_101">Email address</label>
            <input type="email" class="input_202" name="email" placeholder="Enter your email" required>
        </div>

        <div class="form_group_101">
            <label class="label_101">Old Password</label>
            <input type="password" class="input_202" name="oldpass" placeholder="Enter old password" required>
        </div>

        <div class="form_group_101">
            <label class="label_101">New Password</label>
            <input type="password" class="input_202" name="newpass" placeholder="Enter new password" required>
        </div>

        <div class="form_group_101">
            <label class="label_101">Confirm Password</label>
            <input type="password" class="input_202" name="conpass" placeholder="Confirm new password" required>
        </div>

        <button type="submit" name="forgot" class="btn_202">Reset Password</button>
        <button type="reset" class="btn_reset_202">Clear</button>

        <div class="link_202">
            Remembered? <a href="login.html">Login here</a>
        </div>
    </form>
</div>

</body>
</html>
