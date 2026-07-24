<?php
session_start();
include "Conn.php";

/* SAFETY CHECK */
if (!isset($_GET['code'])) {
    die("No Google code received");
}

/* GOOGLE CONFIG */
$client_id = "201016551854-33mo04fuh99o864u0ge043shcp1debap.apps.googleusercontent.com";
$client_secret = "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";
$redirect_uri = "http://localhost/WEBSITES/TechCoree/google-callback.php";

/* STEP 1: GET ACCESS TOKEN */
$token_url = "https://oauth2.googleapis.com/token";

$post = [
    'code' => $_GET['code'],
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'redirect_uri' => $redirect_uri,
    'grant_type' => 'authorization_code'
];

$ch = curl_init($token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

if (!isset($data['access_token'])) {
    die("Access token error: <pre>" . print_r($data, true) . "</pre>");
}

/* STEP 2: GET USER INFO */
$user_info = file_get_contents(
    "https://www.googleapis.com/oauth2/v2/userinfo?access_token=".$data['access_token']
);

$user = json_decode($user_info, true);

if (!isset($user['email'])) {
    die("Google user info error");
}

$email = mysqli_real_escape_string($conn, $user['email']);
$name  = mysqli_real_escape_string($conn, $user['name']);

/* STEP 3: CHECK USER IN DB */
$check = mysqli_query(
    $conn,
    "SELECT * FROM resistration_tbl WHERE email='$email' LIMIT 1"
);

if (!$check) {
    die("SELECT error: " . mysqli_error($conn));
}

if (mysqli_num_rows($check) === 1) {

    // EXISTING USER
    $row = mysqli_fetch_assoc($check);
    $uid = $row['u_id'];

} else {

    // NEW GOOGLE USER → INSERT
    $insert = mysqli_query($conn, "
        INSERT INTO resistration_tbl (username, email, login_type)
        VALUES ('$name', '$email','google')
    ");

    if (!$insert) {
        die("INSERT error: " . mysqli_error($conn));
    }

    $uid = mysqli_insert_id($conn);
}

/* STEP 4: SET SESSION (NAVBAR NEEDS THIS) */
$_SESSION['uid']        = $uid;
$_SESSION['email']      = $email;
$_SESSION['username']   = $name;
$_SESSION['login_type'] = 'google';

/* STEP 5: REDIRECT */
header("Location: index.php");
exit();
