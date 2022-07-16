<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-20 pb-100">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-green" type="button" data-toggle="modal" data-target="#nuevo_ubigeo"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Ubigeo/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php
                            if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") {
                                    ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El ubigeo ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Ubigeo registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Ubigeo Modificado</strong>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA UBIGEO </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th>Id</th>
                                    <th>Dirección</th>
                                    <th>Manzana / Lote</th>
                                    <th>Número</th>
                                    <th>Piso</th>
                                    <th>Referencia</th>
                                    <th>Código Postal</th>
                                    <th>Distrito</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $ubi) { ?>
                                <tr id="negro">
                                        <td><?php echo $ubi['id_ubigeo']; ?></td>
                                        <td><?php echo $ubi['direc_ubigeo']; ?></td>
                                        <td><?php echo $ubi['mzlote_ubigeo']; ?></td>
                                        <td><?php echo $ubi['num_ubigeo']; ?></td>
                                        <td><?php echo $ubi['piso_ubigeo']; ?></td>
                                        <td><?php echo $ubi['referen_ubigeo']; ?></td>
                                        <td><?php echo $ubi['cpostal_ubigeo']; ?></td>
                                        <td><?php echo $ubi['nomb_distrito']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Ubigeo/editar?id=<?php echo $ubi['id_ubigeo']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Ubigeo/eliminar?id=<?php echo $ubi['id_ubigeo']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_ubigeo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nuevo Ubigeo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Ubigeo/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input id="direccion" class="form-control" type="text" name="direccion">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="lote">Manzana / Lote</label>
                                <input id="lote" class="form-control" type="text" name="lote">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="numero">Número</label>
                                <input id="numero" class="form-control" type="number" name="numero">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="piso">Piso</label>
                                <input id="piso" class="form-control" type="number" name="piso">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="referencia">Referencia</label>
                                <input id="referencia" class="form-control" type="text" name="referencia">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="codpostal">Código Postal</label>
                                <input id="codpostal" class="form-control" type="number" name="codpostal">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="iddistrito">Distrito</label>
                                <select id="iddistrito" class="form-control" name="iddistrito">
                                    <option value="0" disabled="disabled">Seleccionar Distrito</option>
                                    <option value="1">Huacho</option>
                                    <option value="2">Santa María</option>
                                    <option value="3">Hualmay</option>
                                    <option value="4">Chancay</option>
                                    <option value="5">Huaral</option>
                                    <option value="6">Supe</option>
                                    <option value="7">Paramonga</option>
                                    <option value="8">Pativilca</option>
                                    <option value="9">Barranca</option>
                                    <option value="10">San Vicente</option>
                                    <option value="11">Chilca</option>
                                    <option value="12">San Luis</option>
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