<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Perfil_Model extends Modelo {
    function __construct() {
        parent::__construct();
    }
    
    public function listarPerfiles(){
        $consulta = $this->db->ejecutarConsulta('SELECT id, nombre FROM perfiles') ;
        return $consulta->fetchAll();
    }
    
    public function buscar_perfil($nombre) {
       $consulta = $this->db->ejecutarConsulta("SELECT id,nombre from perfiles where nombre like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
       $data = $consulta->fetchAll();
       echo json_encode($data);
    }
    
    public function crear($data){
        $datos=array(
            'nombre'   => $data['nombre']
        );
        $arreglo=array();
        
        if ($this->db->insertar('perfiles', $datos)){
            $id_perfil= $this->db->lastInsertId();
            foreach ($data as $key => $valor){
                if (is_array($valor)){
                    foreach($valor as $nuevo){
                        $arreglo['id_perfil']  = $id_perfil;
                        $arreglo['id_modulo']  = $key;
                        $arreglo['id_permiso'] = $nuevo;
                        if (is_array($arreglo)){
                            $this->db->insertar('perfil_permiso_modulo', $arreglo);
                        }
                    }
              
                }
            }
        }
    }
    
    public function listarPerfilIndividual($id){
        $sql = "SELECT id, nombre FROM perfiles where id=:id" ;
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id)) ;
        return $consulta->fetch();
    }
    
    public function guardarEditar($data){
         $this->eliminarPermisosPerfil($data['id']);
        $datos = array(
                'nombre' => $data['nombre']
            );
            $arreglo = array();
                foreach ($data as $key => $valor) {
                    if (is_array($valor)) {
                        foreach ($valor as $nuevo) {
                            $arreglo['id_perfil'] = $data['id'];
                            $arreglo['id_modulo'] = $key;
                            $arreglo['id_permiso'] = $nuevo;
                            if (is_array($arreglo)) {
                                $this->db->insertar('perfil_permiso_modulo', $arreglo);
                            }
                        }
                    }
                }
    }
    
    public function eliminar($id) {
        $sql = 'DELETE FROM perfiles WHERE id= :id';
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id));
    }
    
    public function listarModulos(){
        $consulta = $this->db->ejecutarConsulta('SELECT id, nombre FROM modulos') ;
        return $consulta->fetchAll();
    }
    
    public function listarPermisos(){
        $consulta = $this->db->ejecutarConsulta('SELECT id, nombre FROM permisos') ;
        return $consulta->fetchAll();
    }
    
    public function listarPermisosPerfil($id_perfil){
        
        $sql = "SELECT modulos.id as modulo_id,modulos.nombre as modulo_nombre, 
                            permisos.id as permiso_id, permisos.nombre as permiso_nombre 
                            FROM perfil_permiso_modulo 
                            INNER JOIN modulos on modulos.id = perfil_permiso_modulo.id_modulo
                            INNER JOIN permisos on permisos.id= perfil_permiso_modulo.id_permiso
                            WHERE id_perfil=$id_perfil order by modulo_id,permiso_id";
        
        //exit($sql);
        $consulta=$this->db->ejecutarConsulta($sql) ;
        return $consulta->fetchAll();
    }
    
    public function eliminarPermisosPerfil($id_perfil){
        $sql = 'DELETE FROM perfil_permiso_modulo WHERE id_perfil= :id';
        $consulta = $this->db->ejecutarConsulta($sql, array(':id' => $id_perfil));
        if ($consulta) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

