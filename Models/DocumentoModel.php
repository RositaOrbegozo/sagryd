<?php
class DocumentoModel extends Mysql{
    public $id, $nombre, $descripcion;
    public function __construct()
    {
        parent::__construct();
    }
    
    public function selecionar()
    {
        $sql = "SELECT ID_DOCUMENTO, DOCUMENTO_DESCRIPCION FROM Documento WHERE ESTADO = 1 ORDER BY DOCUMENTO_DESCRIPCION ASC";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function selectDocumento()
    {
        $sql = "SELECT * FROM Documento WHERE ESTADO = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectDocumentoInactivos()
    {
        $sql = "SELECT * FROM Documento WHERE ESTADO = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarDocumento(string $descripcion)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $sql = "SELECT * FROM Documento WHERE DOCUMENTO_DESCRIPCION = '{$this->descripcion}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO Documento(DOCUMENTO_DESCRIPCION) VALUES (?)";
            $data = array($this->descripcion);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarDocumento(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Documento WHERE ID_DOCUMENTO = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarDocumento(string $descripcion, int $id)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $this->id = $id;
        $query = "UPDATE Documento SET DOCUMENTO_DESCRIPCION=? WHERE ID_DOCUMENTO=?";
        $data = array($this->descripcion, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarDocumento(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Documento SET ESTADO = 0 WHERE ID_DOCUMENTO=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarDocumento(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Documento SET ESTADO = 1 WHERE ID_DOCUMENTO=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>