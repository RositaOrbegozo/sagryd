<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>Productos/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA PRODUCTOS INACTIVOS </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th width="5%" style="text-align: center">Código</th>
                                    <th width="5%" style="text-align: center">Nombre</th>
                                    <th width="30%" style="text-align: center">Descripción</th>
                                    <th width="5%" style="text-align: center">Precio Venta</th>
                                    <th width="15%" style="text-align: center">Imagen</th>
                                    <th width="5%" style="text-align: center">Stock</th>
                                    <th width="5%" style="text-align: center">Marca</th>
                                    <th width="5%" style="text-align: center">Sub Categoría</th>
                                    <th  width="15%" style="text-align: center">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                    <tr id="negro">
                                        <td><?php echo $cl['id_prod']; ?></td>
                                        <td><?php echo $cl['nomb_prod']; ?></td>
                                        <td><?php echo $cl['descrip_prod']; ?></td>
                                        <td><?php echo $cl['pven_prod']; ?></td>
                                        <td><img width="75px" src="<?php echo $cl['img_prod'] ?>" alt=""/></td>
                                        <td><?php echo $cl['stoc_prod']; ?></td>
                                        <td><?php echo $cl['nomb_marc']; ?></td>
                                        <td><?php echo $cl['nomb_subcat']; ?></td>
                                        <td>
                                            <form action="<?php echo base_url() ?>Productos/reingresar?id=<?php echo $cl['id_prod']; ?>" method="post" class="d-inline confirmar">
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