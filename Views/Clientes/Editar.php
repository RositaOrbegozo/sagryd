<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor2">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Clientes/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Modificar Cliente</46>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="ruc">Ruc/Dni</label>
                                <input type="hidden" name="id" value="<?php echo $data['id_cliente']; ?>">
                                <input id="ruc" class="form-control" type="number" name="ruc" value="<?php echo $data['ndni_cliente']; ?>">
                            </div>                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nomb_cliente']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="apellido">Apellido</label>
                                        <input id="apellido" class="form-control" type="text" name="apellido" value="<?php echo $data['apell_cliente']; ?>">
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="celular">Celular</label>
                                        <input id="celular" class="form-control" type="text" name="celular" value="<?php echo $data['cell_cliente']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input id="telefono" class="form-control" type="text" name="telefono" value="<?php echo $data['tel_cliente']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                            
                        
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Clientes/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                            </center>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>