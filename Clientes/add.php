<?php
	include_once('../connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
	    
	    if ($_POST['mail'] == ''){
	            $_POST['mail'] = '@';
	    }
	    
		// hacer uso de una declaración preparada para evitar la inyección de sql
		$stmt = $db->prepare("INSERT INTO clientes (nombre, apellido, direccion, mail) VALUES (:nombre, :apellido, :direccion, :mail)");
		// declaración if-else en la ejecución de nuestra declaración preparada
		if ($stmt->execute(array(':nombre' => $_POST['nombre'] , ':apellido' => $_POST['apellido'] , ':direccion' => $_POST['direccion'] , ':mail' => $_POST['mail'])) ){
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