<?php
class Evidencia extends Controllers
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
        $data = $this->model->selectEvidencia();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectEvidenciaInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
        $descripcion = $_POST['descripcion'];
        $insert = $this->model->insertarEvidencia($descripcion);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectEvidencia();
        header("location: " . base_url() . "Evidencia/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarEvidencia($id);
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
        $actualizar = $this->model->actualizarEvidencia($descripcion, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Evidencia/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarEvidencia($id);
        $data = $this->model->selectEvidencia();
        header('location: ' . base_url() . 'Evidencia/Listar');
        //$this->views->getView($this, "Listar", $data, $eliminar);
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarEvidencia($id);
        $data = $this->model->selectEvidencia();
        header('location: ' . base_url() . 'Evidencia/Listar');
        //$this->views->getView($this, "Listar", $data);
        die();
    }
}
?>