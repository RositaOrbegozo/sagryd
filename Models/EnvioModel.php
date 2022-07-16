<?php
class EnvioModel extends Mysql{
    public $id, $fpago, $fenvio, $fentrega, $idubigeo, $idpedido;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectEnvio()
    {
        $sql = "SELECT * FROM Envio INNER JOIN ubigeo ON ubigeo.id_ubigeo = envio.id_ubigeo INNER JOIN pedido ON pedido.id_pedido = envio.id_pedido WHERE envio.estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectEnvioInactivos()
    {
        $sql = "SELECT * FROM Envio INNER JOIN ubigeo ON ubigeo.id_ubigeo = envio.id_ubigeo INNER JOIN pedido ON pedido.id_pedido = envio.id_pedido WHERE envio.estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarEnvio(string $fpago, string $fenvio, string $fentrega, int $idubigeo, int $idpedido)
    {
        $return = "";
        $this->fpago = $fpago;
        $this->fenvio = $fenvio;
        $this->fentrega = $fentrega;
        $this->idubigeo = $idubigeo;
        $this->idpedido = $idpedido;
        $query = "INSERT INTO Envio(forma_pago, fech_envio, fech_entrega, id_ubigeo, id_pedido) VALUES (?,?,?,?,?)";
        $data = array($this->fpago, $this->fenvio, $this->fentrega, $this->idubigeo, $this->idpedido);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }
    public function editarEnvio(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Envio INNER JOIN ubigeo ON ubigeo.id_ubigeo = envio.id_ubigeo INNER JOIN pedido ON pedido.id_pedido = envio.id_pedido WHERE id_envio = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarEnvio(string $fpago, string $fenvio, string $fentrega, int $idubigeo, int $idpedido, int $id)
    {
        $return = "";
        $this->fpago = $fpago;
        $this->fenvio = $fenvio;
        $this->fentrega = $fentrega;
        $this->idubigeo = $idubigeo;
        $this->idpedido = $idpedido;
        $this->id = $id;
        $query = "UPDATE Envio SET forma_pago=?, fech_envio=?, fech_entrega=?, id_ubigeo=?, id_pedido=? WHERE id_envio=?";
        $data = array($this->fpago, $this->fenvio, $this->fentrega, $this->idubigeo, $this->idpedido, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarEnvio(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Envio SET estado = 0 WHERE id_envio=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarEnvio(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Envio SET estado = 1 WHERE id_envio=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }    
}
?>