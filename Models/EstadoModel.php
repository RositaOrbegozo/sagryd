<?php
class EstadoModel extends Mysql{
    public $id, $nombre, $descripcion;
    public function __construct()
    {
        parent::__construct();
    }
    
    public function selecionar()
    {
        $sql = "SELECT ID_ESTADO, ESTADO_DESCRIPCION FROM Estado WHERE ESTADO = 1 ORDER BY ESTADO_DESCRIPCION ASC";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function selectEstado()
    {
        $sql = "SELECT * FROM Estado WHERE ESTADO = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectEstadoInactivos()
    {
        $sql = "SELECT * FROM Estado WHERE ESTADO = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarEstado(string $descripcion)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $sql = "SELECT * FROM Estado WHERE ESTADO_DESCRIPCION = '{$this->descripcion}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO Estado(ESTADO_DESCRIPCION) VALUES (?)";
            $data = array($this->descripcion);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarEstado(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Estado WHERE ID_ESTADO = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarEstado(string $descripcion, int $id)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $this->id = $id;
        $query = "UPDATE Estado SET ESTADO_DESCRIPCION=? WHERE ID_ESTADO=?";
        $data = array($this->descripcion, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarEstado(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Estado SET ESTADO = 0 WHERE ID_ESTADO=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarEstado(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Estado SET ESTADO = 1 WHERE ID_ESTADO=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>