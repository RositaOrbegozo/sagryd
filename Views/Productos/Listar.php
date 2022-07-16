<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-20 pb-100">
    <section class="contenedor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-green" type="button" data-toggle="modal" data-target="#nuevo_producto"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Productos/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php
                            if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") {
                                    ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El producto ya existe</strong>
                                    </div>
    <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
    <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Producto registrado</strong>
                                    </div>
    <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Producto Modificado</strong>
                                    </div>
    <?php }
}
?>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2> TABLA PRODUCTO </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="Table">
                            <thead id="blanco">
                                <tr>
                                    <th width="5%" style="text-align: center">Código</th>
                                    <th width="5%" style="text-align: center">Nombre</th>
                                    <th width="30%" style="text-align: center">Descripción</th>
                                    <th width="5%" style="text-align: center">Precio Venta</th>
                                    <th width="15%" style="text-align: center">Imagen</th>
                                    <th width="5%" style="text-align: center">Stock</th>
                                    <th width="5%" style="text-align: center">Marca</th>
                                    <th width="5%" style="text-align: center">Sub Categoría</th>
                                    <th  width="15%" style="text-align: center">OPCIONES</th>   
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $cl) { ?>
                                    <tr id="negro">
                                        <td><?php echo $cl['id_prod']; ?></td>
                                        <td><?php echo $cl['nomb_prod']; ?></td>
                                        <td><?php echo $cl['descrip_prod']; ?></td>
                                        <td><?php echo $cl['pven_prod']; ?></td>
                                        <td><img width="75px" src="<?php echo $cl['img_prod'] ?>" alt=""/></td>
                                        <td><?php echo $cl['stoc_prod']; ?></td>
                                        <td><?php echo $cl['nomb_marc']; ?></td>
                                        <td><?php echo $cl['nomb_subcat']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Productos/editar?id=<?php echo $cl['id_prod']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Productos/eliminar?id=<?php echo $cl['id_prod']; ?>" method="post" class="d-inline elim">
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

<div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nuevo Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Productos/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del Producto">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="descrip">Descripción</label>
                                <input id="descrip" class="form-control" type="text" name="descrip" placeholder="Descripción">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input id="imagen" class="form-control" type="text" name="imagen" value="../Assets/img/productos/no-disponible.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input id="precio" class="form-control" type="number" name="precio" placeholder="Precio">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input id="stock" class="form-control" type="number" name="stock" placeholder="Stock">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="idmarc">Marca</label>
                                <select id="idmarc" class="form-control" name="idmarc">                                                
                                    <option value="0" disabled="disabled">Seleccione Marca</option>
                                    <option value="1">HP</option>
                                    <option value="2">SanDisk</option>
                                    <option value="3">Kingston</option>
                                    <option value="4">Renzo Costa</option>                                                
                                    <option value="5">Gucci</option>                                                
                                    <option value="6">Redragon</option>                                                
                                    <option value="7">Sony</option>                                                
                                    <option value="8">Samsung</option>                                                
                                    <option value="9">Epson</option>                                                
                                    <option value="10">Apple</option>                                                
                                    <option value="11">MuGo</option>                                                
                                    <option value="12">Runmus</option>                                                
                                    <option value="13">Cafini</option>                                                
                                    <option value="14">Apedra</option>                                                
                                    <option value="15">Startech</option>                                                
                                    <option value="16">Abker</option>                                                
                                    <option value="17">Antryx</option>                                                
                                    <option value="18">Spedal</option>                                                
                                    <option value="19">SriHome</option>                                                
                                    <option value="20">asdad</option>                                               
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="idsubcat">SubCategoría</label>
                                <select id="idsubcat" class="form-control" name="idsubcat">                                                
                                    <option value="0" disabled="disabled">Seleccione SubCategoría</option>
                                    <option value="1">Cámaras y fotografía</option>
                                    <option value="2">Audifonos</option>
                                    <option value="3">Carteras</option>
                                    <option value="4">Billeteras</option>                                                
                                    <option value="5">Calzado</option>                                                
                                    <option value="6">Billeteras2</option>                                                
                                    <option value="7">Accesorios para computadora</option>                                                
                                    <option value="8">prueba</option>                                               
                                                                                  
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php pie() ?>