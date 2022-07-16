<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/Login.css">
    </head>

    <body id="body2">
        <div class="container">
            <div class="col-sm">
                <h1>SISTEMA ADMINISTRATIVO DE GESTIÓN DE RIESGO DE DESASTRES</h1>  
                <div class="row align-items-center">   
                    <div class="col-lg-8 m-auto">
                        <img src="<?php echo base_url(); ?>/Assets/img/img-login.png" width="auto">
                    </div>
                    <div class="col-lg-4 m-auto">                                                  
                        <div class="card mt-5">                       
                                <br>
                                <p class="inicioSesion">Iniciar Sesión</p>
                                <?php if (isset($_GET['msg'])) { ?>
                                    <div class="alert alert-danger text-center" role="alert">
                                        <strong>Usuario o contraseña Incorrecta</strong>
                                    </div>
                                <?php } ?>
                                <form action="<?php echo base_url(); ?>Usuarios/login" method="post" autocomplete="off">
                                    <div class="form-group text-center">
                                        <strong class="text-dark">Usuario</strong>  
                                        <center>                                       
                                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                                        </center>
                                    </div>
                                    <div class="form-group text-center">
                                        <strong class="text-dark">Contraseña</strong>
                                        <center>
                                        <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                                        </center>
                                    </div>
                                    <button class="btn-logeo btn-block" type="submit">Iniciar</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>