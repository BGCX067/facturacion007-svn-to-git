<?php

class Producto extends Controlador {

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
        if(!Permisos::tienePermiso('productos', 'ver')){
            header('location: ' . URL . 'index');
        }
        $this->view->js = array('producto/js/default.js');

    }

    public function nuevo(){
        $this->view->render('producto/nuevo');
    }

    public function index(){
        $this->view->listaProductos = $this->modelo->listarProductos();
        $this->view->render('producto/index');
    }

    public function editar($id){
        //exit($id);
        $this->view->producto = $this->modelo->listarProductoIndividual($id);
        //exit(print_r($this->view->proveedor));
        $this->view->render('producto/editar');
    }

    public function crear(){
       $data = array();
       $data['codigo'] = $_POST['codigo'];
       $data['descripcion'] = $_POST['descripcion'];
       $data['precio_compra'] = $_POST['precio_compra'];
       $data['precio_venta'] = $_POST['precio_venta'];
       $data['stock_minimo'] = $_POST['stock_minimo'];
       $data['existencia'] = $_POST['existencia'];
       $data['id_proveedor'] = $_POST['id_proveedor'];
       $this->modelo->crear($data);
       header('location:' . URL .'producto');
    }

     public function guardarEditar($id){
       $data = array();
       $data['codigo'] = $_POST['codigo'];
       $data['descripcion'] = $_POST['descripcion'];
       $data['precio_compra'] = $_POST['precio_compra'];
       $data['precio_venta'] = $_POST['precio_venta'];
       $data['stock_minimo'] = $_POST['stock_minimo'];
       $data['existencia'] = $_POST['existencia'];
       $data['id'] = $id;
       //exit(print_r($data));
       $this->modelo->guardarEditar($data);
       header('location:' . URL .'producto');
    }

    public function eliminar($id) {
        $this->modelo->eliminar($id);
        header('location:' . URL .'producto');
    }

    public function producto_proveedor($id_proveedor){
        $this->view->id_proveedor=$id_proveedor;
        $this->view->listaProductos = $this->modelo->listarProductosProveedor($id_proveedor);
        $this->view->render('producto/proveedor');
    }

    public function buscarProveedores($nombre){
        $this->modelo->buscarProveedores($nombre);
    }

    public function buscar_productos($nombre){
         $this->modelo->buscar_producto($nombre);
    }

    public function actualizarExistencia(){
        $data = array();
       $data['existencia'] = $_POST['input_existencia'];
       $data['id'] = $_POST['id_producto_existencia'];
       $this->modelo->actualizarExistencia($data);
       header('location:' . URL .'producto');
    }



}
?>

