<?php
    class Departamento extends Controllers{
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
            $data = $this->model->selectDepartamento();         
            $this->views->getView($this, "Listar", $data, "");
        }
    public function eliminados()
    {
        $data = $this->model->selectDepartamentoInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
        public function insertar()
        {            
            $departamento = $_POST['departamento'];
            $insert = $this->model->insertarDepartamento($departamento);
            if ($insert > 0) {
            $alert = 'registrado';
            }else if ($insert == 'existe') {
            $alert = 'existe';
            }else{
            $alert =  'error';
            }
            $this->model->selectDepartamento();
            header("location: " . base_url() . "Departamento/Listar?msg=$alert");
            die();
        }
        public function editar()
        {
            $id = $_GET['id'];
            $data = $this->model->editarDepartamento($id);
            if ($data == 0) {
                $this->Listar();
            }else{
                $this->views->getView($this, "Editar", $data);
            }
        }
    public function actualizar()
    {
        $id = $_POST['id'];
        $departamento = $_POST['departamento'];
        $actualizar = $this->model->actualizarDepartamento($departamento, $id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        }else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Departamento/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $this->model->eliminarDepartamento($id);
        header("location: " . base_url() . "Departamento/Listar");
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarDepartamento($id);
        $data = $this->model->selectDepartamento();
        header("location: " . base_url() . "Departamento/Listar");
        die();
    }
    public function buscar()
    {
        $id = $_POST['id'];
        $data = $this->model->BuscarDepartamento($id);
        echo json_encode($data);
    }
}
