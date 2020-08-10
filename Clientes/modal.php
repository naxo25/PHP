<!-------------- Agregar ------------------->

<div class="modal fade" id="addCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel"> Agregar nuevo cliente </h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
		<form id="addFormCliente">
			<div class="container-fluid">
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;"> Nombre: </label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="nombre" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Apellido: </label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="apellido" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Direccion: </label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="direccion" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Mail: </label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="mail" required>
					</div>
				</div>
            </div> 
           		<div class="modal-footer">
           	    	<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>
                	<button type="submit" class="btn btn-primary"> Agregar cliente </a>
            	</div>
		</form>
	    </div>
        </div>
    </div>
</div>

<!----------- Editar -------------->

<div class="modal fade" id="editCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel"> Modificar cliente </h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
		<form id="editFormCliente">
			<div class="container-fluid">
					<div class="col-sm-9">
						<input type="hidden" class="form-control id" name="id">
					</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Nombre: </label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control nombre" name="nombre" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Apellido: </label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control apellido" name="apellido" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Direccion: </label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control direccion" name="direccion" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Mail: </label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control mail" name="mail" required>
					</div>
				</div>
            		</div> 
           		<div class="modal-footer">
           	    		<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>
                		<button type="submit" class="btn btn-primary"> Guardar cambios en cliente </a>
            		</div>
		</form>
	    </div>
        </div>
    </div>
</div>

<!----------- Eliminar -------------->

<div class="modal fade" id="deleteCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel"> Eliminar cliente </h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            	<div class="modal-body">
            		<p class="text-center"> ¿Esta seguro en eliminar los datos de? </p>
				<h2 class="text-center fullname"></h2>
            		</div> 
           		<div class="modal-footer">
           	    		<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>
                		<button type="button" class="btn btn-danger id"> Eliminar cliente </button>
            		</div>
		</div>
        </div>
    </div>
</div>
