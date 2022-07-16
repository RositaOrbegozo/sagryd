<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Ubigeo/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center">Modificar Ubigeo</h6>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="hidden" name="id" value="<?php echo $data['id_ubigeo']; ?>">
                                <input id="direccion" class="form-control" type="text" name="direccion" value="<?php echo $data['direc_ubigeo']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="lote">Manzana / Lote</label>
                                        <input id="lote" class="form-control" type="text" name="lote" value="<?php echo $data['mzlote_ubigeo']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <input id="numero" class="form-control" type="number" name="numero" value="<?php echo $data['num_ubigeo']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="piso">Piso</label>
                                        <input id="piso" class="form-control" type="number" name="piso" value="<?php echo $data['piso_ubigeo']; ?>">
                                    </div>
                                </div>                                    
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="referencia">Referencia</label>
                                        <input id="referencia" class="form-control" name="referencia" value="<?php echo $data['referen_ubigeo']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="codpostal">Código Postal</label>
                                        <input id="codpostal" class="form-control" type="number" name="codpostal" value="<?php echo $data['cpostal_ubigeo']; ?>">
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="iddistrito">Distrito</label>
                                        <select id="iddistrito" class="form-control" name="iddistrito">
                                            <?php echo 'http://localhost/pos_mvc/Ubigeo/Listar' ?>
                                            <option value="<?php echo $data['id_distrito']; ?>" selected="selected"><?php echo $data['nomb_distrito']; ?></option>
                                            <option value="1">Huacho</option>
                                            <option value="2">Santa María</option>
                                            <option value="3">Hualmay</option>
                                            <option value="4">Chancay</option>
                                            <option value="5">Huaral</option>
                                            <option value="6">Supe</option>
                                            <option value="7">Paramonga</option>
                                            <option value="8">Pativilca</option>
                                            <option value="9">Barranca</option>
                                            <option value="10">San Vicente</option>
                                            <option value="11">Chilca</option>
                                            <option value="12">San Luis</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                            <div class="card-footer">
                                <button class="btn btn-dark" type="submit">Modificar</button>
                                <a href="<?php echo base_url(); ?>Ubigeo/Listar" class="btn btn-danger">Regresar</a>
                            </div> 
                        </center>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>