<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('33578690743-5lomcvo2uq4bdlo56nce7ghc4qog61qk.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('kEruykgve_uF3_Zazd1sO6cx');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/web2/dashboard.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>