<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor2">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Factura/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center">Modificar Ubigeo</46>
                        </div>
                        <div class="modal-body">
                            <center>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="igv">IGV</label>
                                            <input type="hidden" name="id" value="<?php echo $data['id_factura']; ?>">
                                            <input id="igv" class="form-control" type="number" step="0.01" name="igv" value="<?php echo $data['igv']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cantidad">Cantidad</label>
                                            <input id="cantidad" class="form-control" type="number" name="cantidad" value="<?php echo $data['cantidad']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="idpedido">Fecha del Pedido</label>
                                        <select id="idpedido" class="form-control" name="idpedido">
                                            <?php echo 'http://localhost/pos_mvc/Pedido/Listar' ?>
                                            <option value="<?php echo $data['id_pedido']; ?>" selected="selected"><?php echo $data['fech_pedido']; ?></option>
                                            <option value="1">2020-02-15</option>
                                            <option value="2">2020-02-16</option>
                                            <option value="3">2020-01-17</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="idproducto">Producto</label>
                                        <select id="idproducto" class="form-control" name="idproducto">
                                            <?php echo 'http://localhost/pos_mvc/Producto/Listar' ?>
                                            <option value="<?php echo $data['id_prod']; ?>" selected="selected"><?php echo $data['nomb_prod']; ?></option>
                                            <option value="1">Apple AirPods con funda de carga</option>
                                            <option value="2">Audifonos bluetooth MuGo</option>
                                            <option value="3">Audifonos Sony Premium</option>
                                            <option value="4">Audifonos Runmus</option>
                                            <option value="5">Billetera WP ETR-18 9408021</option>
                                            <option value="6">Billetera NAPA ILLUSION</option>
                                            <option value="7">Billetera BURDOCK AUSTRAL</option>
                                            <option value="8">Cargador Portatil Marca Cafini D</option>
                                            <option value="9">Cartera GG Marmont con cremaller</option>
                                            <option value="10">Bolso de Hombro GG Marmont Peque</option>
                                            <option value="11">Cargador Portatil SamSung</option>
                                            <option value="12">Cargador Portatil Sony</option>
                                            <option value="13">Minibolso Gucci Zumi de piel sua</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                            <div class="card-footer">
                                <button class="btn btn-dark" type="submit">Modificar</button>
                                <a href="<?php echo base_url(); ?>Factura/Listar" class="btn btn-danger">Regresar</a>
                            </div> 
                        </center>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>