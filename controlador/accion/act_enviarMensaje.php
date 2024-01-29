<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require __DIR__.'/../../lib/twilio-php-main/src/Twilio/autoload.php';
 
use Twilio\Rest\Client; 
 
$sid    = "AC51d57728dff7928b3b52aa05f6cf6097"; 
$token  = "9963f0b880a8c224db4e5a90d7f204ee";
$verificar=bin2hex(random_bytes((6 - (6 % 2)) / 2)); 
$twilio = new Client($sid, $token); 
// $numero=$_POST['cel'];
$numero='3148288404';
$numero="whatsapp:+57".$numero;
$message = $twilio->messages 
                  ->create($numero, // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => "Hola este es tu código de verificación: ".$verificar
                           ) 
                  ); 
 
print($message->sid);