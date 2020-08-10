<?php
include_once('../connection.php');
	$output = array('error' => false);
	$database = new Connection();
	$db = $database->open();
	try{
		$id = $_POST['id'];
		$stmt = $db->prepare("SELECT * FROM bodega WHERE id = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$result = $stmt->fetch();
		if ($result) { $output['data'] = array('a782UbnEAF'=>$result['id'], 'AvFjodhdD'=>$result['id_bodega'],
											   'PLIQznPEHG'=>$result['id_articulo'], 'igSNxn4x4z'=>$result['cantidad']); }
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}
	//cerrar conexión
	$database->close();
	echo json_encode($output);
?>