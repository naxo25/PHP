<?php
	include_once('../connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		$sql = "DELETE FROM bodega WHERE id = '".$_POST['id']."'";
		//verifica el tipo de mensaje a mostrar
		if($db->exec($sql)){
			$output['message'] = 'Miembro borrado correctamente';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Ocurrió un error. No se pudo elimimar';
		} 
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();;
	}

	//cerrar conexión
	$database->close();

	echo json_encode($output);

?>