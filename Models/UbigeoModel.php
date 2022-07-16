<?php
class UbigeoModel extends Mysql{
    public $id, $direccion, $lote, $numero, $piso, $referencia, $codpostal, $iddistrito;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectUbigeo()
    {
        $sql = "SELECT * FROM Ubigeo INNER JOIN distrito ON distrito.id_distrito = ubigeo.id_distrito WHERE ubigeo.estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectUbigeoInactivos()
    {
        $sql = "SELECT * FROM Ubigeo INNER JOIN distrito ON distrito.id_distrito = ubigeo.id_distrito WHERE ubigeo.estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarUbigeo(string $direccion, string $lote, int $numero, int $piso, string $referencia, int $codpostal, int $iddistrito)
    {
        $return = "";
        $this->direccion = $direccion;
        $this->lote = $lote;
        $this->numero = $numero;
        $this->piso = $piso;
        $this->referencia = $referencia;
        $this->codpostal = $codpostal;
        $this->iddistrito = $iddistrito;
        $sql = "SELECT * FROM Ubigeo INNER JOIN distrito ON distrito.id_distrito = ubigeo.id_distrito WHERE (direc_ubigeo = '{$this->direccion}' && mzlote_ubigeo = '{$this->lote}' && num_ubigeo = '{$this->numero}' && piso_ubigeo = '{$this->piso}')";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO Ubigeo(direc_ubigeo, mzlote_ubigeo, num_ubigeo, piso_ubigeo, referen_ubigeo, cpostal_ubigeo, id_distrito) VALUES (?,?,?,?,?,?,?)";
            $data = array($this->direccion, $this->lote, $this->numero, $this->piso, $this->referencia, $this->codpostal, $this->iddistrito);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarUbigeo(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Ubigeo INNER JOIN distrito ON distrito.id_distrito = ubigeo.id_distrito WHERE id_ubigeo = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarUbigeo(string $direccion, string $lote, int $numero, int $piso, string $referencia, int $codpostal, int $iddistrito, int $id)
    {
        $return = "";
        $this->direccion = $direccion;
        $this->lote = $lote;
        $this->numero = $numero;
        $this->piso = $piso;
        $this->referencia = $referencia;
        $this->codpostal = $codpostal;
        $this->iddistrito = $iddistrito;
        $this->id = $id;
        $query = "UPDATE Ubigeo SET direc_ubigeo=?, mzlote_ubigeo=?, num_ubigeo=?, piso_ubigeo=?, referen_ubigeo=?, cpostal_ubigeo=?, id_distrito=? WHERE id_ubigeo=?";
        $data = array($this->direccion, $this->lote, $this->numero, $this->piso, $this->referencia, $this->codpostal, $this->iddistrito, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarUbigeo(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Ubigeo SET estado = 0 WHERE id_ubigeo=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarUbigeo(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Ubigeo SET estado = 1 WHERE id_ubigeo=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }    
}
?>