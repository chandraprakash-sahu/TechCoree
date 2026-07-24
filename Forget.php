<?php
session_start();
include "conn.php";

if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

$message = "";

if (isset($_POST['forgot'])) {
    $email = $_POST['email'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $conpass = $_POST['conpass'];

    if (empty($email) || empty($oldpass) || empty($newpass) || empty($conpass)) {
        $message = "<div class='alert_001 danger_001'>All fields are required.</div>";
    } else {
        $sql = "SELECT * FROM resistration_tbl WHERE email = '$email' AND password = '$oldpass'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count === 1) {
            if ($newpass === $conpass) {
                $update = "UPDATE resistration_tbl SET password = '$newpass' WHERE email = '$email'";
                if (mysqli_query($conn, $update)) {
                    $message = "<div class='alert_001 success_001'>Password updated successfully. Please <a href='login.html'>login</a>.</div>";
                } else {
                    $message = "<div class='alert_001 danger_001'>Failed to update password. Try again.</div>";
                }
            } else {
                $message = "<div class='alert_001 warning_001'>New passwords do not match.</div>";
            }
        } else {
            $message = "<div class='alert_001 danger_001'>Invalid email or old password.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/TC logo.png">
    <style>
        body {
            background: #e9eff1;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container_001 {
            max-width: 420px;
            background: #ffffff;
            margin: 60px auto;
            padding: 35px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .title_001 {
            text-align: center;
            font-size: 24px;
            color: #333333;
            margin-bottom: 25px;
        }

        .form_group_001 {
            margin-bottom: 18px;
        }

        .label_001 {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #444;
        }

        .input_001 {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn_001 {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        .btn_001:hover {
            background-color: #0056b3;
        }

        .btn_reset_001 {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #6c757d;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        .btn_reset_001:hover {
            background-color: #5a6268;
        }

        .link_001 {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .link_001 a {
            color: #007bff;
            text-decoration: none;
        }

        .link_001 a:hover {
            text-decoration: underline;
        }

        .alert_001 {
            padding: 12px;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .success_001 {
            background-color: #d4edda;
            color: #155724;
        }

        .danger_001 {
            background-color: #f8d7da;
            color: #721c24;
        }

        .warning_001 {
            background-color: #fff3cd;
            color: #856404;
        }
    </style>
</head>
<body>

<div class="container_001">
    <h1 class="title_001">Reset Password</h1>

    <?php if (!empty($message)) echo $message; ?>

    <form method="post" action="">
        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">

        <div class="form_group_001">
            <label class="label_001">Old Password</label>
            <input type="password" name="oldpass" class="input_001" placeholder="Enter old password" required>
        </div>

        <div class="form_group_001">
            <label class="label_001">New Password</label>
            <input type="password" name="newpass" class="input_001" placeholder="Enter new password" required>
        </div>

        <div class="form_group_001">
            <label class="label_001">Confirm New Password</label>
            <input type="password" name="conpass" class="input_001" placeholder="Confirm new password" required>
        </div>

        <button type="submit" name="forgot" class="btn_001">Reset Password</button>
        <button type="reset" class="btn_reset_001">Clear</button>

        <div class="link_001">
            Remembered? <a href="login.html">Login here</a>
        </div>
    </form>
</div>

</body>
</html>
