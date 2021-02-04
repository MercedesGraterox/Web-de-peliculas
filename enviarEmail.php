<?php
require("class.phpmailer.php");
require("class.smtp.php");
require("database.php");
require_once('PHPMailer-5.2-stable/PHPMailerAutoload.php');
// $mail = new PHPMailer();
// $mail -> isSMTP();
// $mail -> SMTPAuth = true; //variable booleanea
// $mail -> SMTPSecure = 'ssl';
// $mail -> Host = 'smtp.gmail.com';//servidor smtp de Gmail gratuito
// $mail -> Port = '465'; //puerto
// $mail -> isHTML();
 
// $mail -> Username = 'mercedesgraterox@gmail.com'; //
// $mail -> Password = 'santino24'; //
// $mail -> SetFrom('no-reply@hoecode.org');
// $mail -> Subject = 'Recibimos tu consulta';
// $mail -> Body = 'Estamos trabajando para gestionar tu consulta lo antes posible!';
// $mail -> AddAddress('mercedesgraterox@hotmail.com'); //A quien se enviara el mail

// if(!$mail->send()){
// 		$enviado=0;	
// 		echo "<script> alert('email no enviado');</script>";
// 		 header('location:contacto.php');
// 	}else{
// 		$enviado=1;
// 		echo "<script> alert('email  enviado');</script>";
// 		 header('location:contacto.php');
		

// 	}

 $destinatario='mercedesgraterox@gmail.com';
  $mail=$_POST['correo'];
  $mensaje=$_POST['mensaje'];
  $header="mensaje de la web";
  $mensajeCompleto=$mensaje."\n Atentamente";

  @mail($destinatario,$mail,$mensaje,$header);
   echo "<script>alert('mail enviado')</script>";
   require("contacto.php");



 // $correo=$_POST['correo'];
 // $msg=$_POST['mensaje'];
 // $mensaje="contacto";
 // if (isset($_POST['send'])){
	//  include("sendmail.php");//Mando a llamar la funcion que se encarga de enviar el correo electronico
	// 	 $smtpHost = "smtp.gmail.com";  // Dominio alternativo brindado en el email de alta 
	// 	 $smtpUsuario = ("mercedesgraterox@gmail.com");  // Mi cuenta de correo
 //         $smtpClave = "santino24";
	// 	 $mail = new PHPMailer();
	// 	 $mail->IsSMTP();
	// 	 $mail->SMTPAuth = true;
	// 	 $mail->Port = 587; 
	// 	 $mail->IsHTML(true); 
	// 	 $mail->CharSet = "utf-8";
	
	// 	 // VALORES A MODIFICAR //
	// 	 $mail->Host = $smtpHost; 
	// 	 $mail->Username = $smtpUsuario; 
	// 	 $mail->Password = $smtpClave;
	// 	 $mail->setFrom = $smtpUsuario;
	// 	 $mail->FromName= ''; //Email desde donde envío el correo.
	// 	 $mail->AddAddress($smtpUsuario); // Esta es la dirección a donde enviamos los datos del formulario
	// 	 $mail->Subject = "Mensaje del espectador"; // Este es el titulo del email.
	// 	 $mensajeHtml = nl2br($mensaje);
	// 	 $mail->Body = "<html> 
	// 						<body> 
	// 							 <h1 align='center'>PelisFlex</h1>
	// 							 <div style='background:black;color:white;padding:20px'><h2>Contacto del espectador</h2></div>
	// 							 <p>email: {$correo}</p>
	// 							 <p>mensaje: {$msg}</p>
	// 						</body> 
	// 					</html>
	// 					<br />"; // Texto del email en formato HTML
	// 	 $mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
	// 	 $mail->SMTPOptions = array(
	// 	 'ssl' => array(
	// 		'verify_peer' => false,
	// 		'verify_peer_name' => false,
	// 		'allow_self_signed' => true
	// 	   )
	// 	 );
	// 	 $estadoEnvio = $mail->Send(); 
	// 	 if($estadoEnvio){
	// 		  header("location:contacto.php?estado=1");
	// 	 } else {
	// 		  header("location:contacto.php?estado=2");
	// 		   exit();
	// 	 }
 // }
?>
