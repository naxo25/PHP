<!-------------- Agregar ------------------->

<div class="modal fade" id="addCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel"> Agregar nueva compra </h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
		<form id="addFormCompra">
			<div class="container-fluid">
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Run Articulo: </label>
					</div>
					<div class="col-sm-9">
					  <input list="arta" type="text" class="form-control" name="nombre" required>
					  <datalist id="arta">
					     <?php
							include_once('connection.php');
							$database = new Connection();
							$db = $database->open();
							$sqla = 'SELECT * FROM articulos';
						    foreach ($db->query($sqla) as $row) {
								$id = $row['id'];
								$nom = $row['nombre_articulo'];
					            echo "<option value='$id'>$nom</option>";
							}
					     ?>
					  </datalist>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Run Comprador: </label>
					</div>
					<div class="col-sm-9">
					  <input list="artc" type="text" class="form-control" name="apellido" required>
					  <datalist id="artc">
					     <?php
							$sqlb = 'SELECT * from clientes';
							foreach ($db->query($sqlb) as $ro) {
								$id = $ro['id'];
								$art = $ro['nombre'].$ro['apellido'];
							    echo "<option value='$id'>$art</option>";
							}
							$database->close();
					     ?>
					  </datalist>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Cantidad: </label>
					</div>
					<div class="col-sm-9">
						<input type="number" class="form-control" name="precio" required>
					</div>
				</div>
            		</div> 
           		<div class="modal-footer">
           	    		<button type="button" class="btn btn-default cerrarModalAdd" data-dismiss="modal"> Cancelar </button>
                		<button type="submit" class="btn btn-primary"> Agregar Compra </a>
            		</div>
		</form>
	    </div>
        </div>
    </div>
</div>

<!----------- Editar -------------->

<div class="modal fade" id="editCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel"> Compra </h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
		<form id="editFormCompra">
			<div class="container-fluid">
					<div class="col-sm-9">
						<input type="hidden" class="form-control id" name="id">
					</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Run Articulo: </label>
					</div>
					<div class="col-sm-9">
					  <input list="arta" type="text" class="form-control cod_art" name="cod_art" required>
					  <datalist id="arta">
					     <?php
							include_once('connection.php');
							$database = new Connection();
							$db = $database->open();
							$sqla = 'SELECT * FROM articulos';
							foreach ($db->query($sqla) as $row) {
								$id = $row['id'];
								$nom = $row['nombre'];
						        echo "<option value='$id'>$nom</option>";
							}
					     ?>
					  </datalist>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Run Comprador: </label>
					</div>
					<div class="col-sm-9">
					  <input list="artc" type="text" class="form-control id_cli" name="id_cli" required>
					  <datalist id="artc">
					     <?php
							$sqlb = 'SELECT * from clientes';
							foreach ($db->query($sqlb) as $ro) {
								$id = $ro['id'];
								$art = $ro['nombre'].$ro['apellido'];
						        echo "<option value='$id'>$art</option>";
							}
							$database->close();
					     ?>
					  </datalist>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">cantidad: </label>
					</div>
					<div class="col-sm-9">
						<input type="number" class="form-control cantidad" name="cantidad" required>
					</div>
				</div>
            		</div> 
           		<div class="modal-footer">
                		<button type="submit" class="btn btn-primary"> Guardar cambios </button>
                		<button type="button" style="position: relative; left:0px" class="btn btn-danger id"> Eliminar Compra </button>
           	    		<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>
            		</div>
		</form>
	    </div>
        </div>
    </div>
</div>

<!----------- Eliminar -------------->

<div class="modal fade" id="deleteCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel"> Eliminar Compra </h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            	<div class="modal-body">
            		<p class="text-center"> ¿Esta seguro en eliminar los datos de? </p>
				<h2 class="text-center fullname"></h2>
            		</div> 
           		<div class="modal-footer">
           	    		<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>
                		<button type="button" class="btn btn-danger id"> Eliminar Compra </button>
            		</div>
		</div>
        </div>
    </div>
</div>
