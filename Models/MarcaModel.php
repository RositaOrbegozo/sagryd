<?php
class MarcaModel extends Mysql{
    public $id, $nombre, $descripcion, $logo;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectMarca()
    {
        $sql = "SELECT * FROM Marca WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectMarcaInactivos()
    {
        $sql = "SELECT * FROM Marca WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarMarca(string $nombre, string $descripcion, string $logo)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->logo = $logo;
        $sql = "SELECT * FROM Marca WHERE nomb_marc = '{$this->nombre}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO Marca(nomb_marc, descrip_marc, img_marca) VALUES (?,?,?)";
            $data = array($this->nombre, $this->descripcion, $this->logo);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarMarca(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Marca WHERE id_marc = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarMarca(string $nombre, string $descripcion, string $logo, int $id)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->logo = $logo;
        $this->id = $id;
        $query = "UPDATE Marca SET nomb_marc=?, descrip_marc=?, img_marca=? WHERE id_marc=?";
        $data = array($this->nombre, $this->descripcion, $this->logo, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarMarca(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Marca SET estado = 0 WHERE id_marc=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarMarca(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Marca SET estado = 1 WHERE id_marc=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>