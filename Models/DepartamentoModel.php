<?php
class DepartamentoModel extends Mysql{
    public $id, $nomb_dep;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectDepartamento()
    {
        $sql = "SELECT * FROM departamento WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectDepartamentoInactivos()
    {
        $sql = "SELECT * FROM departamento WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarDepartamento(string $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM departamento WHERE id_dep = $this->id AND estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarDepartamento(string $departamento)
    {
        $return = "";
        $this->nomb_dep = $departamento;      
        
        $sql = "SELECT * FROM departamento WHERE nomb_dep = '{$this->nomb_dep}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO departamento(nomb_dep) VALUES (?)";
            $data = array($this->nomb_dep);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarDepartamento(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM departamento WHERE id_dep = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarDepartamento(string $departamento, int $id)
    {
        $return = "";
        $this->nomb_dep = $departamento;        
        $this->id = $id;
        $query = "UPDATE departamento SET nomb_dep=? WHERE id_dep=?";
        $data = array($this->nomb_dep, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarDepartamento(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE departamento SET estado = 0 WHERE id_dep=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarDepartamento(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE departamento SET estado = 1 WHERE id_dep=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>