<?php
class Subcategoria extends Controllers
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
        $data = $this->model->selectSubcategoria();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectSubcategoriaInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $idcat = $_POST['idcat'];
        $insert = $this->model->insertarSubcategoria($nombre, $descripcion, $idcat);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectSubcategoria();
        header("location: " . base_url() . "Subcategoria/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarSubcategoria($id);
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
        $idcat = $_POST['idcat'];
        $actualizar = $this->model->actualizarSubcategoria($nombre, $descripcion, $idcat, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Subcategoria/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarSubcategoria($id);
        $data = $this->model->selectSubcategoria();
        header('location: ' . base_url() . 'Subcategoria/Listar');
        //$this->views->getView($this, "Listar", $data, $eliminar);
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarSubcategoria($id);
        $data = $this->model->selectSubcategoria();
        header('location: ' . base_url() . 'Subcategoria/Listar');
        //$this->views->getView($this, "Listar", $data);
        die();
    }
}
?>