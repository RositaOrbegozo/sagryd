<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor2">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Departamento/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Modificar Departamento</h6>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">                               
                                <input type="hidden" name="id" value="<?php echo $data['id_dep']; ?>">                                
                            </div>         

                            <div class="form-group">
                                <label for="departamento">Nombre de Departamento</label>
                                <input id="departamento" class="form-control" type="text" name="departamento" value="<?php echo $data['nomb_dep']; ?>">
                            </div>
                        </div>

                        <center>


                            <div class="card-footer">
                                <button class="btn btn-dark" type="submit"><i class="fas fa-save"></i> Modificar</button>
                                <a href="<?php echo base_url(); ?>Departamento/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>