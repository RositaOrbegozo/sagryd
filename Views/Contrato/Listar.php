<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-green" type="button" data-toggle="modal" data-target="#nuevo_contrato"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Contrato/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El contrato ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Contrato registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Contrato Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA CONTRATO </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead >
                                <tr id="blanco">
                                    <th width="5%" style="text-align: center">Id</th>
                                    <th width="40%" style="text-align: center">Descripción</th>
                                    <th width="10%" style="text-align: center">Fecha Inicio</th>
                                    <th width="10%" style="text-align: center">Fecha Final</th>
                                    <th width="10%" style="text-align: center">Archivo</th>
                                    <th width="10%" style="text-align: center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                    <tr id="negro">
                                        <td><?php echo $cl['ID_CONTRATO']; ?></td>
                                        <td><?php echo $cl['CONTRATO_DESCRIPCION']; ?></td>
                                        <td><?php echo $cl['FECHA_INICIO']; ?></td>
                                        <td><?php echo $cl['FECHA_FIN']; ?></td>
                                        <td><a href="<?php echo $cl['ID_CONTRATO']; ?>"><?php echo $cl['CONTRATO_ARCHIVO']; ?></a></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Contrato/editar?id=<?php echo $cl['ID_CONTRATO']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Contrato/eliminar?id=<?php echo $cl['ID_CONTRATO']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_contrato" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nuevo Contrato</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>Contrato/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group ">
                        <label for="descripcion">Descripción</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción del Contrato">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="finicio">Fecha Inicio</label>
                                <input id="finicio" class="form-control" type="date" name="finicio">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="ffin">Fecha Final</label>
                                <input id="ffin" class="form-control" type="date" name="ffin">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="file">Archivo</label>
                        <input id="file" class="form-control" type="file" name="file">
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