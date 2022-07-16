<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor2">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Distrito/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Modificar Distrito</h6>
                        </div>
                        <div class="modal-body">
                             <div class="form-group">                               
                                <input type="hidden" name="id" value="<?php echo $data['id_distrito']; ?>">                                
                            </div>         
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="distrito">Nombre de Distrito</label>
                                        <input id="distrito" class="form-control" type="text" name="distrito" value="<?php echo $data['nomb_distrito']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                            <label for="idprov">Nombre Provincia</label>
                                            <select id="idprov" class="form-control" name="idprov">
                                                <?php echo 'http://localhost/pos_mvc/Distrito/Listar' ?>
                                                <option value="<?php echo $data['id_prov']; ?>" selected="selected"><?php echo $data['nomb_prov']; ?></option>
                                                <option value="1">Huaura</option>
                                                <option value="2">Huaral</option>
                                                <option value="3">Barranca</option>
                                                <option value="4">Cañete</option>
                                                <option value="5">Paramonga</option>
                                                <option value="6">Lima</option>
                                                                                                
                                            </select>
                                    </div>
                                </div>
                                                             
                            </div>
                        </div>
                            
                        <center>
                            
                        
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Distrito/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                            </center>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>