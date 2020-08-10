<?php
	include_once('../connection.php');
	$database = new Connection();
	$db = $database->open();
	$output = array('error' => false);

	try {	
	$error = 0;
	$sql = 'SELECT * FROM clientes WHERE mail = ?';
	$sentencia = $db->prepare($sql);
	$sentencia->execute(array($_POST['Destino']));
	$resultado2 = $sentencia->fetch();
	
		$_POST['msj'] .= '<br><br> Mensaje enviado por '.$resultado2['nombre'].' '.$resultado2['apellido'].' desde 000 <br> <a href="naxorojas25@gmail.com">naxorojas25@gmail.com</a> <br> <a href="http://nacholabraweb.000webhostapp.com">nacholabraweb.000webhostapp.com</a>' ;

		$hoy = date("Y-m-d H:i:s"); 
		$stmt = $db->prepare("INSERT INTO _notificaciones (id,titulo,msj,fecha) VALUES (?,?,?,?)");
		$stmt->execute(array($_POST['Destino'], $_POST['asunto'], $_POST['msj'], $hoy));
	
	$subject   = $_POST['asunto'];
	//server va en header

	$header ="MIME-Version: 1.0\n"; 
	$header .= "Content-type: text/html; charset=iso-8859-1\n"; 
	$header .="From: 000nax\n";
	$header .="X-Mailer: PHP/". phpversion()."\n";

	$mail = mail($_POST['Destino'], $subject, $_POST['msj'], $header);
	
	}
	catch(PDOException $e){
		$output['error'] = true;
 		$output['message'] = $e->getMessage();
	}
	//cerrar conexión
	$database->close();
	echo json_encode($output);
?>