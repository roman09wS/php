<?php
// Varios destinatarios
$para  = $correo ; // atención a la coma
//$para .= 'Papercut@user.com';

// título
$título = 'Restablecer contraseña';
$codigo = rand(1000,9999);
// mensaje
$mensaje = '
<html>
<head>
  <title>Restablecer</title>
</head>
<body>
  <p>¡Este es tu codigo de verificacion!</p>
  <p><b>'.$codigo.'</b></p>
  <p> <a href="http://localhost/php/login/reset.php?email='.$correo.'"> Para restablecer da click aqui</a> </p>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
// $cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Winder Roman <winderroman3131@gmail.com>' . "\r\n";
// $cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
// $cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
// ;sendmail_from = winderroman3131@gmail.com
// Enviarlo
$enviado = false;
if ( mail($para, $título, $mensaje, $cabeceras) ) {
    $enviado = true;
}
?>