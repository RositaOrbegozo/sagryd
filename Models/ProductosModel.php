<?php
class ProductosModel extends Mysql{
    public $id, $nombre, $descrip, $imagen, $precio, $stock, $idmarc, $idsubcat;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectProductos()
    {
        $sql = "select * from productos
                INNER join subcategoria on subcategoria.id_subcat = productos.id_subcat
                INNER join marca on marca.id_marc = productos.id_marc
                WHERE productos.estado = 1
                ORDER BY id_prod";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectProductosInactivos()
    {
        $sql = "SELECT * FROM Productos
                INNER join subcategoria on subcategoria.id_subcat = productos.id_subcat
                INNER join marca on marca.id_marc = productos.id_marc
                WHERE productos.estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarProductos(string $nombre, string $descrip, string $precio, string $imagen, string $stock, string $idmarc, string $idsubcat)
    {
        $return = "";        
        $this->nombre = $nombre;
        $this->descrip =$descrip;
        $this->precio = $precio;
        $this->imagen = $imagen;       
        $this->stock = $stock;
        $this->idmarc = $idmarc;
        $this->idsubcat = $idsubcat;
        $sql = "SELECT * FROM Productos 
                INNER join subcategoria on subcategoria.id_subcat = productos.id_subcat
                INNER join marca on marca.id_marc = productos.id_marc 
                WHERE nomb_prod = '{$this->nombre}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO Productos(nomb_prod, descrip_prod, pven_prod, img_prod, stoc_prod, id_marc, id_subcat ) VALUES (?,?,?,?,?,?,?)";
            $data = array($this->nombre, $this->descrip, $this->precio, $this->imagen, $this->stock, $this->idmarc, $this->idsubcat);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarProductos(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Productos 
                INNER join subcategoria on subcategoria.id_subcat = productos.id_subcat
                INNER join marca on marca.id_marc = productos.id_marc  WHERE id_prod = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarProductos(string $nombre, string $descrip, string $precio, string $imagen, string $stock, string $idmarc, string $idsubcat, int $id)
    {
        $return = "";        
        $this->nombre = $nombre;
        $this->descrip =$descrip;
        $this->precio = $precio;
        $this->imagen = $imagen;       
        $this->stock = $stock;
        $this->idmarc = $idmarc;
        $this->idsubcat = $idsubcat;
        $this->id = $id;
        $query = "UPDATE Productos SET nomb_prod=?, descrip_prod=?, pven_prod=?, img_prod=?, stoc_prod=?, id_marc=?, id_subcat=? WHERE id_prod=?";
        $data = array($this->nombre, $this->descrip, $this->precio, $this->imagen, $this->stock, $this->idmarc, $this->idsubcat, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarProductos(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Productos SET estado = 0 WHERE id_prod=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarProductos(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Productos SET estado = 1 WHERE id_prod=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>