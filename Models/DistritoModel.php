<?php
class DistritoModel extends Mysql{
    public $id, $nomb_distrito, $idprov;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectDistrito()
    {
        $sql = "select * from Distrito
                inner join provincia on provincia.id_prov = distrito.id_prov WHERE distrito.estado = 1
                order by id_distrito";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectDistritoInactivos()
    {
        $sql = "SELECT * FROM distrito inner join provincia on provincia.id_prov = distrito.id_prov WHERE distrito.estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarDistrito(string $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM distrito WHERE id_distrito = $this->id AND estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarDistrito(string $distrito, string $idprov)
    {
        $return = "";
        $this->nomb_distrito = $distrito;      
        $this->idprov = $idprov;    
        $sql = "SELECT * FROM Distrito inner join provincia on provincia.id_prov = distrito.id_prov WHERE nomb_distrito = '{$this->nomb_distrito}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO distrito(nomb_distrito, id_prov) VALUES (?,?)";
            $data = array($this->nomb_distrito, $this->idprov);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarDistrito(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Distrito inner join provincia on provincia.id_prov = distrito.id_prov WHERE id_distrito = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarDistrito(string $distrito, string $idprov, int $id)
    {
        $return = "";
        $this->nomb_distrito = $distrito;
        $this->idprov = $idprov;         
        $this->id = $id;
        $query = "UPDATE distrito SET nomb_distrito=?, id_prov=? WHERE id_distrito=?";
        $data = array($this->nomb_distrito, $this->idprov, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarDistrito(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE distrito SET estado = 0 WHERE id_distrito=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarDistrito(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE distrito SET estado = 1 WHERE id_distrito=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>