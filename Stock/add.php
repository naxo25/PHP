<?php
	include_once('../connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		// hacer uso de una declaración preparada para evitar la inyección de sql
		$stmt = $db->prepare("INSERT INTO bodega (id_bodega, id_articulo, cantidad) VALUES (:nombre, :apellido, :precio)");
		// declaración if-else en la ejecución de nuestra declaración preparada
		if ($stmt->execute(array(':nombre' => $_POST['bodega'] , ':apellido' => $_POST['articulo'] , ':precio' => $_POST['cantidad'])) ){
			$output['message'] = 'Miembro agregado correctamente';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Ocurrió un error al agregar. No se pudo agregar';
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