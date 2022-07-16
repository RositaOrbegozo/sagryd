<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor2">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Marca/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center">Modificar Marca</46>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="hidden" name="id" value="<?php echo $data['id_marc']; ?>">
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nomb_marc']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input id="descripcion" class="form-control" type="text" name="descripcion" value="<?php echo $data['descrip_marc']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input id="logo" class="form-control" type="text" name="logo" value="<?php echo $data['img_marca']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>Marca/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                            </center>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
<?php pie() ?>