<?php

require_once('PHPMailer-5.2-stable/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail -> isSMTP();
$mail -> SMTPAuth = true; //variable booleanea
$mail -> SMTPSecure = 'ssl';
$mail -> Host = 'smtp.gmail.com';//servidor smtp de Gmail gratuito
$mail -> Port = '465'; //puerto
$mail -> isHTML();
$mail -> Username = 'azizabijouterie@gmail.com'; //
$mail -> Password = 'atrefuiio.15547'; //
$mail -> SetFrom('no-reply@hoecode.org');
$mail -> Subject = 'Hello World';
$mail -> Body = 'Mail Test!';
$mail -> AddAddress('silosemi@hotmail.com'); //A quien se enviara el mail

$mail -> Send();
?>

