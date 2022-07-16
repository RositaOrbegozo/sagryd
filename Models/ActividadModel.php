<?php
class ActividadModel extends Mysql{
    public $id, $nombre, $descripcion;
    public function __construct()
    {
        parent::__construct();
    }
    
    public function selecionar()
    {
        $sql = "SELECT * FROM actividad 
        INNER JOIN prioridad ON actividad.ID_PRIORIDAD = prioridad.ID_PRIORIDAD 
        INNER JOIN documento ON actividad.ID_DOCUMENTO = documento.ID_DOCUMENTO
        INNER JOIN evidencia ON actividad.ID_EVIDENCIA = evidencia.ID_EVIDENCIA 
        INNER JOIN estado e ON actividad.ID_ESTADO = e.ID_ESTADO
        WHERE ACTIVO = 1 ORDER BY FECHA_PROGRAMADA ASC";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function selectActividad()
    {
        $this->rol = $_SESSION['rol'];
        $this->idUsuario = $_SESSION['id'];
        if($this->rol=="Administrador") {
            $sql = "SELECT ID_ACTIVIDAD, DETALLE_ACTIVIDAD, FECHA_PROGRAMADA, PRIORIDAD_DESCRIPCION FROM actividad 
            INNER JOIN prioridad ON actividad.ID_PRIORIDAD = prioridad.ID_PRIORIDAD 
            INNER JOIN documento ON actividad.ID_DOCUMENTO = documento.ID_DOCUMENTO
            INNER JOIN evidencia ON actividad.ID_EVIDENCIA = evidencia.ID_EVIDENCIA 
            INNER JOIN estado ON actividad.ID_ESTADO = estado.ID_ESTADO
            WHERE ACTIVO = 1 ORDER BY FECHA_PROGRAMADA ASC";
            $res = $this->select_all($sql);
        } else {
            $sql1 = "SELECT ID_ACTIVIDAD, DETALLE_ACTIVIDAD, FECHA_PROGRAMADA, PRIORIDAD_DESCRIPCION FROM actividad 
            INNER JOIN prioridad ON actividad.ID_PRIORIDAD = prioridad.ID_PRIORIDAD 
            INNER JOIN documento ON actividad.ID_DOCUMENTO = documento.ID_DOCUMENTO
            INNER JOIN evidencia ON actividad.ID_EVIDENCIA = evidencia.ID_EVIDENCIA 
            INNER JOIN estado ON actividad.ID_ESTADO = estado.ID_ESTADO
            WHERE ACTIVO = 1 AND ID_USUARIO='{$this->idUsuario}' ORDER BY FECHA_PROGRAMADA ASC";
            $res = $this->select_all($sql1);
        }        
        return $res;
    }
    public function selectActividadInactivos()
    {
        $this->rol = $_SESSION['rol'];
        $this->idUsuario = $_SESSION['id'];
        if($this->rol=="Administrador") {
            $sql = "SELECT ID_ACTIVIDAD, DETALLE_ACTIVIDAD, FECHA_PROGRAMADA, PRIORIDAD_DESCRIPCION FROM actividad 
            INNER JOIN prioridad ON actividad.ID_PRIORIDAD = prioridad.ID_PRIORIDAD 
            INNER JOIN documento ON actividad.ID_DOCUMENTO = documento.ID_DOCUMENTO
            INNER JOIN evidencia ON actividad.ID_EVIDENCIA = evidencia.ID_EVIDENCIA 
            INNER JOIN estado ON actividad.ID_ESTADO = estado.ID_ESTADO
            WHERE ACTIVO = 0 ORDER BY FECHA_PROGRAMADA ASC";
            $res = $this->select_all($sql);
        } else {
            $sql1 = "SELECT ID_ACTIVIDAD, DETALLE_ACTIVIDAD, FECHA_PROGRAMADA, PRIORIDAD_DESCRIPCION FROM actividad 
            INNER JOIN prioridad ON actividad.ID_PRIORIDAD = prioridad.ID_PRIORIDAD 
            INNER JOIN documento ON actividad.ID_DOCUMENTO = documento.ID_DOCUMENTO
            INNER JOIN evidencia ON actividad.ID_EVIDENCIA = evidencia.ID_EVIDENCIA 
            INNER JOIN estado ON actividad.ID_ESTADO = estado.ID_ESTADO
            WHERE ACTIVO = 0 AND ID_USUARIO='{$this->idUsuario}' ORDER BY FECHA_PROGRAMADA ASC";
            $res = $this->select_all($sql1);
        }        
        return $res;
    }
    public function insertarActividad(string $descripcion, string $fecha, string $tipo, int $prioridad, int $documento, int $evidencia, int $estado, int $usuario)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->tipo = $tipo;
        $this->prioridad = $prioridad;
        $this->documento = $documento;
        $this->evidencia = $evidencia;
        $this->estado = $estado;
        $this->usuario = $usuario;
        $query = "INSERT INTO Actividad (DETALLE_ACTIVIDAD, FECHA_PROGRAMADA, TIPO_ACTIVIDAD, ID_PRIORIDAD, ID_DOCUMENTO, ID_EVIDENCIA, ID_ESTADO, ID_USUARIO) VALUES (?,?,?,?,?,?,?,?)";
        $data = array($this->descripcion, $this->fecha, $this->tipo, $this->prioridad, $this->documento, $this->evidencia, $this->estado, $this->usuario);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }
    public function insertarActividadEjecutadaProgramada(string $descripcion, string $tipo, int $prioridad, int $documento, int $evidencia, int $estado, int $usuario)
    {
        $return1 = "";
        $this->descripcion = $descripcion;
        $this->tipo = $tipo;
        $this->prioridad = $prioridad;
        $this->documento = $documento;
        $this->evidencia = $evidencia;
        $this->estado = $estado;
        $this->usuario = $usuario;
        $query1 = "INSERT INTO ejecutor (DETALLE_ACTIVIDAD, TIPO_ACTIVIDAD, ID_PRIORIDAD, ID_DOCUMENTO, ID_EVIDENCIA, ID_ESTADO, ID_USUARIO) VALUES (?,?,?,?,?,?,?)";
        $data1 = array($this->descripcion, $this->tipo, $this->prioridad, $this->documento, $this->evidencia, $this->estado, $this->usuario);
        $resul1 = $this->insert($query1, $data1);
        $return1 = $resul1;
        return $return1;
    }
    public function editarActividad(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Actividad
        INNER JOIN prioridad ON actividad.ID_PRIORIDAD = prioridad.ID_PRIORIDAD 
        INNER JOIN documento ON actividad.ID_DOCUMENTO = documento.ID_DOCUMENTO
        INNER JOIN evidencia ON actividad.ID_EVIDENCIA = evidencia.ID_EVIDENCIA 
        INNER JOIN estado ON actividad.ID_ESTADO = estado.ID_ESTADO
         WHERE ID_ACTIVIDAD = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarActividad(string $descripcion, string $fecha, int $prioridad, int $documento, int $evidencia, int $estado, int $id)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->prioridad = $prioridad;
        $this->documento = $documento;
        $this->evidencia = $evidencia;
        $this->estado = $estado;
        $this->id = $id;
        $query = "UPDATE Actividad SET DETALLE_ACTIVIDAD=?, FECHA_PROGRAMADA=?, ID_PRIORIDAD=?, ID_DOCUMENTO=?, ID_EVIDENCIA=?, ID_ESTADO=? WHERE ID_ACTIVIDAD=?";
        $data = array($this->descripcion, $this->fecha, $this->prioridad, $this->documento, $this->evidencia, $this->estado, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarActividad(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Actividad SET ACTIVO = 0 WHERE ID_ACTIVIDAD=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarActividad(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Actividad SET ACTIVO = 1 WHERE ID_ACTIVIDAD=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>