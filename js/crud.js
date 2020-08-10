$( document ).ready(function() {
	determinar(readCookie('color'));
});

function tuto() {
	$('#Tutorial').modal('show');
};

$('.tuto').click(function() {
	$('#Tutorial2').modal('show');
});

function modales(num) {
	
	//add
	$('#addnew').click(function(e){	
		e.preventDefault();
		e.stopImmediatePropagation();
		$(add).modal('show');
	});
	$(addF).submit(function(e){
		e.preventDefault();
		e.stopImmediatePropagation();
		var addform = $(this).serialize();
		$.ajax({
			method: 'POST',
			url: urladd,
			data: addform,
			dataType: 'html',
			success: function(response){
				fetch();
				$(add).modal('hide');
				$(addF)[0].reset();
			} 
		})
	});
	//

	//edit
	
	$(document).on('click', editClick, function(e){
		e.preventDefault();
		e.stopImmediatePropagation();
		var id = $(this).data('id');
		getDetails(id,num);
		$(edit).modal('show');
	});
	$(editF).submit(function(e){
		e.preventDefault();
		e.stopImmediatePropagation();
		var editar = $(this).serialize();
		var id = $(this).val();
		$.ajax({
			method: 'POST',
			url: urlmodify,
			data: editar,
			dataType: 'html',
			success: function(response){
		        fetch();
				$(edit).modal('hide');
				$(delet).modal('hide');
			}
		});
	});


	//delete
	$(document).on('click', deleteClick, function(e){
		e.preventDefault();
		e.stopImmediatePropagation();
		var id = $(this).data('id');
		getDetails(id,num);
		$(delet).modal('show');
	});

	$('.id').click(function(e){
		e.preventDefault();
		e.stopImmediatePropagation();
		var id = $(this).val();
		$.ajax({
			method: 'POST', 
			url: urldelete,
			data: {id:id},
			dataType: 'html',
			success: function(response){
				fetch();
				$(edit).modal('hide');
				$(delet).modal('hide');
			}
		});
	});

}

function solucion(num) {

	if ( (num == 0 || num == 6) ) { 
		add = '#addCliente';  
		edit = '#editCliente';  
		delet = '#deleteCliente';
		addF = '#addFormCliente';
		editF = '#editFormCliente';
		editClick = '.editCliente';
		deleteClick = '.deleteCliente';
		idClick = '.idCliente';
	} else if (num == 1) {
		add = '#addProducto';  
		edit = '#editProducto';  
		delet = '#deleteProducto';
		addF = '#addFormProducto';
		editF = '#editFormProducto';
		editClick = '.editProducto';
		deleteClick = '.deleteProducto';
		idClick = '.idProducto';
	} else if (num == 3) {
		add = '#addCompra';  
		edit = '#editCompra';  
		delet = '#deleteCompra';
		addF = '#addFormCompra';
		editF = '#editFormCompra';
		editClick = '.editCompra';
		deleteClick = '.deleteCompra';
		idClick = '.idCompra';
	} else if (num == 2) {
		add = '#addIndividual';  
		edit = '#editIndividual';  
		delet = '#deleteIndividual';
		addF = '#addFormIndividual';
		editF = '#editFormIndividual';
		editClick = '.editIndividual';
		deleteClick = '.deleteIndividual';
		idClick = '.idIndividual';
	} else if (num == 4) {
		add = '#addStock';  
		edit = '#editStock';  
		delet = '#deleteStock';
		addF = '#addFormStock';
		editF = '#editFormStock';
		editClick = '.editStock';
		deleteClick = '.deleteStock';
		idClick = '.idStock';
	} else if (num == 5) {
		url	  	  = 'Correo/index.php';
		urladd    = 'Stock/add.php';
		urlmodify = 'Stock/edit.php';
		urldelete = 'Stock/delete.php';
		urlget 	  = 'Stock/fetch_row.php';
	}

}

function fetch(){	
	$.ajax({
		method: 'POST',
		url: url,
		dataType: 'html',
		success: function(response){
			$('#tbody').html(response);
		}
	})
		
}

function selectCliente(id){
	$.ajax({
		method: 'POST',
		url: url,
		data: {id:id},
		dataType: 'html',
		success: function(response){
			$('#tbody').html(response);
		}
	})
}

function clickCliente(id){
	setCookie('id',id,2);
	determinar(6);	
}

function determinar(num) {

	if (readCookie('color')) { 
		setCookie('color',num,2);
	} else if (!readCookie('color')) {
		setCookie('color',3,2);
		setCookie('id',69,2);
		num = readCookie('color');
		tuto();
	}

	archivos(num);
	solucion(num);
	modales(num);

	var id = readCookie('id');
	selectCliente(id);
}

