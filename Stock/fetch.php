	<?php
	include_once('../connection.php');

	$database = new Connection();
	$db = $database->open();

	try{	
	    $sql = 'SELECT * FROM bodega';
	    $totalMax = 0;

	    foreach ($db->query($sql) as $row) {

		$id_bodega = $row['id_bodega'];
	    $id_articulo = $row['id_articulo'];
		$cantidad = $row['cantidad'];
		$id = $row['id'];
		$nom_articulo = 'No Definido';
		$nom_bodega = 'No Definido';
		$en_uso = 0;

		$sqlnom = "Select nombre from bodegas where id = '$id_bodega' ";

		foreach ($db->query($sqlnom) as $nom) {
			$nom_bodega = $nom['nombre'];
		}

		$sqlcli = "Select nombre_articulo from articulos where id = '$id_articulo' ";
		foreach ($db->query($sqlcli) as $articulo) {
			$nom_articulo = $articulo['nombre_articulo'];
		}

		$sqlcli = "Select cantidad from compras where codigo_articulo = '$id_articulo' ";
		foreach ($db->query($sqlcli) as $articulo) {
			$en_uso += $articulo['cantidad'];
		}

		$uso = ($cantidad - $en_uso);


		echo "	
	    		<tr class='editStock' data-id=$id>
	    			<td> $id </td>
	    			<td> $nom_bodega($id_bodega)  </td>
	    			<td> $nom_articulo($id_articulo) </td>
				<td> $en_uso </td>";
				if ($uso > 0) {	echo "<td>"; } else { echo "<td style='color:red'>"; } 
		echo "		$uso </td> 
				<td> $cantidad </td>
	    		<td>
	    			<button class='btn btn-success btn-sm editStock' data-id=$id > Editar</button>
	    			<button class='btn btn-danger btn-sm deleteStock' data-id='$id '> Eliminar</button>
	    		</td>
	    		</tr>
		"; 	

	    }
	}

	catch(PDOException $e){

		echo "There is some problem in connection: " . $e->getMessage();

	}

	//cerrar conexión
	$database->close();
	
?>