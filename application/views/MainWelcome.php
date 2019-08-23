<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Test GroceryCrud</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-static/">
    <?php
    foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

</head>
<body >
<nav class="site-header sticky-top py-1">
    <div class="navbar navbar-expand-md navbar-dark bg-dark mb-4 justify-content-between">

        <ul style="margin-left: 40%" class="navbar-nav mr-auto">
            <?php if ($_SESSION[CATEGORY] == ADMIN){?>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>index.php/main/category">Categorias <span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>index.php/main/user">Usuarios <span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>index.php/main/index">Volver <span class="sr-only"></span></a>
            </li>
            <?php }?>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>backend/logout">Cerrar Sesion <span class="sr-only"></span></a>
            </li>
        </ul>

    </div>

</nav>
<div style="margin-left: 5%;margin-right: 5%">
    <div class="row">
