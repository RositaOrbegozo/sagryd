<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>Clientes/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA CLIENTES INACTIVOS </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th width="10%" style="text-align: center">Código</th>
                                    <th width="10%" style="text-align: center">Nombre</th>
                                    <th width="10%" style="text-align: center">Apellido</th>
                                    <th width="10%" style="text-align: center">Número de DNI</th>
                                    <th width="10%" style="text-align: center">Celular</th>
                                    <th width="10%" style="text-align: center">Teléfono</th>
                                    
                                    <th width="15%" style="text-align: center">OPCIONES</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                <tr id="negro">
                                        <td><?php echo $cl['id_cliente']; ?></td>
                                        <td><?php echo $cl['nomb_cliente']; ?></td>
                                        <td><?php echo $cl['apell_cliente']; ?></td>
                                        <td><?php echo $cl['ndni_cliente']; ?></td>
                                        <td><?php echo $cl['cell_cliente']; ?></td>
                                        <td><?php echo $cl['tel_cliente']; ?></td>
                                        <td >
                                            <form action="<?php echo base_url() ?>Clientes/reingresar?id=<?php echo $cl['id_cliente']; ?>" method="post" class="d-inline confirmar">
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