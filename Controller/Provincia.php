<?php
    class Provincia extends Controllers{
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
            $data = $this->model->selectProvincia();         
            $this->views->getView($this, "Listar", $data, "");
        }
    public function eliminados()
    {
        $data = $this->model->selectProvinciaInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
        public function insertar()
        {            
            $provincia = $_POST['provincia'];
            $iddep = $_POST['iddep'];
            $insert = $this->model->insertarProvincia($provincia,$iddep);
            if ($insert > 0) {
            $alert = 'registrado';
            }else if ($insert == 'existe') {
            $alert = 'existe';
            }else{
            $alert =  'error';
            }
            $this->model->selectProvincia();
            header("location: " . base_url() . "Provincia/Listar?msg=$alert");
            die();
        }
        public function editar()
        {
            $id = $_GET['id'];
            $data = $this->model->editarProvincia($id);
            if ($data == 0) {
                $this->Listar();
            }else{
                $this->views->getView($this, "Editar", $data);
            }
        }
    public function actualizar()
    {
        $id = $_POST['id'];
        $provincia = $_POST['provincia'];
        $iddep = $_POST['iddep'];
        $actualizar = $this->model->actualizarProvincia($provincia, $iddep, $id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        }else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Provincia/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $this->model->eliminarProvincia($id);
        header("location: " . base_url() . "Provincia/Listar");
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarProvincia($id);
        $data = $this->model->selectProvincia();
        header("location: " . base_url() . "Provincia/Listar");
        die();
    }
    public function buscar()
    {
        $id = $_POST['id'];
        $data = $this->model->BuscarProvincia($id);
        echo json_encode($data);
    }
}
