<?php
	include_once('../connection.php');

	$database = new Connection();
	$db = $database->open();
	
	sleep(2);

	try{	
	    $sql = 'SELECT * FROM articulos order by id asc';
	    $total_max = 0;
	    $cant_max = 0;

	    foreach ($db->query($sql) as $row) {
	    	$first = $row['nombre'];
	    	$precio = $row['precio'];
	    	$id = $row['id'];

		$nom_articulo = 'No Definido';
		$nom_cliente = 'Indifinido';
		$cantidad = 0;
		$total = 0;
		$compras = 0;
		
		$sqlcom = "Select c.cantidad from compras c where codigo_articulo = '$id' ";
		foreach ($db->query($sqlcom) as $cliente) {
			$cantidad += $cliente['cantidad'];
		}	
		$total += $precio * $cantidad;
		$total_max += $total;

		$graf[] = $first; 	$precios[] = $total;

	    }
		$i = 0; $n = 0;
			for($i = 0; $i < count($graf); $i++){

			echo "	
	    			<tr> ";
					$n = ((100*$precios[$i])/($total_max));
					$n = round($n*100)/100;
			echo "		<td> $graf[$i] $n% Ganancia: $precios[$i] </tr>
	    			</th>

			<tr><td>
			"; 
					for ($t = 0; $t < 100; $t++) {
						if ($n > $t) {
						echo " *";}
					}
			echo "</td></tr>";
			}
		

		echo "	<script> var total_max = $total_max ; 	
				document.getElementById('total').innerHTML = total_max;
			</script> 
		";
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//cerrar conexión
	$database->close();
	
?>