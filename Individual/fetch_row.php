<?php
include_once('../connection.php');
	$database = new Connection();
	$db = $database->open();
	try{
		$stmt = $db->prepare("SELECT * FROM compras WHERE id = :id");
		$stmt->bindParam(':id', $_POST['id']);
		$stmt->execute();
		$output['data'] = $stmt->fetch();
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}
	//cerrar conexión
	$database->close();
	echo json_encode($output);
?>