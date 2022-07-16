<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-20 pb-100">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-green" type="button" data-toggle="modal" data-target="#nuevo_marca"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Marca/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>La marca ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Marca registrada</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Marca Modificada</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA MARCA </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th width="5%" style="text-align: center">Código</th>
                                    <th width="15%" style="text-align: center">Nombre</th>
                                    <th width="40%" style="text-align: center">Descripción</th>
                                    <th width="20%" style="text-align: center">Imagen</th>
                                    <th width="15%" style="text-align: center">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                <tr id="negro">
                                        <td><?php echo $cl['id_marc']; ?></td>
                                        <td><?php echo $cl['nomb_marc']; ?></td>
                                        <td><?php echo $cl['descrip_marc']; ?></td>
                                        <td><img width="95px" src="<?php echo $cl["img_marca"] ?>" alt=""/></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Marca/editar?id=<?php echo $cl['id_marc']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Marca/eliminar?id=<?php echo $cl['id_marc']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_marca" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nueva Marca</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Marca/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre de la marca">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción de la marca">
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input id="logo" class="form-control" type="text" name="logo" placeholder="../Assets/img/marca/srihome.jpg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php pie() ?>