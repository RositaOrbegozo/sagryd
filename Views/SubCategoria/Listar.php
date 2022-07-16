<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-green" type="button" data-toggle="modal" data-target="#nuevo_subcategoria"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Subcategoria/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php
                            if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") {
                                    ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>La SubCategoria ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>SubCategoria registrada</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>SubCategoria Modificada</strong>
                                    </div>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA SUBCATEGORIA </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                <tr id="negro">
                                        <td><?php echo $cl['id_subcat']; ?></td>
                                        <td><?php echo $cl['nomb_subcat']; ?></td>
                                        <td><?php echo $cl['descrip_subcat']; ?></td>
                                        <td><?php echo $cl['nomb_cat']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Subcategoria/editar?id=<?php echo $cl['id_subcat']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Subcategoria/eliminar?id=<?php echo $cl['id_subcat']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_subcategoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nueva Subcategoría</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Subcategoria/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre de la subcategoria">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción de la subcategoria">
                    </div>
                    <div class="form-group">
                        <label for="idcat">Categoría</label>
                        <select id="idcat" class="form-control" name="idcat">
                            <option value="0">Seleccionar Categoria</option>
                            <option value="1">Electrónicos</option>
                            <option value="2">Moda para Mujer</option>
                            <option value="3">Moda para Hombre</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php pie() ?>