<?php
include_once('../connection.php');
	$database = new Connection();
	$db = $database->open();
	try{
		$stmt = $db->prepare("SELECT * FROM articulos WHERE id = :id");
		$stmt->bindParam(':id', $_POST['id']);
		$stmt->execute();
		$result = $stmt->fetch();
		if ($result) { $output['data'] = array('ybqaHS84uE'=>$result['id'], 'Up6A2x7YZb'=>$result['nombre_articulo'],
											   'NuwdnhmBWL'=>$result['precio']); }
	}
	catch(PDOException $e){
		$output['message'] = $e->getMessage();
	}
	//cerrar conexión
	$database->close();
	echo json_encode($output);
?>