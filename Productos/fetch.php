<?php
	include_once('../connection.php');

	$database = new Connection();
	$db = $database->open();

	try{	
	    $sql = 'SELECT * FROM articulos';
$total = 0;
	    foreach ($db->query($sql) as $row) {
	    	$first = $row['nombre_articulo'];
		$precio = $row['precio'];
		$id = $row['id'];
		
		$total += $precio;

		echo "
	    		<tr class='editProducto' data-id=$id>
	    			<td> $id </td>
	    			<td> $first </td>
				<td> $precio </td>
	    		<td>
	    			<button class='btn btn-success btn-sm editProducto' data-id=$id ><span class='glyphicon glyphicon-edit'></span> Editar</button>
	    			<button class='btn btn-danger btn-sm deleteProducto' data-id='$id '><span class='glyphicon glyphicon-trash'></span> Eliminar</button>
	    		</td>
	    		</tr>
		"; 
	    }
		echo "	<script> var total = $total ; 	
				document.getElementById('total').innerHTML = total;
			</script> 
		";
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//cerrar conexión
	$database->close();
	
?>