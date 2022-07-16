<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-green" type="button" data-toggle="modal" data-target="#nuevo_cliente"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Clientes/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El cliente ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Cliente registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Cliente Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA CLIENTE </h2>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered text-center" id="Table" >
                            <thead id="blanco">
                                <tr>
                                    <th width="10%" style="text-align: center">Código</th>
                                    <th width="10%" style="text-align: center">Nombre</th>
                                    <th width="10%" style="text-align: center">Apellido</th>
                                    <th width="10%" style="text-align: center">Número de DNI</th>
                                    <th width="10%" style="text-align: center">Celular</th>
                                    <th width="10%" style="text-align: center">Teléfono</th>
                                    
                                    <th width="15%" style="text-align: center">OPCIONES</th> 
                                </tr>
                            </thead >
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                <tr id="negro">
                                        <td><?php echo $cl['id_cliente']; ?></td>
                                        <td><?php echo $cl['nomb_cliente']; ?></td>
                                        <td><?php echo $cl['apell_cliente']; ?></td>
                                        <td><?php echo $cl['ndni_cliente']; ?></td>
                                        <td><?php echo $cl['cell_cliente']; ?></td>
                                        <td><?php echo $cl['tel_cliente']; ?></td>
                                        
                                        <td >
                                            <a href="<?php echo base_url() ?>Clientes/editar?id=<?php echo $cl['id_cliente']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Clientes/eliminar?id=<?php echo $cl['id_cliente']; ?>" method="post" class="d-inline elim">
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Cliente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Clientes/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ruc">Ruc/Dni</label>
                        <input id="ruc" class="form-control" type="text" name="ruc" placeholder="Ruc/Dni">
                    </div>                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombres">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellidos">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input id="celular" class="form-control" type="text" name="celular" placeholder="Celular">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono">
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
                </center>
            </form>
        </div>
    </div>
</div>
<?php pie() ?>