<div class='row' style='text-align: center; margin-top:3px;'>
   			<div class='col-md-12' style=''>
				<div class='row'>
                		<div class='col-md-1'>
                        	<label> ID </label>
                        </div>
                        <div class='col-md-3' style='left: -4%'>
                        	<label> Comprador </label>
                        </div>
                        <div class='col-md-2'>
                        	<label> Articulo </label>
                        </div>
                        <div class='col-md-1'>
                        	<label> Cantidad </label>
                        </div>
                        <div class='col-md-1'>
                        	<label> Precio </label>
                        </div>
                        <div class='col-md-2'>
                        	<label> Total </label>
                        </div>
                        <div class='col-md-2'>
                        	<label> Acciones <label>
                        </div>
				</div>
			</div>
</div>

<?php
	include_once('../connection.php');

	$database = new Connection();
	$db = $database->open();

	try{	
	    $sql = 'SELECT  * from compras order by id asc';
	    $total_Max = 0;

	    foreach ($db->query($sql) as $row) {

		$cantidad = 0;
		$cod_articulo = $row['codigo_articulo'];
	    $id_cliente = $row['id_cliente'];
		$cantidad = $row['cantidad'];
		$id = $row['id'];

		$nom_articulo = 'No Definido';
		$nom_cliente = 'Indifinido';
		$precio = 0;
		$en_uso = 0;
		$en_uso = 0;

		$sqlnom = "Select * from articulos where id = '$cod_articulo' ";

		foreach ($db->query($sqlnom) as $nom) {
			$nom_articulo = $nom['nombre_articulo'];
			$precio = $nom['precio'];
		}
		
		$sqlcli = "Select nombre,apellido,mail from clientes where id = '$id_cliente' ";
		foreach ($db->query($sqlcli) as $cliente) {
			$nom_cliente = $cliente['nombre']." ".$cliente['apellido'];
			$mail = $cliente['mail'];
		}	

		$total = $cantidad * $precio;
		$total_Max += $total;

		echo "	
	    		 <div class='row editCompra' style='text-align: center;' data-id=$id>
                                <div class='col-md-12'>

                                        <div class='row'>
                                            <div class='col-md-1'>
                                                <p> $id </p>
                                            </div>
                                            <div class='col-md-3'>
                                                <p style='text-align:left; margin-left: 15% '> $nom_cliente 
                                                <br> $mail </p>
                                            </div>
                                            <div class='col-md-2'>
                                                <p> $nom_articulo </p>
                                            </div>
                                            <div class='col-md-1'>
                                                <p> $cantidad </p>
                                            </div>
                                            <div class='col-md-1'>
                                                <p> $precio </p>
                                            </div>
                                            <div class='col-md-2'>
                                                <p> $total </p>
                                            </div>
                                            <div class='col-md-2'>
	    									<button class='btn btn-primary btn-sm editCompra' data-id=$id ><span class='glyphicon glyphicon-edit'></span> Seleccionar </button>
                                            </div>
                                        </div>

								</div>
	      		</div>
		"; 	

	    }
		echo "	<div class='row' style='text-align: center'>
						<div class='col-md-8'></div>
						<div class='col-md-2'>
							<p> $total_Max </p>
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