<?php
class PrioridadModel extends Mysql{
    public $id, $nombre, $descripcion;
    public function __construct()
    {
        parent::__construct();
    }
    
    public function selecionar()
    {
        $sql = "SELECT ID_PRIORIDAD, PRIORIDAD_DESCRIPCION FROM Prioridad WHERE ESTADO = 1 ORDER BY PRIORIDAD_DESCRIPCION ASC";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function selectPrioridad()
    {
        $sql = "SELECT * FROM Prioridad WHERE ESTADO = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectPrioridadInactivos()
    {
        $sql = "SELECT * FROM Prioridad WHERE ESTADO = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarPrioridad(string $descripcion)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $sql = "SELECT * FROM Prioridad WHERE PRIORIDAD_DESCRIPCION = '{$this->descripcion}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO Prioridad(PRIORIDAD_DESCRIPCION) VALUES (?)";
            $data = array($this->descripcion);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarPrioridad(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Prioridad WHERE ID_PRIORIDAD = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarPrioridad(string $descripcion, int $id)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $this->id = $id;
        $query = "UPDATE Prioridad SET PRIORIDAD_DESCRIPCION=? WHERE ID_PRIORIDAD=?";
        $data = array($this->descripcion, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarPrioridad(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Prioridad SET ESTADO = 0 WHERE ID_PRIORIDAD=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarPrioridad(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Prioridad SET ESTADO = 1 WHERE ID_PRIORIDAD=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>