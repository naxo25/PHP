<style>
body{
    background: -webkit-linear-gradient(left, 255,255);
}
.emp-profile{
    padding: 3%;
 margin-bottom: 3%;
    border-radius: 0.5rem;
    background: ;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>

<?php
	include_once('../connection.php');

	$database = new Connection();
	$db = $database->open();

	try{	 
	    $sql = "SELECT * FROM clientes where id = '".$_POST['id']."' ";
	    $totalMax = 0;

	    foreach ($db->query($sql) as $row) {

	    	$nombre = $row['nombre'];
	    	$apellido = $row['apellido'];
		    $nom_cliente = $row['nombre'].' '.$row['apellido'];

	    	$address = $row['direccion'];
	    	$mail = $row['mail'];
		    $id_cliente = $row['id'];

		    $foto = 'images/profiles/'.$row['foto_user'].'.jpg'; 
		?>

<div class="tbody container emp-profile" style='overflow: none'>
                <div class="row">
                    <div class="col-md-4">
			    <form id="cambiar_foto" enctype="multipart/form-data" method='post' action='Clientes/change_photo.php'> 
                        <div class="profile-img" style="min-width:166px; height:180px">
                            <img src="<?php echo $foto ?>" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                       Change Photo
                                   <input name="fichero" type="file" data-id='<?php echo $id_cliente ?>'/> 
							       <input hidden name='nombre_foto' value='<?php echo $_POST['id'] ?>'/>
                            </div>
                        </div>
				</form> 
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $nom_cliente ?>
                                    </h5>
                                    <h6>
                                        Web Developer and Designer
                                    </h6>
                                    <p class="proile-rating"> Deuda : <span style='color: black' id='total'>?</span></p>
                        </div>
                    </div>
                    <div class="col-md-2">
	    			    <button type="button" class='btn btn-success btn-sm editCliente' data-id='<?php echo $id_cliente ?>' value='editar' > editar perfil </button>
	    			    <button class='btn btn-danger btn-sm deleteCliente' data-id='<?php echo $id_cliente ?> '> Eliminar </button>
                    </div>
                </div>

		    <div class="row" >
	                	<div class="col-md-4" style="text-align:right">
				<br> 
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo $id_cliente ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo $nom_cliente ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo $mail ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>123 458 789 10</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>
		    </div>

                    <div class="col-md-8">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#compras" role="tab" aria-controls="home" aria-selected="true">Compras</a>
                                </li>
                            </ul>
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="compras" role="tabpanel" aria-labelledby="home-tab" >

<?php
	}
	echo "
                <div class='row'>	
              <div class='col-md-12'><table class='table table-striped' style='text-align: center'>
		<thead>
		<th>Id Compra</th><th>Articulo</th><th>cantidad</th><th>Precio</th><th>Debe</th>
		</thead> 
		<tbody style='overflow: scroll'>";

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
 		$sqlnom = "Select nombre_articulo,precio from articulos where id = '$cod_articulo' ";

		foreach ($db->query($sqlnom) as $nom) {
			$nom_articulo = $nom['nombre_articulo'];
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
	    			<td> $nom_articulo  </td>
				<td> $cantidad </td>
	    			<td> $precio </td>
	    			<td> $total </td>
	    		</tr>
		"; 	$totalMax += $total;

	    }
		echo "	</table>
	</div>
</div>
			<script>  	
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
                    </div>
			  </div>
		  </div>
	</div>


<script>

$('#cambiar_foto').on('input', ':input', function() { 
   var value = $(this).val(); //obtiene el valor actual del input.
   var name = $(this).prop('name');
   console.log(name+": "+value);
    if (value.length > 0){ //si el campo no esta vacio
            alert('Foto Cambiada'); 
   }
    cambiar();
});

function cambiar(){
    url = 'Clientes/change_photo.php';
    var fot = $('#cambiar_foto').serialize();
    $.ajax({
        method: 'POST',
        url: url,
        data: $('#cambiar_foto').submit(),
        dataType: 'json',
        success: function(response){
            alert('Foto Cambiada'); 
        } 
    }) 
}

</script>