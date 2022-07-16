<?php
class Prioridad extends Controllers
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
        $data = $this->model->selectPrioridad();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectPrioridadInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
        $descripcion = $_POST['descripcion'];
        $insert = $this->model->insertarPrioridad($descripcion);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectPrioridad();
        header("location: " . base_url() . "Prioridad/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarPrioridad($id);
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
        $actualizar = $this->model->actualizarPrioridad($descripcion, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Prioridad/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarPrioridad($id);
        $data = $this->model->selectPrioridad();
        header('location: ' . base_url() . 'Prioridad/Listar');
        //$this->views->getView($this, "Listar", $data, $eliminar);
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarPrioridad($id);
        $data = $this->model->selectPrioridad();
        header('location: ' . base_url() . 'Prioridad/Listar');
        //$this->views->getView($this, "Listar", $data);
        die();
    }
}
?>