function getDetails(id,num){
	$.ajax({
		method: 'POST',
		url: urlget,
		data: {id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$(edit).remove();
				$(delet).remove();
			}
			else{
				if (num == 3) {
					$('.id').val(response.data.mK5UbdEmmd);
					$('.cod_art').val(response.data.xb27V3Ui1U);
					$('.id_cli').val(response.data.JrLoIauOX1);
					$('.cantidad').val(response.data.Vhly4yvi5u);
					$('.fullname').html(response.data.mK5UbdEmmd);
				} else if (num == 1) {
					$('.id').val(response.data.ybqaHS84uE);
					$('.nombre').val(response.data.Up6A2x7YZb);
					$('.precio').val(response.data.NuwdnhmBWL);
					$('.fullname').html(response.data.Up6A2x7YZb + ' ' + response.data.NuwdnhmBWL);
				} else if (num == 0 || num == 6) {
					$('.id').val(response.data.JiSVHMAhst);
					$('.nombre').val(response.data.lyyM7uk8Ri);
					$('.apellido').val(response.data.kn9PLj8ZOb);
					$('.direccion').val(response.data.xT0pqgVix7);
					$('.mail').val(response.data.ri4TH6PS2u);
					$('.fullname').html(response.data.lyyM7uk8Ri + ' ' + response.data.kn9PLj8ZOb);
				} else if (num == 4) {
					$('.id').val(response.data.a782UbnEAF);
					$('.bodega').val(response.data.AvFjodhdD);
					$('.articulo').val(response.data.PLIQznPEHG);
					$('.cantidad').val(response.data.igSNxn4x4z);
					$('.fullname').html(response.data.AvFjodhdD + ' ' + response.data.PLIQznPEHG);
				}
			}
		}
	});
}

function archivos(num) {

	if (num == 0) { 
		url	  = 'Clientes/index.php';
		urladd    = 'Clientes/add.php';
		urlmodify = 'Clientes/edit.php';
		urldelete = 'Clientes/delete.php';
		urlget 	  = 'Clientes/fetch_row.php';
		$('#info').html('Listado con información y deuda de los clientes.');
	} else if (num == 1) {
		url	  = 'Productos/index.php';
		urladd    = 'Productos/add.php';
		urlmodify = 'Productos/edit.php';
		urldelete = 'Productos/delete.php';
		urlget 	  = 'Productos/fetch_row.php';
		$('#info').html('Lista de articulos en venta. Opciones: agregar, editar y eliminar producto con su valor.');
	} else if (num == 3) {
		url  	  = 'Compras/index.php';
		urladd    = 'Compras/add.php';
		urlmodify = 'Compras/edit.php';
		urldelete = 'Compras/delete.php';
		urlget 	  = 'Compras/fetch_row.php';
		$('#info').html('Se agrega y edita compras con el run de clientes registrado y run de articulo registrado. Se lista el detalle de las compras que se han hecho, costo del articulo, cantidad comprada y valor total.');
	} else if (num == 2) {
		url	  = 'Individual/index.php';
		urladd    = 'Clientes/add.php';
		urlmodify = 'Clientes/edit.php';
		urldelete = 'Clientes/delete.php';
		urlget 	  = 'Clientes/fetch_row.php';
		$('#info').html('Información detallada de compras y deuda de un cliente particular.');
	} else if (num == 4) {
		url	  = 'Stock/index.php';
		urladd    = 'Stock/add.php';
		urlmodify = 'Stock/edit.php';
		urldelete = 'Stock/delete.php';
		urlget 	  = 'Stock/fetch_row.php';
		$('#info').html('Stock de bodega en las empresas que estan a cargo de el abastecimiento de productos.');
	} else if (num == 6) {
		url	  = 'Clientes/profile.php';
		urladd    = 'Clientes/add.php';
		urlmodify = 'Clientes/edit.php';
		urldelete = 'Clientes/delete.php';
		urlget 	  = 'Clientes/fetch_row.php';
		$('#info').html('Se despliega información detallada de compras y deuda de un cliente particular. Opciones: editar, eliminar, cambiar foto de cliente.');
	} else if (num == 5) {
		url	  = 'Correo/index.php';
		urladd    = 'Stock/add.php';
		urlmodify = 'Stock/edit.php';
		urldelete = 'Stock/delete.php';
		urlget 	  = 'Stock/fetch_row.php';
		$('#info').html('');
	}
}	

function Loader(){
	$.ajax({
    	success: function() {
	      $('#tbody').html('<div style="text-align: center; display:absolute"><img src="https://i.pinimg.com/originals/78/e8/26/78e826ca1b9351214dfdd5e47f7e2024.gif" alt="loading" /></div>');
		}
	})
}
function Grafico(){
	$.ajax({
		method: 'POST',
		url: 'Grafico/Grafico.php',
    		beforeSend: function() {
	        	$('#tbody').html('<div style="height: 80px; display: flex; justify-content: center; align-items: center;"></div>'
			+ ' <div style="text-align: center;"><img src="ajax-loader.gif" alt="loading" /><br/>Un momento, por favor..</div>');
		},
		success: function(response){
			$('#tbody').html(response);
		}
	})
		
}

//creamos una función para crear las cookies
function setCookie(cname, cvalue, exdays) {
var d = new Date();
d.setTime(d.getTime() + (exdays*24*60*60*1000));
var expires = "expires="+d.toGMTString();
document.cookie = cname + "=" + cvalue + "; " + expires;
}	
//creamos una para leerlas
function readCookie(name) {
var nameEQ = name + "=";
var ca = document.cookie.split(';');
for(var i=0;i < ca.length;i++) { var c = ca[i]; while (c.charAt(0)==' ') c = c.substring(1,c.length); 
if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length); } return null; }