<?php
  require_once '../../vendor/autoload.php';
 

  // $clientID = '1067399658962-kmhmn3bfem09oac6uoi809al4tgddunb.apps.googleusercontent.com';
  // $clientSecret = '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';
  //$redirectUri = 'http://appiferre.ga/controlador/accion/act_registrarGoogle.php';

 $redirectUri = 'http://localhost/AppiFerre/controlador/accion/act_registrarGoogle.php';
 
  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);

  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");

  if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    
    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;
    $apellido=$google_account_info->family_name;
    $imagen=$google_account_info->picture;
    // now you can use this profile info to create account in your website and make user logged in.
  }
 
?>