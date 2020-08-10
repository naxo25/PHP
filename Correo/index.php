<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intra-Mail</title>	

<script>

$('#correo').submit(function(e){
	e.preventDefault();
	var correo = $('#correo').serialize();
	var url='Correo/mandar_correo.php';
	$.ajax({
		method: 'POST',
		url: url,
		data: correo,
		dataType: 'html',
		success: function(response){
		if (response == 3) {
			alert('Correo Invalido');
			$('.cuenta').focus()
			}
		else{
			fetch();
			alert('Mensaje enviado'); setCookie('noti1',1,3600)
			}
		} 
	}) 
});
$('.cuenta').focus();

</script>
<style>

#caja {

}

@media only screen and (max-width: 600px) {
  body {
    background-color: ;
  }
}

</style>

</head>

<body>

<div class="container-fluid">
   <h3 style="margin-top:35px;margin-bottom:20px;"></h3>

    <form id="correo">
	<div class="row form-group">
		<div class="col-sm-3">
			<label class="control-label" style="position:relative; top:7px;">Cuenta Destino: </label>
		</div>
		<div class="col-sm-9"> 
	  	<input list="corr" type="text" class="form-control cuenta" name="Destino" required autofocus placeholder="Cuenta Usuario">
  <datalist id="corr">
        <?php
	include_once('../connection.php');
	$database = new Connection();
	$db = $database->open();
	$sql = 'SELECT * FROM clientes';
	    foreach ($db->query($sql) as $row) {
		    $nom_cliente = $row['nombre'].' '.$row['apellido'];
	    	$mail = $row['mail'];
            echo "<option value='$mail'> $nom_cliente </option>";
	    }
	$database->close();
        ?>
  </datalist>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-sm-3">
			<label class="control-label" style="position:relative; top:7px;">Asunto: </label>
		</div>
		<div class="col-sm-9">
        		<input type="text" name="asunto" value="" class="form-control asunto" placeholder="Asunto" required></p>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-sm-3">
			<label class="control-label" style="position:relative; top:7px;">Mensaje: </label>
		</div>
		<div class="col-sm-9">
        		<textarea type="text" cols="50" rows="5" placeholder="mensaje" class="form-control" name="msj"></textarea>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" id="mandar_correo" type="submit"> Mandar Correo </button></p>
	</div>

    </form>
</div>

</body>
</html>