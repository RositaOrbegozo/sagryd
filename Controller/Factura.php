<?php
class Factura extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }    
    public function Listar()
    {
        $data = $this->model->selectFactura();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectFacturaInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
        $igv = $_POST['igv'];
        $cantidad = $_POST['cantidad'];
        $idpedido = $_POST['idpedido'];
        $idproducto = $_POST['idproducto'];
        $insert = $this->model->insertarFactura($igv, $cantidad, $idpedido, $idproducto);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectFactura();
        header("location: " . base_url() . "Factura/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarFactura($id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $id = $_POST['id'];
        $igv = $_POST['igv'];
        $cantidad = $_POST['cantidad'];
        $idpedido = $_POST['idpedido'];
        $idproducto = $_POST['idproducto'];
        $actualizar = $this->model->actualizarFactura($igv, $cantidad, $idpedido, $idproducto, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Factura/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarFactura($id);
        $data = $this->model->selectFactura();
        header('location: ' . base_url() . 'Factura/Listar');
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarFactura($id);
        $data = $this->model->selectFactura();
        header('location: ' . base_url() . 'Factura/Listar');
        die();
    }
}
?>