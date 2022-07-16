<?php
class Pedido extends Controllers
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
        $data = $this->model->selectPedido();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectPedidoInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
        $fecha = $_POST['fecha'];
        $idcliente = $_POST['idcliente'];
        $insert = $this->model->insertarPedido($fecha, $idcliente);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectPedido();
        header("location: " . base_url() . "Pedido/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarPedido($id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $id = $_POST['id'];
        $fecha = $_POST['fecha'];
        $idcliente = $_POST['idcliente'];
        $actualizar = $this->model->actualizarPedido($fecha, $idcliente, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Pedido/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarPedido($id);
        $data = $this->model->selectPedido();
        header('location: ' . base_url() . 'Pedido/Listar');
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarPedido($id);
        $data = $this->model->selectPedido();
        header('location: ' . base_url() . 'Pedido/Listar');
        die();
    }
}
?>