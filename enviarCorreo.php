<?php
	// Declaramos la variables de para almacenar los datos enviados por GET
	$datos = '';

	foreach ($_REQUEST as $campo => $valor) {
	 $datos.='
	 	<tr>
	 		<td bgcolor="#CCCCCC"><strong>'.$campo.'</strong></td>
			<td bgcolor="#F3F3F3">'.$valor.'</td>
	 	</tr>
	 ';
	}

	//Fecha y Hora Actual
	$fechayhora= date('d-m-Y | H:i:s');

	// Declaramos el destinatario del correo
	//$to = "amiconeagustin@gmail.com"; // este es de prueba
	$to = "consultasencolumna@gmail.com";

	// Declaramos el Asunto del correo
	$subject = "Consulta desde la Web";

	// MENSAJE
	$message = '
	<html>
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <title>Consulta desde la Pagina</title>

		<style type="text/css">
			body {
				font-family: Arial, Helvetica, sans-serif;
				color: #333333;
				font-size: 10px;
			}
		</style>

	</head>
	<body>
		<table border="0" cellpadding="5" cellspacing="3" with="100%">
			'.$datos.'
		</table>
	</body>
	</html>
	';

  $headers = "MIME-Version: 1.0\r\n";
  $headers.= "Content-type: text/html; charset=utf-8\r\n";

	// ENVIA EL EMAIL
	$envio = mail($to, $subject, $message, $headers);

  if( $envio == true ){
			echo 'OK';
	}else{
			echo 'MAL';
  }
?>
