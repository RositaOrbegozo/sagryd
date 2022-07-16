<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>Actividad/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA ACTIVIDADES INACTIVOS </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th>Id</th>
                                    <th>Descripción</th>
                                    <th>Fecha Programada</th>
                                    <th>Prioridad</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $pro) { ?>
                                <tr id="negro">
                                        <td><?php echo $pro['ID_ACTIVIDAD']; ?></td>
                                        <td><?php echo $pro['DETALLE_ACTIVIDAD']; ?></td>
                                        <td><?php echo $pro['FECHA_PROGRAMADA']; ?></td>
                                        <td><?php echo $pro['PRIORIDAD_DESCRIPCION']; ?></td>
                                        <td>
                                            <form action="<?php echo base_url() ?>Actividad/reingresar?id=<?php echo $pro['ID_ACTIVIDAD']; ?>" method="post" class="d-inline confirmar">
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