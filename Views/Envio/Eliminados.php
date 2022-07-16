<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>Envio/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA ENVIOS INACTIVOS </h2>
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
                                            <form action="<?php echo base_url() ?>Envio/reingresar?id=<?php echo $fac['id_envio']; ?>" method="post" class="d-inline confirmar">
                                                <button type="submit" class="btn btn-success"><i class="fas fa-ad"></i></button>
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
<?php pie() ?>