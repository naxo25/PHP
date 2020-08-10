<?php
include_once('../connection.php');
	$database = new Connection();
	$db = $database->open();
	try{
		$stmt = $db->prepare("SELECT * FROM clientes WHERE id = :id");
		$stmt->bindParam(':id', $_POST['id']);
		$stmt->execute();
		$result = $stmt->fetch();
		if ($result) { $output['data'] = array('JiSVHMAhst'=>$result['id'], 'lyyM7uk8Ri'=>$result['nombre'],
											   'kn9PLj8ZOb'=>$result['apellido'], 'xT0pqgVix7'=>$result['direccion'],
											   'ri4TH6PS2u'=>$result['mail']);}
	}
	catch(PDOException $e){
		$output['message'] = $e->getMessage();
	}
	//cerrar conexión
	$database->close();
	echo json_encode($output);
?>