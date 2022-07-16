<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Envio/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center">Modificar Envio</46>
                        </div>
                        <div class="modal-body">
                            <center>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="fpago">Forma de Pago</label>
                                            <input type="hidden" name="id" value="<?php echo $data['id_envio']; ?>">
                                            <select id="fpago" class="form-control" name="fpago">
                                                <?php echo 'http://localhost/pos_mvc/Envio/Listar' ?>
                                                <option value="<?php echo $data['forma_pago']; ?>" selected="selected"><?php echo $data['forma_pago']; ?></option>
                                                <option value="PayPal">PayPal</option>
                                                <option value="Efectivo">Efectivo</option>
                                                <option value="Tarjeta de Credito">Tarjeta de Crédito</option>
                                                <option value="Tarjeta de Debito">Tarjeta de Débito</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </center>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="fenvio">Fecha de Envio</label>
                                        <input id="fenvio" class="form-control" type="date" name="fenvio" value="<?php echo $data['fech_envio']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="fentrega">Fecha de Entrega</label>
                                        <input id="fentrega" class="form-control" type="date" name="fentrega" value="<?php echo $data['fech_entrega']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="idubigeo">Dirección</label>
                                        <select id="idubigeo" class="form-control" name="idubigeo">
                                            <?php echo 'http://localhost/pos_mvc/Ubigeo/Listar' ?>
                                            <option value="<?php echo $data['id_ubigeo']; ?>" selected="selected"><?php echo $data['direc_ubigeo']; ?></option>
                                            <option value="1">Av. Las FLores 725</option>
                                            <option value="2">Av. Los Girasoles 228</option>
                                            <option value="3">Psj. Los Robles 523</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-8">
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
                            </div>
                        </div>
                        <center>
                            <div class="card-footer">
                                <button class="btn btn-dark" type="submit">Modificar</button>
                                <a href="<?php echo base_url(); ?>Envio/Listar" class="btn btn-danger">Regresar</a>
                            </div> 
                        </center>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>