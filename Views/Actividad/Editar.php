<?php encabezado() ?>
<?php 
$mysqli = new mysqli("localhost","root","root","pextumuy");
if(mysqli_connect_errno()) {
    echo 'conexion fallida : ', mysqli_connect_error();
    exit();
    }
$prioridad = "SELECT ID_PRIORIDAD, PRIORIDAD_DESCRIPCION FROM prioridad WHERE ESTADO=1 ORDER BY ID_PRIORIDAD ASC";
$resul1 = $mysqli->query($prioridad);
$documento = "SELECT ID_DOCUMENTO, DOCUMENTO_DESCRIPCION FROM documento WHERE ESTADO=1 ORDER BY ID_DOCUMENTO ASC";
$resul2 = $mysqli->query($documento);
$evidencia = "SELECT ID_EVIDENCIA, EVIDENCIA_DESCRIPCION FROM evidencia ORDER BY ID_EVIDENCIA ASC";
$resul3 = $mysqli->query($evidencia);
$estado = "SELECT ID_ESTADO, ESTADO_DESCRIPCION FROM estado ORDER BY ID_ESTADO ASC";
$resul4 = $mysqli->query($estado);
?>     
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120"">
    <section class="contenedor2">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Actividad/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center">Modificar Actividad</46>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">                               
                                <input type="hidden" name="id" value="<?php echo $data['ID_ACTIVIDAD']; ?>">                                
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input id="descripcion" class="form-control" type="text" name="descripcion" value="<?php echo $data['DETALLE_ACTIVIDAD']; ?>">
                            </div>
                            <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fecha">Fecha Programada</label>
                                <input id="fecha" class="form-control" type="date" name="fecha" value="<?php echo $data['FECHA_PROGRAMADA']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="prioridad">Prioridad</label>
                                <select id="prioridad" class="form-control" name="prioridad">
                                    <option value="<?php echo $data['ID_PRIORIDAD']; ?>" selected="selected" ><?php echo $data['PRIORIDAD_DESCRIPCION']; ?></option>                      
                                    <?php while($row = $resul1->fetch_assoc()) { ?>                    
                                    <option value="<?php echo $row['ID_PRIORIDAD']; ?>"><?php echo $row['PRIORIDAD_DESCRIPCION']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="documento">Documento que Respalda</label>
                                <select id="documento" class="form-control" name="documento">
                                    <option value="<?php echo $data['ID_DOCUMENTO']; ?>" selected="selected"><?php echo $data['DOCUMENTO_DESCRIPCION']; ?></option>                      
                                    <?php while($row = $resul2->fetch_assoc()) { ?>                    
                                    <option value="<?php echo $row['ID_DOCUMENTO']; ?>"><?php echo $row['ID_DOCUMENTO']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="evidencia">Evidencia</label>
                                <select id="evidencia" class="form-control" name="evidencia">     
                                    <option value="<?php echo $data['ID_EVIDENCIA']; ?>" selected="selected"><?php echo $data['EVIDENCIA_DESCRIPCION']; ?></option>                      
                                    <?php while($row = $resul3->fetch_assoc()) { ?>                    
                                    <option value="<?php echo $row['ID_EVIDENCIA']; ?>"><?php echo $row['EVIDENCIA_DESCRIPCION']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select id="estado" class="form-control" name="estado">
                            <option value="<?php echo $data['ID_ESTADO']; ?>" selected="selected"><?php echo $data['ESTADO_DESCRIPCION']; ?></option>                      
                            <?php while($row = $resul4->fetch_assoc()) { ?>                    
                            <option value="<?php echo $row['ID_ESTADO']; ?>"><?php echo $row['ESTADO_DESCRIPCION']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                        </div>
                        <center>
                            <div class="card-footer">
                                <button class="btn btn-dark" type="submit">Modificar</button>
                                <a href="<?php echo base_url(); ?>Actividad/Listar" class="btn btn-danger">Regresar</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>