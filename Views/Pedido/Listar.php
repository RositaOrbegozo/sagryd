<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-green" type="button" data-toggle="modal" data-target="#nuevo_pedido"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Pedido/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php
                            if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") {
                                    ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El pedido ubigeo ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Pedido registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Pedido Modificado</strong>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA PEDIDO </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha de Pedido</th>
                                    <th>Cliente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="negro">
                                <?php foreach ($data as $ped) { ?>
                                    <tr>
                                        <td><?php echo $ped['id_pedido']; ?></td>
                                        <td><?php echo $ped['fech_pedido']; ?></td>
                                        <td><?php echo $ped['nombre_cliente']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Pedido/editar?id=<?php echo $ped['id_pedido']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Pedido/eliminar?id=<?php echo $ped['id_pedido']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_pedido" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nuevo Pedido</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Pedido/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="fecha">Fecha del Pedido</label>
                                <input id="fecha" class="form-control" type="date" name="fecha">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="idcliente">Cliente</label>
                                <select id="idcliente" class="form-control" name="idcliente">
                                    <option value="0" disabled="disabled">Seleccionar Cliente</option>
                                    <option value="1">Juan Orbegozo</option>
                                    <option value="2">María Blas</option>
                                    <option value="3">Luisa Velasquez</option>
                                    <option value="4">Jairoly Alexander Tamayo Llashac</option>
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