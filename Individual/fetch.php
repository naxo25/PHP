<?php
	include_once('../connection.php');

	$database = new Connection();
	$db = $database->open();

	try{	 
	    $sql = "SELECT * FROM compras where id_cliente = '".$_POST['id']."' ";
	    $totalMax = 0;

	    foreach ($db->query($sql) as $row) {

		$cod_articulo = $row['codigo_articulo'];
	    	$id_cliente = $row['id_cliente'];
		$cantidad = $row['cantidad'];
		$id = $row['id'];

		$nom_articulo = 'No Definido';
		$nom_cliente = 'Indifinido';
		$precio = 0;
		$en_uso = 0;
		$en_uso = 0;

		$sqlnom = "Select nombre,precio from articulos where id = '$cod_articulo' ";

		foreach ($db->query($sqlnom) as $nom) {
			$nom_articulo = $nom['nombre'];
			$precio = $nom['precio'];
		}
		
		$sqlcli = "Select nombre,apellido from clientes where id = '$id_cliente' ";
		foreach ($db->query($sqlcli) as $cliente) {
			$nom_cliente = $cliente['nombre']." ".$cliente['apellido'];
		}	

		$total = $cantidad * $precio;

		echo "	
	    		<tr>
	    			<td> $id </td>
	    			<td> $nom_articulo($cod_articulo)  </td>
	    			<td> $nom_cliente($id_cliente) </td>
				<td> $cantidad </td>
	    			<td> $precio </td>
	    			<td> $total </td>
	    		<td>
	    			<button class='btn btn-success btn-sm editCliente' data-id=$id ><span class='glyphicon glyphicon-edit'></span> Editar</button>
	    			<button class='btn btn-danger btn-sm deleteCliente' data-id='$id '><span class='glyphicon glyphicon-trash'></span> Eliminar</button>
	    		</td>
	    		</tr>
		"; 	$totalMax += $total;

	    }
		echo "	<script>  	
				document.getElementById('total').innerHTML = $totalMax;
			</script> 
		";
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//cerrar conexión
	$database->close();
	
?>