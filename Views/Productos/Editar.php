<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="body" class="page-content bg-light pt-120">
    <section class="contenedor2">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Productos/actualizar" autocomplete="off">
                        <div class="card-header orange">
                            <h6 class="title text-white text-center">Modificar Producto</46>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                
                                <input type="hidden" name="id" value="<?php echo $data['id_prod']; ?>">
                                
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nomb_prod']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="descrip">Descripción</label>
                                        <input id="descrip" class="form-control" type="text" name="descrip" value="<?php echo $data['descrip_prod']; ?>"">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input id="imagen" class="form-control" type="text" name="imagen" value="<?php echo $data['img_prod']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input id="precio" class="form-control" type="text" name="precio" value="<?php echo $data['pven_prod']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input id="stock" class="form-control" type="text" name="stock" value="<?php echo $data['stoc_prod']; ?>">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="idmarc">Marca</label>
                                <select id="idmarc" class="form-control" name="idmarc">                                                
                                    <?php echo 'http://localhost/pos_mvc/Productos/Listar' ?>
                                    <option value="<?php echo $data['id_marc']; ?>" selected="selected"><?php echo $data['nomb_marc']; ?></option>
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
                                    <?php echo 'http://localhost/pos_mvc/Producto/Listar' ?>
                                    <option value="<?php echo $data['id_subcat']; ?>" selected="selected"><?php echo $data['nomb_subcat']; ?></option>
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
                            <button class="btn btn-dark" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>Productos/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>