<?php ?>

<!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<nav class="site-header sticky-top ">
	<div class="navbar navbar-expand-md navbar-dark bg-dark mb-4 justify-content-between">

		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url();?>index.php/main/index">Inicio <span class="sr-only"></span></a>
			</li>

			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url();?>index.php/password/index">Cambiar Contraseña<span class="sr-only"></span></a>
			</li>
			<?php if ($_SESSION[CATEGORY] == ADMIN){?>

				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url();?>index.php/main/category">Categorias <span class="sr-only"></span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url();?>index.php/main/user">Usuarios <span class="sr-only"></span></a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url();?>index.php/main/pending">Revisar Pendientes <span class="sr-only"></span></a>
				</li>
			<?php }?>

			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url();?>index.php/login/logout">Cerrar Sesion <span class="sr-only"></span></a>
			</li>
		</ul>

	</div>

</nav>
<div style="margin-left: 5%;margin-right: 5%">

