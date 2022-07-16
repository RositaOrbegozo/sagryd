<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor2">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Pedido/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center">Modificar Pedido</46>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="fecha">Fecha del Pedido</label>
                                        <input type="hidden" name="id" value="<?php echo $data['id_pedido']; ?>">
                                        <input id="fecha" class="form-control" type="date" name="fecha" value="<?php echo $data['fech_pedido']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="idcliente">Cliente</label>
                                        <select id="idcliente" class="form-control" name="idcliente">                                            
                                            <?php echo 'http://localhost/pos_mvc/Cliente/Listar' ?>
                                            <option value="<?php echo $data['id_cliente']; ?>" selected="selected"><?php echo $data['nomb_cliente'].' '.$data['apell_cliente']; ?></option>
                                            <option value="1">Juan Orbegozo</option>
                                            <option value="2">María Blas</option>
                                            <option value="3">Luisa Velasquez</option>
                                            <option value="4">Jairoly Alexander Tamayo Llashac</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                            <div class="card-footer">
                                <button class="btn btn-dark" type="submit">Modificar</button>
                                <a href="<?php echo base_url(); ?>Pedido/Listar" class="btn btn-danger">Regresar</a>
                            </div> 
                        </center>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>