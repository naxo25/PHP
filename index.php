
	<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='fonts/fuentes/Crud.css'>
<script src='js/jquery.min.js'></script>
<script src='bootstrap/js/bootstrap.js'></script>
</head>
<style>
body{overflow: ; }

.menu{
	position: fixed; width:17%; background: url(images/register.jpg); opacity: 1; height:100%; list-style:none; cursos: pointer;
}

.cont-menu{
	position: absolute; top: 0%; width:100%; background: rgb(0, 0, 0, .78); height:100%; list-style:none; cursos: pointer;
}

.flex-column{
	width: 80%; position: absolute; top: 18%; margin-left: 18%; margin-right: 0; text-align: left;
}

.menu li ul{
	display: none;
}

.menu li ul li{
	position:relative;
}

.menu li:hover > ul {
	display: block;
}

.nav-link {color: rgb(0,0,0)}

.nav-link:hover{
	color: rgb(0, 0, 0, .8);
  	text-shadow: 0px 0px 30px rgb(255, 255,255,.95);
	transition: .65s;
	cursor: pointer;
}

.nav-item {	
	padding: 2px;
}

.nav-item:hover{}

</style>

<body>


<div class='menu'>
<div class='cont-menu'>
  <ul class="nav flex-column">
	<li class="nav-item"> <a class="nav-link" onclick='tuto()' style='color:orange'> Información de uso </a> </li>
	<li class="nav-item"> <a class="nav-link" onclick='determinar(6)' style='color:white'> Cliente seleccionado </a> </li>
	<li class="nav-item"> <a class="nav-link" onclick='determinar(5)' style='color:white'> Mandar correo </a> </li>
	<li class="nav-item"> <a class="nav-link" onclick='determinar(0)' style='color:white'> Clientes </a> </li>
	<li class="nav-item"> <a class="nav-link" onclick='determinar(3)' style='color:white'> Compras </a> </li>
	<li class="nav-item"> <a class="nav-link" onclick='determinar(1)' style='color:white'> Productos </a> </li>
	<li class="nav-item"> <a class="nav-link " onclick='determinar(4)' style='color:white'> Bodegas </a> </li>
  </ul>
</div>
</div>


<div style='position: fixed; height: 15%; left:19%; width:80%; background: #white; '>

<div class='row'>

	<div class='col-md-2 col-sm-2'>
		<div style='margin-top:15%'>
			<button id='addnew' class='btn btn-primary'> + Agregar </button>
			<a href='..'> <button class='btn btn-secondary'> Volver </button> </a>
		</div>
	</div>

	<div class='col-md-8 col-sm-8' >
		<p id='info' style='color:black; margin-top: 4%; font-size:14px; text-align: justify;'></p>
	</div>

	<div class='col-md-2 col-sm-2'>
		<div style='position: absolute; text-align: center; margin-top: 10%'>
			<h5><p style=" color:blue">< / > Fase V.1 < / ><br> Licencia: Ignacio Labra  </br> NxWeb Ltda. </br> < / > </p></h5>
		</div>
	</div>

</div>

</div>

<section class='' style='width:83%; height: 86%; position: fixed; left:18%; top: 14%; background: rgb(200,200,200, .02); overflow-x:hidden; overflow-y:scroll;'>	<h6>

	<div class='row'>
		<div class='col-sm-12'>

			<div id='tbody'></div>

		</div>
	</div>

</section>


<!-- LLamamos a Modal -->
<?php  
	include('Clientes/modal.php');
	include('Compras/modal.php');
	include('Productos/modal.php');
	include('Stock/modal.php');
	include('Individual/modal.php');
	include('modal.php');
?>
<script src='js/crud.js'></script>
</body>
</html>