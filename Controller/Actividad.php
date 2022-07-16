<?php
class Actividad extends Controllers
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
        $data = $this->model->selectActividad();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectActividadInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];
        $tipo = 'Programada';
        $prioridad = $_POST['prioridad'];
        $documento = $_POST['documento'];
        $evidencia = $_POST['evidencia'];
        $estado = $_POST['estado'];
        $usuario = $_SESSION['id'];
        $insert = $this->model->insertarActividad($descripcion, $fecha, $tipo, $prioridad, $documento, $evidencia, $estado, $usuario);
        $insert1 = $this->model->insertarActividadEjecutadaProgramada($descripcion, $tipo, $prioridad, $documento, $evidencia, $estado, $usuario);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectActividad();
        header("location: " . base_url() . "Actividad/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarActividad($id);
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
        $fecha = $_POST['fecha'];
        $prioridad = $_POST['prioridad'];
        $documento = $_POST['documento'];
        $evidencia = $_POST['evidencia'];
        $estado = $_POST['estado'];
        $actualizar = $this->model->actualizarActividad($descripcion, $fecha, $prioridad, $documento, $evidencia, $estado, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Actividad/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarActividad($id);
        $data = $this->model->selectActividad();
        header('location: ' . base_url() . 'Actividad/Listar');
        //$this->views->getView($this, "Listar", $data, $eliminar);
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarActividad($id);
        $data = $this->model->selectActividad();
        header('location: ' . base_url() . 'Actividad/Listar');
        //$this->views->getView($this, "Listar", $data);
        die();
    }
}
?>