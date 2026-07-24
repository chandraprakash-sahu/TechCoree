<?php
$client_id = "201016551854-33mo04fuh99o864u0ge043shcp1debap.apps.googleusercontent.com";
$redirect_uri = "http://localhost/WEBSITES/TechCoree/google-callback.php";

$google_login_url =
"https://accounts.google.com/o/oauth2/v2/auth?" .
"response_type=code" .
"&client_id=" . $client_id .
"&redirect_uri=" . urlencode($redirect_uri) .
"&scope=email profile";

header("Location: " . $google_login_url);
exit();
