<?php
class ContratoModel extends Mysql{
    public $id, $nombre, $descripcion;
    public function __construct()
    {
        parent::__construct();
    }
    
    public function selecionar()
    {
        $sql = "SELECT * FROM Contrato         
        INNER JOIN usuarios ON Contrato.ID_USUARIO = usuarios.id
        WHERE ACTIVO = 1 ORDER BY ID_CONTRATO ASC";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function selectContrato()
    {
        $this->rol = $_SESSION['rol'];
        $this->idUsuario = $_SESSION['id'];
        if($this->rol=="Administrador") {
            $sql = "SELECT ID_CONTRATO, CONTRATO_DESCRIPCION, FECHA_INICIO, FECHA_FIN, CONTRATO_ARCHIVO FROM Contrato 
            INNER JOIN usuarios ON Contrato.ID_USUARIO = usuarios.id
            WHERE ACTIVO = 1 ORDER BY ID_CONTRATO ASC";
            $res = $this->select_all($sql);
        } else {
            $sql1 = "SELECT ID_CONTRATO, CONTRATO_DESCRIPCION, FECHA_INICIO, FECHA_FIN, CONTRATO_ARCHIVO FROM Contrato 
            INNER JOIN usuarios ON Contrato.ID_USUARIO = usuarios.id
            WHERE ACTIVO = 1 AND ID_USUARIO='{$this->idUsuario}' ORDER BY ID_CONTRATO ASC";
            $res = $this->select_all($sql1);
        }        
        return $res;
    }
    public function selectContratoInactivos()
    {
        $this->rol = $_SESSION['rol'];
        $this->idUsuario = $_SESSION['id'];
        if($this->rol=="Administrador") {
            $sql = "SELECT ID_CONTRATO, CONTRATO_DESCRIPCION, FECHA_INICIO, FECHA_FIN, CONTRATO_ARCHIVO FROM Contrato 
            INNER JOIN usuarios ON Contrato.ID_USUARIO = usuarios.id
            WHERE ACTIVO = 0 ORDER BY ID_CONTRATO ASC";
            $res = $this->select_all($sql);
        } else {
            $sql1 = "SELECT ID_CONTRATO, CONTRATO_DESCRIPCION, FECHA_INICIO, FECHA_FIN, CONTRATO_ARCHIVO FROM Contrato 
            INNER JOIN usuarios ON Contrato.ID_USUARIO = usuarios.id
            WHERE ACTIVO = 0 AND ID_USUARIO='{$this->idUsuario}' ORDER BY ID_CONTRATO ASC";
            $res = $this->select_all($sql1);
        }        
        return $res;
    }
    public function insertarContrato(string $descripcion, string $finicio, string $ffin, string $archivo_nombre, string $archivo_tipo, int $archivo_size, string $tmp_nombre, int $usuario)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $this->finicio = $finicio;
        $this->ffin = $ffin;
        $this->archivo_nombre = $archivo_nombre;
        $this->archivo_tipo = $archivo_tipo;
        $this->archivo_size = $archivo_size;
        $this->tmp_nombre = $tmp_nombre;
        $this->usuario = $usuario;
        $destino = 'files/'.$archivo_nombre;
        if($archivo_nombre != "" || $archivo_nombre != null) {
            if(copy($tmp_nombre, $destino)) {
                echo "Contrato Subido con exito";
            } else {
                echo "Error";
            }
        }
        $query = "INSERT INTO Contrato (CONTRATO_DESCRIPCION, CONTRATO_ARCHIVO, FECHA_INICIO, FECHA_FIN, ID_USUARIO) VALUES (?,?,?,?,?)";
        $data = array($this->descripcion, $destino, $this->finicio, $this->ffin, $this->usuario);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
        /*
        if($_FILES["archivo"]["error"]>0) {
            echo "Error al cargar archivo";
        } else {
            $permitidos = array("application/pdf");
            $limite_kb = 200;

            if(in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"] <= $limite_kb * 1024) {
                $ruta = 'Assets/files/'.$usuario_archivo.'/';
                $url = $ruta.$_FILES["archivo"]["name"];

                if(!file_exists($ruta)) {
                    mkdir($ruta);
                }

                if(!file_exists($url)) {
                    $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $url);

                    if($resultado) {
                        echo "Archivo guardado";
                    } else {
                        echo "Error al registrar archivo";
                    }

                } else {
                    echo "Archivo ya existe";
                }

            } else {
                echo "Archivo no permitido o excede al tamaño";
            }
        }
        $query = "INSERT INTO Contrato (CONTRATO_DESCRIPCION, FECHA_INICIO, FECHA_FIN, ID_USUARIO) VALUES (?,?,?,?)";
        $data = array($this->descripcion, $this->finicio, $this->ffin, $this->usuario);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
        */
    }
    public function editarContrato(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Contrato
        INNER JOIN usuarios ON Contrato.ID_CONTRATO = usuarios.id
         WHERE ID_CONTRATO = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarContrato(string $descripcion, string $finicio, string $ffin, int $id)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $this->finicio = $finicio;
        $this->ffin = $ffin;
        $this->id = $id;
        $destino = 'files/'.$archivo_nombre;       
        $query = "UPDATE Contrato SET CONTRATO_DESCRIPCION=?, FECHA_INICIO=?, FECHA_FIN=?  WHERE ID_CONTRATO=?";
        $data = array($this->descripcion, $this->finicio, $this->ffin, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarContrato(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Contrato SET ACTIVO = 0 WHERE ID_CONTRATO=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarContrato(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Contrato SET ACTIVO = 1 WHERE ID_CONTRATO=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>