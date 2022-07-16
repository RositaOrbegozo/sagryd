<?php encabezado() ?>   
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor2">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Contrato/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center">Modificar Contrato</46>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">                               
                                <input type="hidden" name="id" value="<?php echo $data['ID_CONTRATO']; ?>">                                
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input id="descripcion" class="form-control" type="text" name="descripcion" value="<?php echo $data['CONTRATO_DESCRIPCION']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="finicio">Fecha Inicio</label>
                                        <input id="finicio" class="form-control" type="date" name="finicio" value="<?php echo $data['FECHA_INICIO']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                        <label for="ffin">Fecha Final</label>
                                        <input id="ffin" class="form-control" type="date" name="ffin" value="<?php echo $data['FECHA_FIN']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                            <div class="card-footer">
                                <button class="btn btn-dark" type="submit">Modificar</button>
                                <a href="<?php echo base_url(); ?>Contrato/Listar" class="btn btn-danger">Regresar</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>