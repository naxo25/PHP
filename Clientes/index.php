<div class='row' style='text-align: center; margin-top:3px;'>
	<div class='col-md-12' style=''>
		<div class='row'>
						<div class='col-md-1'>
        	       		<label> </label>
                        </div>
                        <div class='col-md-1'>
                        	<label> ID </label>
						</div>
                        <div class='col-md-2' style='left: -1% '>
							<label> Nombre </label>
						</div>
						<div class='col-md-1'>
						<label></label>
						</div>
                        <div class='col-md-2'>
                        	<label>Direccion </label>
                        </div>
                        <div class='col-md-1'>
                        	<label> Debe </label>
                        </div>
                        <div class='col-md-4'>
                        	<label> Acciones </label>
                        </div>
		</div>
	</div>
</div>

<?php
	include_once('../connection.php');

	$database = new Connection();
	$db = $database->open();

	try{	
	    $sql = 'SELECT * FROM clientes';
	    $total_max = 0;

	    foreach ($db->query($sql) as $row) {
	    	$first = $row['nombre'];
	    	$last = $row['apellido'];
	    	$address = $row['direccion'];
	    	$mail = $row['mail'];
			$id = $row['id'];

		$foto = 'images/profiles/'.$row['foto_user'].'.jpg'; 

		$nom_articulo = 'No Definido';
		$nom_cliente = $first.' '.$last;
		$cantidad = 0;
		$total = 0;
		$compras = 0;
		
		$sqlcom = "Select c.cantidad, c.codigo_articulo from compras c where id_cliente = '$id' ";
		foreach ($db->query($sqlcom) as $cliente) {
			$cantidad = $cliente['cantidad'];
			$codigo = $cliente['codigo_articulo'];

			$sqlpro = "Select precio from articulos where id = '$codigo' ";
			foreach ($db->query($sqlpro) as $producto) {
				$precio_cod = $producto['precio'] * $cantidad;
			}
			$total += $precio_cod;
			$compras = $compras + $cantidad;
		}
		$total_max += $total;
		

		echo "	
	    		<div class='row' style='text-align: center; margin-bottom: 1px;' ondblclick='clickCliente($id)'>
                    <div class='col-md-12'>

                        <div class='row'>
							<div class='col-md-1' style='margin-top:0px;'>
                                <img src='$foto' style='width: 30px; height: 30px; border-radius: 25px' />
                            </div>
                            <div class='col-md-1'>
                            	<p> $id  </p>
                            </div>
                            <div class='col-md-3'>
                            	<p style='text-align:left; margin-left: 15% '> $nom_cliente <br>";
		echo "				<a href='mailto:$mail' target='blank'>$mail</a></p>
							</div>
							<div class='col-md-0'>
							</div>
							<div class='col-md-2'>
							    <p> $address </p>
							</div>
							<div class='col-md-1'>
							    <p> $total </p>
							</div>
							<div class='col-md-4'>
	    						<button class='btn btn-primary btn-sm boton' style='color: white;' onclick='clickCliente($id)'> Seleccionar </button>
	    						<button class='btn btn-success btn-sm editCliente' data-id=$id > Editar</button>
	    						<button class='btn btn-danger btn-sm deleteCliente' data-id='$id '> Eliminar</button>
							</div>
						</div>

					</div>
	      		</div>
		"; 
	    }


	echo "<div class='row'>
			<div class='col-md-7'></div>
			<div class='col-md-1'>
				<p>$total_max</p>
			</div>
	      </div>
		";
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//cerrar conexión
	$database->close();
	
?>