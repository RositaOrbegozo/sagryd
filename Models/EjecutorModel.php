<?php
class EjecutorModel extends Mysql{
    public $id, $nombre, $descripcion;
    public function __construct()
    {
        parent::__construct();
    }
    
    public function selecionar()
    {
        $sql = "SELECT * FROM Ejecutor 
        INNER JOIN prioridad ON ejecutor.ID_PRIORIDAD = prioridad.ID_PRIORIDAD 
        INNER JOIN documento ON ejecutor.ID_DOCUMENTO = documento.ID_DOCUMENTO
        INNER JOIN evidencia ON ejecutor.ID_EVIDENCIA = evidencia.ID_EVIDENCIA 
        INNER JOIN estado e ON ejecutor.ID_ESTADO = e.ID_ESTADO
        WHERE ACTIVO = 1 ORDER BY FECHA_PROGRAMADA ASC";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function selectEjecutor()
    {
        $this->rol = $_SESSION['rol'];
        $this->idUsuario = $_SESSION['id'];
        if($this->rol=="Administrador") {
            $sql = "SELECT ID_ACTIVIDAD, DETALLE_ACTIVIDAD, ESTADO_DESCRIPCION, RESULTADO_ESPERADO, OBSERVACIONES FROM ejecutor 
            INNER JOIN prioridad ON ejecutor.ID_PRIORIDAD = prioridad.ID_PRIORIDAD 
            INNER JOIN documento ON ejecutor.ID_DOCUMENTO = documento.ID_DOCUMENTO
            INNER JOIN evidencia ON ejecutor.ID_EVIDENCIA = evidencia.ID_EVIDENCIA 
            INNER JOIN estado ON ejecutor.ID_ESTADO = estado.ID_ESTADO
            WHERE ACTIVO = 1 ORDER BY ID_ACTIVIDAD ASC";
            $res = $this->select_all($sql);
        } else {
            $sql1 = "SELECT ID_ACTIVIDAD, DETALLE_ACTIVIDAD, ESTADO_DESCRIPCION, RESULTADO_ESPERADO, OBSERVACIONES FROM ejecutor 
            INNER JOIN prioridad ON ejecutor.ID_PRIORIDAD = prioridad.ID_PRIORIDAD 
            INNER JOIN documento ON ejecutor.ID_DOCUMENTO = documento.ID_DOCUMENTO
            INNER JOIN evidencia ON ejecutor.ID_EVIDENCIA = evidencia.ID_EVIDENCIA 
            INNER JOIN estado ON ejecutor.ID_ESTADO = estado.ID_ESTADO
            WHERE ACTIVO = 1 AND ID_USUARIO='{$this->idUsuario}' ORDER BY ID_ACTIVIDAD ASC";
            $res = $this->select_all($sql1);
        }        
        return $res;
    }
    public function selectEjecutorInactivos()
    {
        $this->rol = $_SESSION['rol'];
        $this->idUsuario = $_SESSION['id'];
        if($this->rol=="Administrador") {
            $sql = "SELECT ID_ACTIVIDAD, DETALLE_ACTIVIDAD, ESTADO_DESCRIPCION, RESULTADO_ESPERADO, OBSERVACIONES FROM ejecutor 
            INNER JOIN prioridad ON ejecutor.ID_PRIORIDAD = prioridad.ID_PRIORIDAD 
            INNER JOIN documento ON ejecutor.ID_DOCUMENTO = documento.ID_DOCUMENTO
            INNER JOIN evidencia ON ejecutor.ID_EVIDENCIA = evidencia.ID_EVIDENCIA 
            INNER JOIN estado ON ejecutor.ID_ESTADO = estado.ID_ESTADO
            WHERE ACTIVO = 0 ORDER BY ID_ACTIVIDAD ASC";
            $res = $this->select_all($sql);
        } else {
            $sql1 = "SELECT ID_ACTIVIDAD, DETALLE_ACTIVIDAD, ESTADO_DESCRIPCION, RESULTADO_ESPERADO, OBSERVACIONES FROM ejecutor 
            INNER JOIN prioridad ON ejecutor.ID_PRIORIDAD = prioridad.ID_PRIORIDAD 
            INNER JOIN documento ON ejecutor.ID_DOCUMENTO = documento.ID_DOCUMENTO
            INNER JOIN evidencia ON ejecutor.ID_EVIDENCIA = evidencia.ID_EVIDENCIA 
            INNER JOIN estado ON ejecutor.ID_ESTADO = estado.ID_ESTADO
            WHERE ACTIVO = 0 AND ID_USUARIO='{$this->idUsuario}' ORDER BY ID_ACTIVIDAD ASC";
            $res = $this->select_all($sql1);
        }        
        return $res;
    }
    public function insertarEjecutor(string $descripcion, string $tipo, string $resultado, string $observaciones, int $prioridad, int $documento, int $evidencia, int $estado, int $usuario)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $this->tipo = $tipo;
        $this->resultado = $resultado;
        $this->observaciones = $observaciones;
        $this->prioridad = $prioridad;
        $this->documento = $documento;
        $this->evidencia = $evidencia;
        $this->estado = $estado;
        $this->usuario = $usuario;
        $query = "INSERT INTO ejecutor (DETALLE_ACTIVIDAD, TIPO_ACTIVIDAD, RESULTADO_ESPERADO, OBSERVACIONES, ID_PRIORIDAD, ID_DOCUMENTO, ID_EVIDENCIA, ID_ESTADO, ID_USUARIO) VALUES (?,?,?,?,?,?,?,?,?)";
        $data = array($this->descripcion, $this->tipo, $this->resultado, $this->observaciones, $this->prioridad, $this->documento, $this->evidencia, $this->estado, $this->usuario);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }
    public function editarEjecutor(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM ejecutor
        INNER JOIN prioridad ON ejecutor.ID_PRIORIDAD = prioridad.ID_PRIORIDAD 
        INNER JOIN documento ON ejecutor.ID_DOCUMENTO = documento.ID_DOCUMENTO
        INNER JOIN evidencia ON ejecutor.ID_EVIDENCIA = evidencia.ID_EVIDENCIA 
        INNER JOIN estado ON ejecutor.ID_ESTADO = estado.ID_ESTADO
         WHERE ID_ACTIVIDAD = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarEjecutor(string $resultado, string $observaciones, int $evidencia, int $estado, int $id)
    {
        $return = "";
        $this->resultado = $resultado;
        $this->observaciones = $observaciones;
        $this->evidencia = $evidencia;
        $this->estado = $estado;
        $this->id = $id;
        $query = "UPDATE ejecutor SET RESULTADO_ESPERADO=?, OBSERVACIONES=?, ID_EVIDENCIA=?, ID_ESTADO=? WHERE ID_ACTIVIDAD=?";
        $data = array($this->resultado, $this->observaciones, $this->evidencia, $this->estado, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarEjecutor(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE ejecutor SET ACTIVO = 0 WHERE ID_ACTIVIDAD=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarEjecutor(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE ejecutor SET ACTIVO = 1 WHERE ID_ACTIVIDAD=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>