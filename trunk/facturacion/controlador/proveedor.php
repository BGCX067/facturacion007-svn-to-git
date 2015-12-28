<?php

class Proveedor extends Controlador {
    
    function __construct() {
        parent::__construct();
        Session::init();
        $logeado = Session::get('logeado');
        $role = Session::get('rol');
        $usuario= Session::get('usuario');
        if(!$logeado ){
            Session::destroy();
            header('location: '.URL.'login');
            exit;
        }
        if(!Permisos::tienePermiso('proveedores', 'ver')){
            header('location: ' . URL . 'index');
        }

         $this->view->js = array('proveedor/js/default.js');
     
    }
    
    public function nuevo(){
        $this->view->render('proveedor/nuevo');
    }
    
    public function index(){
        $this->view->listaProveedores = $this->modelo->listarProveedores();
        $this->view->render('proveedor/index');
    }
    
    public function editar($id){
        //exit($id);
        $this->view->proveedor = $this->modelo->listarProveedorIndividual($id);
        //exit(print_r($this->view->proveedor));
        $this->view->render('proveedor/editar');
    }
    
    public function crear(){
       $data = array();
       $data['rif'] = $_POST['rif'];
       $data['razon_social'] = $_POST['razon_social'];
       $data['telefono'] = $_POST['telefono'];
       
       $this->modelo->crear($data);
       header('location:' . URL .'proveedor');
    }
    
     public function guardarEditar($id){
       $data = array();
       $data['rif'] = $_POST['rif'];
       $data['razon_social'] = $_POST['razon_social'];
       $data['telefono'] = $_POST['telefono'];
       $data['id'] = $id;
       //exit(print_r($data));
       $this->modelo->guardarEditar($data);
       header('location:' . URL .'proveedor');
    }
    
    public function eliminar($id) {
        $this->modelo->eliminar($id);
        header('location:' . URL .'proveedor');
    }

    public function buscar_proveedores($nombre){
         $this->modelo->buscar_proveedor($nombre);
    }
    

    
}
?>
