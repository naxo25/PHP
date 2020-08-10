<?php
include_once('../connection.php');
	$database = new Connection();
	$db = $database->open();
	try{
		$id = $_POST['id'];
		$cod_art = $_POST['cod_art'];
		$id_cli = $_POST['id_cli'];
		$cantidad = $_POST['cantidad'];

		$sql = "UPDATE compras SET codigo_articulo = '$cod_art', id_cliente = '$id_cli', cantidad = '$cantidad' WHERE id = '$id'";
		$db->exec($sql);
		$output['message'] = 'Miembro actualziado correctamente';
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}
	//cerrar conexión
	$database->close();
	echo json_encode($output);
?>