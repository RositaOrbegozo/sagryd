<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>Factura/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA FACTURAS INACTIVOS </h2>
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
                                    <th>Opciones</th>
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
                                            <form action="<?php echo base_url() ?>Factura/reingresar?id=<?php echo $fac['id_factura']; ?>" method="post" class="d-inline confirmar">
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