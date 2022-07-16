<?php
class Productos extends Controllers
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
        $data = $this->model->selectProductos();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectProductosInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {        
        $nombre = $_POST['nombre'];
        $descrip = $_POST['descrip'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        $stock = $_POST['stock'];
        $idmarc = $_POST['idmarc'];
        $idsubcat = $_POST['idsubcat'];
       
        $insert = $this->model->insertarProductos($nombre,$descrip,$precio,$imagen,$stock,$idmarc,$idsubcat);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectProductos();
        header("location: " . base_url() . "Productos/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarProductos($id);
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
        $descrip = $_POST['descrip'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        $stock = $_POST['stock'];
        $idmarc = $_POST['idmarc'];
        $idsubcat = $_POST['idsubcat'];
        $actualizar = $this->model->actualizarProductos($nombre,$descrip,$precio,$imagen,$stock,$idmarc,$idsubcat, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Productos/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarProductos($id);
        $data = $this->model->selectProductos();
        header('location: ' . base_url() . 'Productos/Listar');
        //$this->views->getView($this, "Listar", $data, $eliminar);
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarProductos($id);
        $data = $this->model->selectProductos();
        header('location: ' . base_url() . 'Productos/Listar');
        //$this->views->getView($this, "Listar", $data);
        die();
    }
}
?>