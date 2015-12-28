<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Modulo_Model extends Modelo{
    public function __construct() {
        parent::__construct();
    }
    public function listarModulos(){
        $consulta = $this->db->ejecutarConsulta('SELECT id, nombre FROM modulos') ;
        return $consulta->fetchAll();
    }
    
    public function buscar_modulo($nombre) {
       $consulta = $this->db->ejecutarConsulta("SELECT id,nombre from modulos where nombre like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
       $data = $consulta->fetchAll();
       echo json_encode($data);
    }
    
    public function crear($data){
        $datos=array(
            'nombre'   => $data['nombre']
        );
        $this->db->insertar('modulos', $datos);
    }
    
    public function listarModuloIndividual($id){
        $sql = "SELECT id, nombre FROM modulos where id=:id" ;
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id)) ;
        return $consulta->fetch();
    }
    
    public function guardarEditar($data){
        $datos=array(
            'nombre'   => $data['nombre'] 
        );
         $this->db->actualizar('modulos', $datos,"id={$data['id']}");
    }
    
    public function eliminar($id) {
        $sql = 'DELETE FROM modulos WHERE id= :id';
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id));
    }
}
