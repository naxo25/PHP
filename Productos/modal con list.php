<!-------------- Agregar ------------------->

<div class="modal fade" id="addProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel"> Agregar nueva compra </h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
		<form id="addFormProducto">
			<div class="container-fluid">
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Nombre: </label>
					</div>
					<div class="col-sm-9">
	<select type="text" class="form-control nombre" name="nombre">
        <option value="0">Seleccione:</option>
        <?php
	include_once('connection.php');
	$database = new Connection();
	$db = $database->open();
	$sql = 'SELECT * FROM articulos';
	    foreach ($db->query($sql) as $nom) {
			$id = $nom[id];
			$art = $nom['nombre'];
            echo "<option value=$id>$art</option>";


	}
        ?>
      </select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Precio: </label>
					</div>
					<div class="col-sm-9">
						<input type="number" class="form-control" name="precio">
					</div>
				</div>
            		</div> 
           		<div class="modal-footer">
           	    		<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>
                		<button type="submit" class="btn btn-primary"> Agregar Miembro </a>
            		</div>
		</form>
	    </div>
        </div>
    </div>
</div>

<!----------- Editar -------------->

<div class="modal fade" id="editProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel"> Modificar miembro </h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
		<form id="editFormProducto">
			<div class="container-fluid">
					<div class="col-sm-9">
						<input type="hidden" class="form-control id" name="id">
					</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Nombre: </label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control nombre" name="nombre">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Precio: </label>
					</div>
					<div class="col-sm-9">
						<input type="number" class="form-control precio" name="precio">
					</div>
				</div>
            		</div> 
           		<div class="modal-footer">
           	    		<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>
                		<button type="submit" class="btn btn-primary"> Guardar cambios </a>
            		</div>
		</form>
	    </div>
        </div>
    </div>
</div>

<!----------- Eliminar -------------->

<div class="modal fade" id="deleteProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel"> Eliminar Miembro </h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            	<div class="modal-body">
            		<p class="text-center"> ¿Esta seguro en eliminar los datos de? </p>
				<h2 class="text-center fullname"></h2>
            		</div> 
           		<div class="modal-footer">
           	    		<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>
                		<button type="button" class="btn btn-danger id"> Eliminar Miembro </button>
            		</div>
		</div>
        </div>
    </div>
</div>
