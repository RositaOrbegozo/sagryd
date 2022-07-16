<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-20 pb-100">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-green" type="button" data-toggle="modal" data-target="#nuevo_distrito"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Distrito/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El Distrito ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Distrito registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Distrito Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA DISTRITO </h2>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered text-center" id="Table" >
                            <thead id="blanco">
                                <tr>
                                    <th width="10%" style="text-align: center">Código</th>
                                    <th width="30%" style="text-align: center">Nombre Distrito</th>                                   
                                    <th width="30%" style="text-align: center">Provincia</th>
                                    <th width="15%" style="text-align: center">OPCIONES</th> 
                                </tr>
                            </thead >
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                <tr id="negro">
                                        <td><?php echo $cl['id_distrito']; ?></td>
                                        <td><?php echo $cl['nomb_distrito']; ?></td>                                       
                                        <td><?php echo $cl['nomb_prov']; ?></td>
                                        <td >
                                            <a href="<?php echo base_url() ?>Distrito/editar?id=<?php echo $cl['id_distrito']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Distrito/eliminar?id=<?php echo $cl['id_distrito']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_distrito" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Distrito</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Distrito/insertar" autocomplete="off">
                <div class="modal-body">
                                       
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="distrito">Nombre del Distrito</label>
                                <input id="distrito" class="form-control" type="text" name="distrito" placeholder="distrito">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                    <label for="idprov">Nombre Provincia</label>
                                    <select id="dep" class="form-control" name="idprov">
                                        <option value="0">Seleccionar Provincia</option>
                                        <option value="1">Huaura</option>
                                        <option value="2">Huaral</option>
                                        <option value="3">Barranca</option>
                                        <option value="4">Cañete</option>
                                        <option value="5">Paramonga</option>
                                        <option value="6">Lima</option>
                                    </select>
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