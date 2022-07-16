<?php
class Marca extends Controllers
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
        $data = $this->model->selectMarca();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectMarcaInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $logo = $_POST['logo'];
        $insert = $this->model->insertarMarca($nombre, $descripcion, $logo);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectMarca();
        header("location: " . base_url() . "Marca/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarMarca($id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $logo = $_POST['logo'];
        $actualizar = $this->model->actualizarMarca($nombre, $descripcion, $logo, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Marca/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarMarca($id);
        $data = $this->model->selectMarca();
        header('location: ' . base_url() . 'Marca/Listar');
        //$this->views->getView($this, "Listar", $data, $eliminar);
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarMarca($id);
        $data = $this->model->selectMarca();
        header('location: ' . base_url() . 'Marca/Listar');
        //$this->views->getView($this, "Listar", $data);
        die();
    }
}
?>