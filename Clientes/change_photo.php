<?php
	include_once('../connection.php');
	
	$database = new Connection();
	$db = $database->open();
	
    $sql = "UPDATE clientes set foto_user = ? where id = ?";
	$sentencia = $db->prepare($sql);
	$sentencia->execute(array($_POST['nombre_foto'],$_POST['nombre_foto']));

	$ruta = '../images/profiles/'; 
	$uploadfiletemporal  = $_FILES['fichero']['tmp_name'];
	$r = $_POST['nombre_foto'].'.jpg';

	include_once('redim.php');

	if (is_uploaded_file($uploadfiletemporal))
	{
		clearstatcache();
	    move_uploaded_file($uploadfiletemporal,$ruta.$r);
	}
	else
	{
	echo "error";
	}
	
	$database->close();
	
	header('location:../');
?>