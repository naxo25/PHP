<?php
	include_once('../connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$precio = $_POST['precio'];

						//Articulo 		Persona 	Cantidad
		$sql = "UPDATE clientes SET nombre = '$nombre', apellido = '$apellido', precio = '$precio' WHERE id = '$id'";
		//verifica el tipo de mensaje a mostrar
		if($db->exec($sql)){
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