<!-------------- Agregar ------------------->

<div class="modal fade" id="addStock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel"> Agregar Stock </h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
		<form id="addFormStock">
			<div class="container-fluid">
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Bodega: </label>
					</div>
					<div class="col-sm-9">
  <input list="bod_b" type="text" class="form-control" name="bodega">
  <datalist id="bod_b">
        <?php
	include_once('connection.php');
	$database = new Connection();
	$db = $database->open();
	$sqla = 'SELECT * FROM bodegas';
	    foreach ($db->query($sqla) as $row) {
			$id = $row['id'];
			$nom = $row['nombre'];
            echo "<option value=$id>$nom</option>";


	}
        ?>
  </datalist>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Articulo: </label>
					</div>
					<div class="col-sm-9">
  <input list="bod_ar" type="text" class="form-control" name="articulo">
  <datalist id="bod_ar">
        <?php
	$sqlb = 'SELECT * from articulos';
	    foreach ($db->query($sqlb) as $ro) {
			$id = $ro['id'];
			$art = $ro['nombre_articulo'];
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
						<input type="number" class="form-control" name="cantidad">
					</div>
				</div>
            		</div> 
           		<div class="modal-footer">
           	    		<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>
                		<button type="submit" class="btn btn-primary"> Agregar Stock </a>
            		</div>
		</form>
	    </div>
        </div>
    </div>
</div>

<!----------- Editar -------------->

<div class="modal fade" id="editStock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel"> Modificar Stock </h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
		<form id="editFormStock">
			<div class="container-fluid">
					<div class="col-sm-9">
						<input type="hidden" class="form-control id" name="id">
					</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Bodega: </label>
					</div>
					<div class="col-sm-9">
  <input list="bod_b" type="text" class="form-control bodega" name="bodega">
  <datalist id="bod_b">
    <?php
	include_once('connection.php');
		$database = new Connection();
		$db = $database->open();
		$sqla = 'SELECT * FROM bodegas';
	    foreach ($db->query($sqla) as $row) {
			$id = $row['id'];
			$nom = $row['nombre'];
            echo "<option value=$id>$nom</option>";
		}
		$database->close();
	?>
  </datalist>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Articulo: </label>
					</div>
					<div class="col-sm-9">
  <input list="bod_ar" type="text" class="form-control articulo" name="articulo">
  <datalist id="bod_ar">
    <?php
	include_once('connection.php');
		$database = new Connection();
		$db = $database->open();
		$sqlb = 'SELECT * from articulos';
	    foreach ($db->query($sqlb) as $ro) {
			$id = $ro['id'];
			$art = $ro['nombre_articulo'];
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
						<input type="number" class="form-control cantidad" name="cantidad">
					</div>
				</div>
            		</div> 
           		<div class="modal-footer">
           	    		<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>
                		<button type="submit" class="btn btn-primary"> Editar Stock </a>
            		</div>
		</form>
	    </div>
        </div>
    </div>
</div>

<!----------- Eliminar -------------->

<div class="modal fade" id="deleteStock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel"> Eliminar Stock </h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            	<div class="modal-body">
            		<p class="text-center"> ¿Esta seguro en eliminar los datos de? </p>
				<h2 class="text-center fullname"></h2>
            		</div> 
           		<div class="modal-footer">
           	    		<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>
                		<button type="button" class="btn btn-danger id"> Eliminar Stock </button>
            		</div>
		</div>
        </div>
    </div>
</div>
