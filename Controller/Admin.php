<?php
    class Admin extends Controllers{
        protected $totalPagar, $tot = 0;
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
            $prod = $this->model->productos();
            $cli = $this->model->clientes();
            $usu = $this->model->usuarios();
            $data = $prod['COUNT(*)'];
            $clientes = $cli['COUNT(*)'];  
            $usuarios = $usu['COUNT(*)'];
            $this->views->getView($this, "Listar", $data, $usuarios, $clientes);
        }
        public function reportes()
        {
            $data = $this->model->selectStockM();
            echo json_encode($data);
        }
        public function reportesTorta()
        {
            $data = $this->model->selectProductos();
            echo json_encode($data);
        }
}
