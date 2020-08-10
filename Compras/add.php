<?php
include_once('../connection.php');
	$database = new Connection();
	$db = $database->open();
	try{
		$stmt = $db->prepare("INSERT INTO compras (codigo_articulo, id_cliente, cantidad) VALUES (:cod_art, :id_cli, :precio)");
		$stmt->execute(array(':cod_art' => $_POST['nombre'] , ':id_cli' => $_POST['apellido'] , ':precio' => $_POST['precio']));
	}
	catch(PDOException $e){
		$output['error'] = true;
 		$output['message'] = $e->getMessage();
	}
	//cerrar conexión
	$database->close();
	echo json_encode($output);
?>