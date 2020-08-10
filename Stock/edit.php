<?php
	include_once('../connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		$id = $_POST['id'];
		$bodega = $_POST['bodega'];
		$articulo = $_POST['articulo'];
		$cantidad = $_POST['cantidad'];

						//Articulo 		Persona 	Cantidad
		$sql = "UPDATE bodega SET id_bodega = '$bodega', id_articulo = '$articulo', cantidad = '$cantidad' WHERE id = '$id'";
		$db->exec($sql);

	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	//cerrar conexión
	$database->close();

	echo json_encode($output);
	
?>