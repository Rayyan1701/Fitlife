<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('475496436440-42ae4s2v2d2ticv1r8v5rvm2vip52uno.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('xtrskYoddyHAbqHA5wT7Garo');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/web2/dashboard.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>