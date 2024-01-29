<?php
session_start();
require_once (__DIR__.'/../mdb/mdbPersona.php');

require __DIR__.'/../../lib/PHPMailer/src/Exception.php';
require __DIR__.'/../../lib/PHPMailer/src/PHPMailer.php';
require __DIR__.'/../../lib/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require __DIR__.'/../../vendor/autoload.php';

$correo = filter_input(INPUT_POST,'correo');

$user = consultarPersonaCorreo($correo);
$msg = "El correo no es valido";
$type_msg="error";
$date=new DateTime();
$id=$user->getIdpersona();
$date = $date->format('d-m-Y');
$date=base64_encode($date);
$id=base64_encode($id);

if($user != null){
    $msg = "El correo se encontró en nuestra Base de Datos";
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;
     
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.co';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'appiferre@appiferre.ga';                     //SMTP username
        $mail->Password   = '#1gGjesus';                               //SMTP password                            
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('appiferre@appiferre.ga', 'AppiFerre');
        // $mail->addAddress($correo, 'Joe User');     //Add a recipient
        $mail->addAddress($correo);               //Name is optional
        // $mail->addReplyTo('jc5296424@gmail.com', 'Information');
        // $mail->addCC('jc5296424@gmail.com');
        // $mail->addBCC('jc5296424@gmail.com');
    
        //Attachments
        // $mail->addAttachment('mensajecorreo.html');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Cambio de contrasena';
        //  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        //=========================construir enlace=====================================
        $enlace='<a target="_blank" class="boton" href="http://localhost/AppiFerre/vista/recursos/cambiarContrasena.php?id='.$id.'&date='.$date.'">Cambiar contraseña</a>';
        //==============================================================
        $body= file_get_contents("../../vista/recursos/mensajecorreo.html");
        $body = str_replace('%usuario%', $user->getNombre(), $body);
        $body = str_replace('%password%', $token, $body);
        $body = str_replace('%enlace%', $enlace, $body);
       
        $mail->MsgHTML($body);
        $mail->WordWrap = 50;
        $type_msg="success";

        if($mail->Send()){
            $msg="Puede realizar la recuperación de la contraseña ingresando a  su correo: ".$correo;
        }else{
            $msg="No se pudo enviar el correo a ".$correo;
            $type_msg="error";
            
        }
        // $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
}

$resultado = [
    'msg' => $msg,
    "type" => $type_msg
 ]; //Vector PHP

 echo json_encode($resultado);  //Convirtiendo en jSon