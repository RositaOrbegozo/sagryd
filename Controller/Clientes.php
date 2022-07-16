<?php
    class Clientes extends Controllers{
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
            $data = $this->model->selectClientes();         
            $this->views->getView($this, "Listar", $data, "");
        }
    public function eliminados()
    {
        $data = $this->model->selectClientesInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
        public function insertar()
        {
            $ruc = $_POST['ruc'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $celular = $_POST['celular'];
            $telefono = $_POST['telefono'];
            
            $insert = $this->model->insertarClientes($nombre,$apellido, $ruc, $celular, $telefono);
            if ($insert > 0) {
            $alert = 'registrado';
            }else if ($insert == 'existe') {
            $alert = 'existe';
            }else{
            $alert =  'error';
            }
            $this->model->selectClientes();
            header("location: " . base_url() . "Clientes/Listar?msg=$alert");
            die();
        }
        public function editar()
        {
            $id = $_GET['id'];
            $data = $this->model->editarClientes($id);
            if ($data == 0) {
                $this->Listar();
            }else{
                $this->views->getView($this, "Editar", $data);
            }
        }
    public function actualizar()
    {
        $id = $_POST['id'];
        $ruc = $_POST['ruc'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $celular =$_POST['celular'];
        $telefono = $_POST['telefono'];        
        $actualizar = $this->model->actualizarClientes($nombre, $apellido, $ruc, $celular, $telefono, $id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        }else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Clientes/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $this->model->eliminarClientes($id);
        header("location: " . base_url() . "Clientes/Listar");
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarClientes($id);
        $data = $this->model->selectClientes();
        header("location: " . base_url() . "Clientes/Listar");
        die();
    }
    public function buscar()
    {
        $ruc = $_POST['ruc'];
        $data = $this->model->BuscarCliente($ruc);
        echo json_encode($data);
    }
}
