<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor2">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Subcategoria/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center">Modificar Subcategoria</46>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="hidden" name="id" value="<?php echo $data['id_subcat']; ?>">
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nomb_subcat']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input id="descripcion" class="form-control" type="text" name="descripcion" value="<?php echo $data['descrip_subcat']; ?>">
                            </div>                           

                            <div class="form-group">
                                <label for="idcat">Categoría</label>
                                <select id="idcat" class="form-control" name="idcat">
                                    <?php echo 'http://localhost/pos_mvc/SubCategoria/Listar' ?>
                                    <option value="<?php echo $data['id_cat']; ?>" selected="selected"><?php echo $data['nomb_cat']; ?></option>
                                    <option value="1">Electrónicos</option>
                                    <option value="2">Moda para Mujer</option>
                                    <option value="3">Moda para Hombre</option>
                                </select>
                            </div>                                
                        </div>
                        <center>
                            <div class="card-footer">
                                <button class="btn btn-dark" type="submit">Modificar</button>
                                <a href="<?php echo base_url(); ?>Subcategoria/Listar" class="btn btn-danger">Regresar</a>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>