<?php
class SubcategoriaModel extends Mysql{
    public $id, $nombre, $descripcion, $idcat;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectSubcategoria()
    {
        $sql = "SELECT * FROM Subcategoria INNER JOIN categoria ON categoria.id_cat = subcategoria.id_cat WHERE subcategoria.estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectSubcategoriaInactivos()
    {
        $sql = "SELECT * FROM Subcategoria INNER JOIN categoria ON categoria.id_cat = subcategoria.id_cat WHERE subcategoria.estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarSubcategoria(string $nombre, string $descripcion, int $idcat)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->idcat = $idcat;
        $sql = "SELECT * FROM Subcategoria INNER JOIN categoria ON categoria.id_cat = subcategoria.id_cat WHERE nomb_subcat = '{$this->nombre}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO Subcategoria(nomb_subcat, descrip_subcat, id_cat) VALUES (?,?,?)";
            $data = array($this->nombre, $this->descripcion, $this->idcat);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarSubcategoria(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Subcategoria INNER JOIN categoria ON categoria.id_cat = subcategoria.id_cat WHERE id_subcat = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarSubcategoria(string $nombre, string $descripcion, int $idcat, int $id)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->idcat = $idcat;
        $this->id = $id;
        $query = "UPDATE Subcategoria SET nomb_subcat=?, descrip_subcat=?, id_cat=? WHERE id_subcat=?";
        $data = array($this->nombre, $this->descripcion, $this->idcat, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarSubcategoria(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Subcategoria SET estado = 0 WHERE id_subcat=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarSubcategoria(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Subcategoria SET estado = 1 WHERE id_subcat=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    
    public function selecionarCategoria()
    {
        $sql = "SELECT TOP 1 id_cat, nomb_cat FROM Categoria WHERE estado = 1 ORDER BY nomb_cat ASC";
        $res = $this->select_all($sql);
        return $res;
    }
}
?>