<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>Contrato/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA CONTRATOS INACTIVOS </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th width="5%" style="text-align: center">Id</th>
                                    <th width="40%" style="text-align: center">Descripción</th>
                                    <th width="10%" style="text-align: center">Fecha Inicio</th>
                                    <th width="10%" style="text-align: center">Fecha Final</th>
                                    <th width="10%" style="text-align: center">Archivo</th>
                                    <th width="10%" style="text-align: center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $pro) { ?>
                                <tr id="negro">
                                    <td><?php echo $pro['ID_CONTRATO']; ?></td>
                                    <td><?php echo $pro['CONTRATO_DESCRIPCION']; ?></td>
                                    <td><?php echo $pro['FECHA_INICIO']; ?></td>
                                    <td><?php echo $pro['FECHA_FIN']; ?></td>
                                    <td><a href="<?php echo $cl['ID_CONTRATO']; ?>"><?php echo $pro['CONTRATO_ARCHIVO']; ?></a></td>
                                    <td>
                                        <form action="<?php echo base_url() ?>Contrato/reingresar?id=<?php echo $pro['ID_CONTRATO']; ?>" method="post" class="d-inline confirmar">
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