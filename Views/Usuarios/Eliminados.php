<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a href="<?php echo base_url(); ?>/Usuarios/Listar" class="btn btn-primary">Regresar</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA USUARIOS INACTIVOS </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>usuario</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="negro">
                                <?php foreach ($data as $us) { ?>
                                    <tr>
                                        <td><?php echo $us['id']; ?></td>
                                        <td><?php echo $us['nombre']; ?></td>
                                        <td><?php echo $us['usuario']; ?></td>
                                        <td><?php echo $us['correo']; ?></td>
                                        <td><?php echo $us['rol']; ?></td>
                                        <td>
                                            <form action="<?php echo base_url() ?>Usuarios/reingresar?id=<?php echo $us['id']; ?>" method="post" class="d-inline confirmar">
                                                <button type="submit" class="btn btn-primary">Reingresar</button>
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