<?php
class ProvinciaModel extends Mysql{
    public $id, $nomb_prov, $iddep;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectProvincia()
    {
        $sql = "select * from provincia
                inner join departamento on departamento.id_dep = provincia.id_dep WHERE provincia.estado = 1
                order by id_prov";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectProvinciaInactivos()
    {
        $sql = "SELECT * FROM Provincia inner join departamento on departamento.id_dep = provincia.id_dep WHERE provincia.estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarProvincia(string $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM provincia WHERE id_prov = $this->id AND estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarProvincia(string $provincia, string $iddep)
    {
        $return = "";
        $this->nomb_prov = $provincia;      
        $this->iddep = $iddep;    
        $sql = "SELECT * FROM Provincia inner join departamento on departamento.id_dep = provincia.id_dep WHERE nomb_prov = '{$this->nomb_prov}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO provincia(nomb_prov, id_dep) VALUES (?,?)";
            $data = array($this->nomb_prov, $this->iddep);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarProvincia(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Provincia inner join departamento on departamento.id_dep = provincia.id_dep WHERE id_prov = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarProvincia(string $provincia, string $iddep, int $id)
    {
        $return = "";
        $this->nomb_prov = $provincia;
        $this->iddep = $iddep;         
        $this->id = $id;
        $query = "UPDATE provincia SET nomb_prov=?, id_dep=? WHERE id_prov=?";
        $data = array($this->nomb_prov, $this->iddep, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarProvincia(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE provincia SET estado = 0 WHERE id_prov=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarProvincia(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE provincia SET estado = 1 WHERE id_prov=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>