<?php
class Envio extends Controllers
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
        $data = $this->model->selectEnvio();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectEnvioInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
        $fpago = $_POST['fpago'];
        $fenvio = $_POST['fenvio'];
        $fentrega = $_POST['fentrega'];
        $idubigeo = $_POST['idubigeo'];
        $idpedido = $_POST['idpedido'];
        $insert = $this->model->insertarEnvio($fpago, $fenvio, $fentrega, $idubigeo, $idpedido);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectEnvio();
        header("location: " . base_url() . "Envio/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarEnvio($id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $id = $_POST['id'];
        $fpago = $_POST['fpago'];
        $fenvio = $_POST['fenvio'];
        $fentrega = $_POST['fentrega'];
        $idubigeo = $_POST['idubigeo'];
        $idpedido = $_POST['idpedido'];
        $actualizar = $this->model->actualizarEnvio($fpago, $fenvio, $fentrega, $idubigeo, $idpedido, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Envio/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarEnvio($id);
        $data = $this->model->selectEnvio();
        header('location: ' . base_url() . 'Envio/Listar');
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarEnvio($id);
        $data = $this->model->selectEnvio();
        header('location: ' . base_url() . 'Envio/Listar');
        die();
    }
}
?>