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
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-green" type="button" data-toggle="modal" data-target="#nueva_actividad_ejecutada"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Ejecutor/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El Actividad ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Actividad registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Actividad Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA ACTIVIDADES EJECUTADAS </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead >
                                <tr id="blanco">
                                    <th width="5%" style="text-align: center">Id</th>
                                    <th width="30%" style="text-align: center">Descripción</th>
                                    <th width="5%" style="text-align: center">Estado</th>
                                    <th width="25%" style="text-align: center">Resultado Esperado</th>
                                    <th width="25%" style="text-align: center">Observaciones</th>
                                    <th width="10%" style="text-align: center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                    <tr id="negro">
                                        <td><?php echo $cl['ID_ACTIVIDAD']; ?></td>
                                        <td><?php echo $cl['DETALLE_ACTIVIDAD']; ?></td>
                                        <td><?php echo $cl['ESTADO_DESCRIPCION']; ?></td>
                                        <td><?php echo $cl['RESULTADO_ESPERADO']; ?></td>
                                        <td><?php echo $cl['OBSERVACIONES']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Ejecutor/editar?id=<?php echo $cl['ID_ACTIVIDAD']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Ejecutor/eliminar?id=<?php echo $cl['ID_ACTIVIDAD']; ?>" method="post" class="d-inline elim">
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="nueva_actividad_ejecutada" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nueva Actividad</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Ejecutor/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group ">
                        <label for="descripcion">Descripción</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción del Actividad">
                    </div>
                    <div class="form-group ">
                        <label for="resultado">Resultado Esperado</label>
                        <input id="resultado" class="form-control" type="text-area" name="resultado" placeholder="Detalle el resultado esperado">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="prioridad">Prioridad</label>
                                <select id="prioridad" class="form-control" name="prioridad">
                                    <option value="0" disabled="disabled">Seleccionar</option>
                                    <?php while($row = $resul1->fetch_assoc()) { ?>                    
                                    <option value="<?php echo $row['ID_PRIORIDAD']; ?>"><?php echo $row['PRIORIDAD_DESCRIPCION']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="documento">Documento que Respalda</label>
                                <select id="documento" class="form-control" name="documento">
                                    <option value="0" disabled="disabled">Seleccionar</option>
                                    <?php while($row = $resul2->fetch_assoc()) { ?>                    
                                    <option value="<?php echo $row['ID_DOCUMENTO']; ?>"><?php echo $row['DOCUMENTO_DESCRIPCION']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="evidencia">Evidencia</label>
                                <select id="evidencia" class="form-control" name="evidencia">
                                    <option value="0" disabled="disabled">Seleccionar</option>
                                    <?php while($row = $resul3->fetch_assoc()) { ?>                    
                                    <option value="<?php echo $row['ID_EVIDENCIA']; ?>"><?php echo $row['EVIDENCIA_DESCRIPCION']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select id="estado" class="form-control" name="estado">
                                    <option value="0" disabled="disabled">Seleccionar</option>
                                    <?php while($row = $resul4->fetch_assoc()) { ?>                    
                                    <option value="<?php echo $row['ID_ESTADO']; ?>"><?php echo $row['ESTADO_DESCRIPCION']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="observaciones">Observaciones</label>
                        <input id="observaciones" class="form-control" type="text-area" name="observaciones" placeholder="Detalle las observaciones">
                    </div>
                </div>
                <center>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
                </center>
            </form>
        </div>
    </div>
</div>
<?php pie() ?>