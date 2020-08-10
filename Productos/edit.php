<?php
	include_once('../connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{

		$sql = "UPDATE articulos SET nombre_articulo = ?, precio = ? WHERE id = ?";
		$stmt = $db->prepare($sql);

		if ($stmt->execute(array($_POST['nombre'], $_POST['precio'], $_POST['id'])) ){
			$output['message'] = 'Miembro actualziado correctamente';
		} 
		else{
			$output['error'] = true;
			$output['message'] = 'Ocurrió un error al actualizar. No se pudo actualizar';
		}

	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	//cerrar conexión
	$database->close();

	echo json_encode($output);
	
?>