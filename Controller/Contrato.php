<?php
class Contrato extends Controllers
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
        $data = $this->model->selectContrato();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectContratoInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
        $descripcion = $_POST['descripcion'];        
        $finicio = $_POST['finicio'];
        $ffin = $_POST['ffin'];
        $archivo_nombre = $_FILES['file']['name'];
        $archivo_tipo = $_FILES['file']['type'];
        $archivo_size = $_FILES['file']['size'];
        $tmp_nombre = $_FILES['file']['tmp_name'];
        $usuario = $_SESSION['id'];
        $insert = $this->model->insertarContrato($descripcion, $finicio, $ffin, $archivo_nombre, $archivo_tipo, $archivo_size, $tmp_nombre, $usuario);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectContrato();
        header("location: " . base_url() . "Contrato/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarContrato($id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $id = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $finicio = $_POST['finicio'];
        $ffin = $_POST['ffin'];
        $actualizar = $this->model->actualizarContrato($descripcion, $finicio, $ffin, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Contrato/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarContrato($id);
        $data = $this->model->selectContrato();
        header('location: ' . base_url() . 'Contrato/Listar');
        //$this->views->getView($this, "Listar", $data, $eliminar);
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarContrato($id);
        $data = $this->model->selectContrato();
        header('location: ' . base_url() . 'Contrato/Listar');
        //$this->views->getView($this, "Listar", $data);
        die();
    }
}
?>