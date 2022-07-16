<?php
    class Distrito extends Controllers{
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
            $data = $this->model->selectDistrito();         
            $this->views->getView($this, "Listar", $data, "");
        }
    public function eliminados()
    {
        $data = $this->model->selectDistritoInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
        public function insertar()
        {            
            $distrito = $_POST['distrito'];
            $idprov = $_POST['idprov'];
            $insert = $this->model->insertarDistrito($distrito,$idprov);
            if ($insert > 0) {
            $alert = 'registrado';
            }else if ($insert == 'existe') {
            $alert = 'existe';
            }else{
            $alert =  'error';
            }
            $this->model->selectDistrito();
            header("location: " . base_url() . "Distrito/Listar?msg=$alert");
            die();
        }
        public function editar()
        {
            $id = $_GET['id'];
            $data = $this->model->editarDistrito($id);
            if ($data == 0) {
                $this->Listar();
            }else{
                $this->views->getView($this, "Editar", $data);
            }
        }
    public function actualizar()
    {
        $id = $_POST['id'];
        $distrito = $_POST['distrito'];
        $idprov = $_POST['idprov'];
        $actualizar = $this->model->actualizarDistrito($distrito, $idprov, $id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        }else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Distrito/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $this->model->eliminarDistrito($id);
        header("location: " . base_url() . "Distrito/Listar");
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarDistrito($id);
        $data = $this->model->selectDistrito();
        header("location: " . base_url() . "Distrito/Listar");
        die();
    }
    public function buscar()
    {
        $id = $_POST['id'];
        $data = $this->model->BuscarDistrito($id);
        echo json_encode($data);
    }
}
