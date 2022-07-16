<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>Pedido/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha de Pedido</th>
                                    <th>Cliente</th>
                                </tr>
                            </thead>
                            <div class="text-center">
                                <h2> TABLA PEDIDOS INACTIVOS </h2>
                            </div>
                            <tbody id="negro">
                                <?php foreach ($data as $ped) { ?>
                                    <tr>
                                        <td><?php echo $ped['id_pedido']; ?></td>
                                        <td><?php echo $ped['fech_pedido']; ?></td>
                                        <td><?php echo $ped['nombre_cliente']; ?></td>
                                        <td>
                                            <form action="<?php echo base_url() ?>Pedido/reingresar?id=<?php echo $ubi['id_pedido']; ?>" method="post" class="d-inline confirmar">
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