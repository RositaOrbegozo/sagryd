<?php

class PedidoModel extends Mysql {

    public $id, $fecha, $idcliente;

    public function __construct() {
        parent::__construct();
    }

    public function selectPedido() {
        $sql = "SELECT id_pedido, fech_pedido, CONCAT(nomb_cliente,' ',apell_cliente) as 'nombre_cliente', pedido.id_cliente FROM Pedido INNER JOIN clientes ON pedido.id_cliente = clientes.id_cliente WHERE pedido.estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }

    public function selectPedidoInactivos() {
        $sql = "SELECT id_pedido, fech_pedido, CONCAT(nomb_cliente,' ',apell_cliente) as 'nombre_cliente', pedido.id_cliente FROM Pedido INNER JOIN clientes ON pedido.id_cliente = clientes.id_cliente WHERE pedido.estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }

    public function insertarPedido(string $fecha, int $idcliente) {
        $return = "";
        $this->fecha = $fecha;
        $this->idcliente = $idcliente;
        $query = "INSERT INTO Pedido(fech_pedido, id_cliente) VALUES (?,?)";
        $data = array($this->fecha, $this->idcliente);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    public function editarPedido(int $id) {
        $this->id = $id;
        $sql = "SELECT * FROM Pedido INNER JOIN clientes ON pedido.id_cliente = clientes.id_cliente WHERE id_pedido = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    public function actualizarPedido(string $fecha, int $idcliente, int $id) {
        $return = "";
        $this->fecha = $fecha;
        $this->idcliente = $idcliente;
        $this->id = $id;
        $query = "UPDATE Pedido SET fech_pedido=?, id_cliente=? WHERE id_pedido=?";
        $data = array($this->fecha, $this->idcliente, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    public function eliminarPedido(int $id) {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Pedido SET estado = 0 WHERE id_pedido=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    public function reingresarPedido(int $id) {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Pedido SET estado = 1 WHERE id_pedido=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

}

?>