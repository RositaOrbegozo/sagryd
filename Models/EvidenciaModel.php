<?php
class EvidenciaModel extends Mysql{
    public $id, $nombre, $descripcion;
    public function __construct()
    {
        parent::__construct();
    }
    
    public function selecionar()
    {
        $sql = "SELECT ID_EVIDENCIA, EVIDENCIA_DESCRIPCION FROM Evidencia WHERE ESTADO = 1 ORDER BY EVIDENCIA_DESCRIPCION ASC";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function selectEvidencia()
    {
        $sql = "SELECT * FROM Evidencia WHERE ESTADO = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectEvidenciaInactivos()
    {
        $sql = "SELECT * FROM Evidencia WHERE ESTADO = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarEvidencia(string $descripcion)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $sql = "SELECT * FROM Evidencia WHERE EVIDENCIA_DESCRIPCION = '{$this->descripcion}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO Evidencia(EVIDENCIA_DESCRIPCION) VALUES (?)";
            $data = array($this->descripcion);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarEvidencia(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Evidencia WHERE ID_EVIDENCIA = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarEvidencia(string $descripcion, int $id)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $this->id = $id;
        $query = "UPDATE Evidencia SET EVIDENCIA_DESCRIPCION=? WHERE ID_EVIDENCIA=?";
        $data = array($this->descripcion, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarEvidencia(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Evidencia SET ESTADO = 0 WHERE ID_EVIDENCIA=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarEvidencia(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Evidencia SET ESTADO = 1 WHERE ID_EVIDENCIA=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>