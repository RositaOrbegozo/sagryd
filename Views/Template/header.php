<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SAGRYD</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.default.css" id="theme-stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/custom.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/dataTables.bootstrap4.min.css">
        <!-- Favicon-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/Login.css">
        <link rel="shortcut icon" href="img/favicon.ico">
        <!-- Tweaks for older IEs-->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>

    <body>
        <header class="header">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid d-flex align-items-center justify-content-between">
                    <div class="navbar-header">
                        <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                        <!-- Navbar Header--><a href="<?php echo base_url(); ?>Admin/Listar" class="navbar-brand">
                            <div class="brand-text brand-big visible"><img src="<?php echo base_url(); ?>/Assets/img/logo-escuela-segura.png" width="150"></div>                            
                        </a>
                        <!-- Sidebar Toggle Btn-->
                        <button class="sidebar-toggle"><span> &#9776 </span> </button>
                    </div>
                    <div class="right-menu list-inline no-margin-bottom">
                        <h4 class="azulito">SISTEMA ADMINISTRATIVO DE GESTIÓN DE RIESGO DE DESASTRES </h4>
                    </div>
                    <!-- Log out               -->
                    <div class="list-inline-item logout">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#logout">Salir</button>
                    </div>
                </div>
                </div>
            </nav>
        </header>
        <div class="d-flex align-items-stretch">
            <!-- Sidebar Navigation-->
            <nav id="sidebar">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center p-1">
                    <div class="avatar" data-toggle="modal" data-target="#cambiarPass"><img src="<?php echo base_url(); ?>/Assets/img/user.png" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="title">
                        <h5 class="h5"><?php echo $_SESSION['nombre']; ?></h5>
                    </div>
                </div>
                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url(); ?>Actividad/Listar"> <i class="fas">&#xf073;</i> <strong class="text-navbar"> Programador Mensual </strong></a></li>
                    <li><a href="<?php echo base_url(); ?>Ejecutor/Listar"> <i class="fas">&#xf0ae;</i> <strong class="text-navbar"> Actividades Ejecutadas </strong></a></li>
                    <li><a href="<?php echo base_url(); ?>Contrato/Listar"> <i class="fas">&#xf15c;</i> <strong class="text-navbar"> Contratos </strong></a></li>
                    
                    <?php if ($_SESSION['rol'] == "Administrador") { ?>
                        <li><a href="<?php echo base_url(); ?>Usuarios/Listar"> <i class="fas fa-user"></i> <strong class="text-navbar"> Usuarios </strong></a></li>
                        <li><a href="<?php echo base_url(); ?>Documento/Listar"><i class="fas">&#xf0c5;</i> <strong class="text-navbar"> Documento </strong></a></li>
                        <li><a href="<?php echo base_url(); ?>Estado/Listar"><i class="fas">&#xf080;</i> <strong class="text-navbar"> Estado </strong></a></li>
                        <li><a href="<?php echo base_url(); ?>Prioridad/Listar"><i class="fas">&#xf0a1;</i> <strong class="text-navbar"> Prioridad </strong></a></li>
                        <li><a href="<?php echo base_url(); ?>Evidencia/Listar"><i class="fas">&#xf06e;</i> <strong class="text-navbar"> Evidencia </strong></a></li>
                                           
                        <?php } ?>


            </nav>
