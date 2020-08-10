<?php
include_once('../connection.php');
	$database = new Connection();
	$db = $database->open();
	try{
		$stmt = $db->prepare("SELECT * FROM compras WHERE id = :id");
		$stmt->bindParam(':id', $_POST['id']);
		$stmt->execute();
		$result = $stmt->fetch();
		if ($result) { $output['data'] = array('mK5UbdEmmd'=>$result['id'], 'xb27V3Ui1U'=>$result['codigo_articulo'],
											   'JrLoIauOX1'=>$result['id_cliente'], 'Vhly4yvi5u'=>$result['cantidad']
												);}
	}
	catch(PDOException $e){
		$output['message'] = $e->getMessage();
	}
	//cerrar conexión
	$database->close();
	echo json_encode($output);
?>