<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Modulo extends Controlador{
    function __contruct(){
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
        if(!Permisos::tienePermiso('modulos', 'ver')){
            header('location: ' . URL . 'index');
        }
        $this->view->js = array('modulo/js/default.js');
    }
    
    public function index(){
        $this->view->modulos =  $this->modelo->listarModulos();
        $this->view->render('modulo/index');
    }
    
     public function buscar_modulo($nombre){
         $this->modelo->buscar_modulo($nombre);
    }
    
    public function crear(){
       $data = array();
       $data['nombre'] = $_POST['nombre'];
       $this->modelo->crear($data);
       header('location:' . URL .'modulo');
    }
    
    public function editar($id){
        $this->view->modulo = $this->modelo->listarModuloIndividual($id);
        $this->view->render('modulo/editar');
    }
    
    public function guardarEditar($id){
       $data = array();
       $data['id']=$id;
       $data['nombre'] = $_POST['nombre'];
       $this->modelo->guardarEditar($data);
       header('location:' . URL .'modulo');
    }
    
    public function eliminar($id) {
        $this->modelo->eliminar($id);
        header('location:' . URL .'modulo');
    }
}
