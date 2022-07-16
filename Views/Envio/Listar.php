<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-green" type="button" data-toggle="modal" data-target="#nuevo_envio"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Envio/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php
                            if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") {
                                    ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El Envio ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Envio registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Envio Modificado</strong>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA ENVIO </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th>Id</th>
                                    <th>Forma de Pago</th>
                                    <th>Fecha de Envío</th>
                                    <th>Fecha de Entrega</th>
                                    <th>Dirección</th>
                                    <th>Fecha del Pedido</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="negro">
                                <?php foreach ($data as $fac) { ?>
                                    <tr>
                                        <td><?php echo $fac['id_envio']; ?></td>
                                        <td><?php echo $fac['forma_pago']; ?></td>
                                        <td><?php echo $fac['fech_envio']; ?></td>
                                        <td><?php echo $fac['fech_entrega']; ?></td>
                                        <td><?php echo $fac['direc_ubigeo']; ?></td>
                                        <td><?php echo $fac['fech_pedido']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Envio/editar?id=<?php echo $fac['id_envio']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Envio/eliminar?id=<?php echo $fac['id_envio']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_envio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nueva Envio</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Envio/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="fpago">Forma de Pago</label>
                                <select id="fpago" class="form-control" name="fpago">
                                    <option value="0" disabled="disabled" selected="selected">Seleccionar Forma de Pago</option>
                                    <option value="PayPal">PayPal</option>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Tarjeta de Credito">Tarjeta de Crédito</option>
                                    <option value="Tarjeta de Debito">Tarjeta de Débito</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fenvio">Fecha de Envío</label>
                                <input id="fenvio" class="form-control" type="date" name="fenvio">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fentrega">Fecha de Entrega</label>
                                <input id="fentrega" class="form-control" type="date" name="fentrega">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="idubigeo">Dirección</label>
                                <select id="idubigeo" class="form-control" name="idubigeo">
                                    <option value="0" disabled="disabled" selected="selected">Seleccionar Dirección</option>
                                    <option value="1">Av. Las FLores 725</option>
                                    <option value="2">Av. Los Girasoles 228</option>
                                    <option value="3">Psj. Los Robles 523</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="idpedido">Fecha del Pedido</label>
                                <select id="idpedido" class="form-control" name="idpedido">
                                    <option value="0" disabled="disabled" selected="selected">Seleccionar Fecha del Pedido</option>
                                    <option value="1">2020-02-15</option>
                                    <option value="2">2020-02-16</option>
                                    <option value="3">2020-01-17</option>
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