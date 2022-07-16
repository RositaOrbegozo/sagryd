<?php
class Ejecutor extends Controllers
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
        $data = $this->model->selectEjecutor();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectEjecutorInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
        $descripcion = $_POST['descripcion'];        
        $tipo = 'Complementaria';
        $resultado = $_POST['resultado'];
        $observaciones = $_POST['observaciones'];
        $prioridad = $_POST['prioridad'];
        $documento = $_POST['documento'];
        $evidencia = $_POST['evidencia'];
        $estado = $_POST['estado'];
        $usuario = $_SESSION['id'];
        $insert = $this->model->insertarEjecutor($descripcion, $tipo, $resultado, $observaciones, $prioridad, $documento, $evidencia, $estado, $usuario);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectEjecutor();
        header("location: " . base_url() . "Ejecutor/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarEjecutor($id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $id = $_POST['id'];
        $resultado = $_POST['resultado'];
        $observaciones = $_POST['observaciones'];
        $evidencia = $_POST['evidencia'];
        $estado = $_POST['estado'];
        $actualizar = $this->model->actualizarEjecutor($resultado, $observaciones, $evidencia, $estado, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Ejecutor/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarEjecutor($id);
        $data = $this->model->selectEjecutor();
        header('location: ' . base_url() . 'Ejecutor/Listar');
        //$this->views->getView($this, "Listar", $data, $eliminar);
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarEjecutor($id);
        $data = $this->model->selectEjecutor();
        header('location: ' . base_url() . 'Ejecutor/Listar');
        //$this->views->getView($this, "Listar", $data);
        die();
    }
}
?>