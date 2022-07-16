<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor2">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Provincia/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Modificar Provincia</h6>
                        </div>
                        <div class="modal-body">
                             <div class="form-group">                               
                                <input type="hidden" name="id" value="<?php echo $data['id_prov']; ?>">                                
                            </div>         
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="provincia">Nombre de Provincia</label>
                                        <input id="provincia" class="form-control" type="text" name="provincia" value="<?php echo $data['nomb_prov']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                            <label for="iddep">Nombre Departamento</label>
                                            <select id="iddep" class="form-control" name="iddep">
                                                <?php echo 'http://localhost/pos_mvc/Provincia/Listar' ?>
                                                <option value="<?php echo $data['id_dep']; ?>" selected="selected"><?php echo $data['nomb_dep']; ?></option>
                                                <option value="1">Lima</option>
                                                <option value="2">Trujillo</option>
                                                <option value="3">Ancash</option>
                                                <option value="4">Tacna</option>                                                
                                                <option value="5">Piura</option>                                                
                                                <option value="5">Arequipa</option>                                                
                                            </select>
                                    </div>
                                </div>
                                                             
                            </div>
                        </div>
                            
                        <center>
                            
                        
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Provincia/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                            </center>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>