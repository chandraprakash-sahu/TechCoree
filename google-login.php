<?php
$client_id = "";
$redirect_uri = "";

$google_login_url =
"https://accounts.google.com/o/oauth2/v2/auth?" .
"response_type=code" .
"&client_id=" . $client_id .
"&redirect_uri=" . urlencode($redirect_uri) .
"&scope=email profile";

header("Location: " . $google_login_url);
exit();
