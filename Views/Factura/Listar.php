<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-green" type="button" data-toggle="modal" data-target="#nuevo_factura"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Factura/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php
                            if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") {
                                    ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>La factura ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Factura registrada</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Factura Modificada</strong>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA FACTURA </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th>Id</th>
                                    <th>IGV</th>
                                    <th>Cantidad</th>
                                    <th>Fecha del Pedido</th>
                                    <th>Producto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="negro">
                                <?php foreach ($data as $fac) { ?>
                                    <tr>
                                        <td><?php echo $fac['id_factura']; ?></td>
                                        <td><?php echo $fac['igv']; ?></td>
                                        <td><?php echo $fac['cantidad']; ?></td>
                                        <td><?php echo $fac['fech_pedido']; ?></td>
                                        <td><?php echo $fac['nomb_prod']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Factura/editar?id=<?php echo $fac['id_factura']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Factura/eliminar?id=<?php echo $fac['id_factura']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_factura" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nueva Factura</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Factura/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="igv">IGV</label>
                                <input id="igv" class="form-control" type="number" name="igv" step="0.01">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input id="cantidad" class="form-control" type="number" name="cantidad">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="idpedido">Fecha del Pedido</label>
                                <select id="idpedido" class="form-control" name="idpedido">
                                    <option value="0" disabled="disabled" selected="selected">Seleccionar Fecha del Pedido</option>
                                    <option value="1">2020-02-15</option>
                                    <option value="2">2020-02-16</option>
                                    <option value="3">2020-01-17</option>
                                    <option value="3">2020-11-24</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="idproducto">Producto</label>
                                <select id="idproducto" class="form-control" name="idproducto">
                                    <option value="0" disabled="disabled" selected="selected">Seleccionar Producto</option>
                                    <option value="1">Apple AirPods con funda de carga</option>
                                    <option value="2">Audifonos bluetooth MuGo</option>
                                    <option value="3">Audifonos Sony Premium</option>
                                    <option value="4">Audifonos Runmus</option>
                                    <option value="5">Billetera WP ETR-18 9408021</option>
                                    <option value="6">Billetera NAPA ILLUSION</option>
                                    <option value="7">Billetera BURDOCK AUSTRAL</option>
                                    <option value="8">Cargador Portatil Marca Cafini D</option>
                                    <option value="9">Cartera GG Marmont con cremaller</option>
                                    <option value="10">Bolso de Hombro GG Marmont Peque</option>
                                    <option value="11">Cargador Portatil SamSung</option>
                                    <option value="12">Cargador Portatil Sony</option>
                                    <option value="13">Minibolso Gucci Zumi de piel sua</option>
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