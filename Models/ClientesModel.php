<?php
class ClientesModel extends Mysql{
    public $id, $ruc, $nombre, $apellido, $celular, $telefono;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectClientes()
    {
        $sql = "SELECT * FROM clientes WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectClientesInactivos()
    {
        $sql = "SELECT * FROM clientes WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarCliente(string $ruc)
    {
        $this->ruc = $ruc;
        $sql = "SELECT * FROM clientes WHERE ndni_cliente = $this->ruc AND estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarClientes(string $nombre,string $apellido, String $ruc, string $celular, string $telefono)
    {
        $return = "";
        $this->ruc = $ruc;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->celular = $celular;
        $this->telefono = $telefono;
        
        $sql = "SELECT * FROM clientes WHERE ndni_cliente = '{$this->ruc}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO clientes(nomb_cliente, apell_cliente, ndni_cliente, cell_cliente, tel_cliente) VALUES (?,?,?,?,?)";
            $data = array($this->nombre, $this->apellido, $this->ruc, $this->celular, $this->telefono);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarClientes(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM clientes WHERE id_cliente = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarClientes(string $nombre, string $apellido, String $ruc,string $celular, string $telefono, int $id)
    {
        $return = "";
        $this->ruc = $ruc;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->celular = $celular;
        $this->telefono = $telefono;
        $this->id = $id;
        $query = "UPDATE clientes SET nomb_cliente=?, apell_cliente=?, ndni_cliente=?, cell_cliente=?, tel_cliente=? WHERE id_cliente=?";
        $data = array($this->nombre, $this->apellido, $this->ruc, $this->celular, $this->telefono, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarClientes(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE clientes SET estado = 0 WHERE id_cliente=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarClientes(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE clientes SET estado = 1 WHERE id_cliente=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>