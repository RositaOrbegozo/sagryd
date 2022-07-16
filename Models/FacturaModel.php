<?php
class FacturaModel extends Mysql{
    public $id, $igv, $cantidad, $idpedido, $idproducto;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectFactura()
    {
        $sql = "SELECT * FROM Factura INNER JOIN productos ON productos.id_prod = factura.id_prod INNER JOIN pedido ON pedido.id_pedido = factura.id_pedido WHERE factura.estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectFacturaInactivos()
    {
        $sql = "SELECT * FROM Factura INNER JOIN productos ON productos.id_prod = factura.id_prod INNER JOIN pedido ON pedido.id_pedido = factura.id_pedido WHERE factura.estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarFactura(string $igv, int $cantidad, int $idpedido, int $idproducto)
    {
        $return = "";
        $this->igv = $igv;
        $this->cantidad = $cantidad;
        $this->idpedido = $idpedido;
        $this->idproducto = $idproducto;
        $query = "INSERT INTO Factura(igv, cantidad, id_pedido, id_prod) VALUES (?,?,?,?)";
        $data = array($this->igv, $this->cantidad, $this->idpedido, $this->idproducto);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }
    public function editarFactura(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM Factura INNER JOIN productos ON productos.id_prod = factura.id_prod INNER JOIN pedido ON pedido.id_pedido = factura.id_pedido WHERE id_factura = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarFactura(string $igv, int $cantidad, int $idpedido, int $idproducto, int $id)
    {
        $return = "";
        $this->igv = $igv;
        $this->cantidad = $cantidad;
        $this->idpedido = $idpedido;
        $this->idproducto = $idproducto;
        $this->id = $id;
        $query = "UPDATE Factura SET igv=?, cantidad=?, id_pedido=?, id_prod=? WHERE id_factura=?";
        $data = array($this->igv, $this->cantidad, $this->idpedido, $this->idproducto, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarFactura(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Factura SET estado = 0 WHERE id_factura=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarFactura(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE Factura SET estado = 1 WHERE id_factura=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }    
}
?>