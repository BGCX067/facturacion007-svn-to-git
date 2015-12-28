<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Perfil extends Controlador {

    function __construct() {
        parent::__construct();
        Session::init();
        $logeado = Session::get('logeado');
        $role = Session::get('rol');
        $usuario = Session::get('usuario');
        if(!Permisos::tienePermiso('perfiles', 'ver')){
            header('location: ' . URL . 'index');
        }
        if (!$logeado) {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
        $this->view->js = array('perfil/js/default.js');
    }

    public function index() {
        $this->view->perfiles = $this->modelo->listarPerfiles();
        $this->view->modulos = $this->modelo->listarModulos();
        $this->view->permisos = $this->modelo->listarPermisos();
        $this->view->count = 0;
        $this->view->render('perfil/index');
    }

    public function buscar_perfil($nombre) {
        $this->modelo->buscar_perfil($nombre);
    }

    public function crear() {
        $data = array();
        $data['nombre'] = $_POST['nombre'];
        foreach ($_POST['modulos'] as $modulo) {
            $data[$modulo] = $_POST['permiso_' . $modulo];
        }
        $this->modelo->crear($data);
        header('location:' . URL . 'perfil');
        
    }

    public function editar($id) {

        $this->view->perfil = $this->modelo->listarPerfilIndividual($id);
        $modulos = $this->modelo->listarModulos();
        $permisos = $this->modelo->listarPermisos();
        $PermisosPerfil = $this->modelo->listarPermisosPerfil($id);
        $arreglo = array();
        $id_modulo = array();
        
        foreach ($modulos as $clave => $modulo) {
            $var_contador=0;
            foreach ($permisos as $key => $permiso) {
                $id_modulo[$modulo['nombre']] = $modulo['id'];
                $this->view->solo_permisos[$modulo['nombre']][$permiso['nombre']]=++$var_contador;
                if (!empty($PermisosPerfil)) {
                    foreach ($PermisosPerfil as $keyPermisosPerfil => $PermisoPerfil) {
                        $arreglo[$PermisoPerfil['modulo_nombre']][$PermisoPerfil['permiso_nombre']] = TRUE;
                        if (!array_key_exists($modulo['nombre'], $arreglo) or !array_key_exists($permiso['nombre'], $arreglo[$modulo['nombre']])) {
                            $arreglo[$modulo['nombre']][$permiso['nombre']] = FALSE;
                        }
                    }
                } else {
                    $arreglo[$modulo['nombre']][$permiso['nombre']] = FALSE;
                }
            }
        }

        $this->view->count = 0;
        $this->view->permisos = $arreglo;
        $this->view->id_modulos = $id_modulo;
        // exit("<pre>".print_r($arreglo).'</pre>');
        $this->view->render('perfil/editar');
    }

    public function guardarEditar($id) {
        $data = array();
        $data['id']=$id;
        $data['nombre'] = $_POST['nombre'];
        foreach ($_POST['modulos'] as $modulo) {
            $data[$modulo] = $_POST['permiso_' . $modulo];
        }
        $this->modelo->guardarEditar($data);
        header('location:' . URL . 'perfil');
    }

    public function eliminar($id) {
        $this->modelo->eliminar($id);
        header('location:' . URL . 'perfil');
    }

}
