<?php
class Ubigeo extends Controllers
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
        $data = $this->model->selectUbigeo();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectUbigeoInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
        $direccion = $_POST['direccion'];
        $lote = $_POST['lote'];
        $numero = $_POST['numero'];
        $piso = $_POST['piso'];
        $referencia = $_POST['referencia'];
        $codpostal = $_POST['codpostal'];
        $iddistrito = $_POST['iddistrito'];
        $insert = $this->model->insertarUbigeo($direccion, $lote, $numero, $piso, $referencia, $codpostal, $iddistrito);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectUbigeo();
        header("location: " . base_url() . "Ubigeo/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarUbigeo($id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $id = $_POST['id'];
        $direccion = $_POST['direccion'];
        $lote = $_POST['lote'];
        $numero = $_POST['numero'];
        $piso = $_POST['piso'];
        $referencia = $_POST['referencia'];
        $codpostal = $_POST['codpostal'];
        $iddistrito = $_POST['iddistrito'];
        $actualizar = $this->model->actualizarUbigeo($direccion, $lote, $numero, $piso, $referencia, $codpostal, $iddistrito, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Ubigeo/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarUbigeo($id);
        $data = $this->model->selectUbigeo();
        header('location: ' . base_url() . 'Ubigeo/Listar');
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarUbigeo($id);
        $data = $this->model->selectUbigeo();
        header('location: ' . base_url() . 'Ubigeo/Listar');
        die();
    }
}
?>