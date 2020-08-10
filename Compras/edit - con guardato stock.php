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
		$compra = 0;

		$sql = "select precio from compras WHERE id = '$id'";
		foreach ($db->query($sql) as $stock) {	
			$comprados = $precio - $stock['precio'];
		}
		$sql = "select stock from bodega WHERE apellido = '$nombre'";
		foreach ($db->query($sql) as $stock) {	
			$compra = $stock['stock'] - $comprados;
		}

		$sql = "UPDATE bodega SET stock = '$compra' WHERE apellido = '$nombre'";
		$db->exec($sql);
						//Articulo 		Persona 	Cantidad
		$sql = "UPDATE compras SET nombre = '$nombre', apellido = '$apellido', precio = '$precio' WHERE id = '$id'";
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