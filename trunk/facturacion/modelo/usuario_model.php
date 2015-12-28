<?php

class Usuario_Model extends Modelo {
    
    function __construct() {
        parent::__construct();
    }
    
    public function listarUsuarios() {
                
       $consulta = $this->db->ejecutarConsulta('SELECT usuarios.id, usuarios.nombre, apellido, login, perfiles.nombre as rol FROM usuarios inner join perfiles on perfiles.id=usuarios.id_perfil') ;
       
       return $consulta->fetchAll();
    }
    
    public function listarUsuarioIndividual($id) {
       $sql = 'SELECT usuarios.id, usuarios.nombre, apellido, login, perfiles.nombre as rol FROM usuarios inner join perfiles on perfiles.id=usuarios.id_perfil WHERE usuarios.id= :id';
       $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id)) ;
       return $consulta->fetch();
    }
    
    public function crear($data){
        $datos=array(
            'nombre'   => $data['nombre'],
            'apellido' => $data['apellido'],
            'login'    => $data['login'],
            'password' => Hash::create('md5',$data['password']),
            'id_perfil'     => $data['rol']
        );
        $this->db->insertar('usuarios', $datos);
        
    }
    
    public function guardarEditar($data){
       
        $datos=array(
            'nombre'   => $data['nombre'],
            'apellido' => $data['apellido'],
            'login'    => $data['login'],
            'password' => Hash::create('md5',$data['password']),
            'rol'     => $data['rol']
        );
        
         $this->db->actualizar('usuarios', $datos,"id={$data['id']}");
    }
    
    public function eliminar($id) {
        $sql = 'DELETE FROM usuarios WHERE id= :id';
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id));
    }
    
    public function resetPassword($data){
       
        $datos=array(
            'password' => Hash::create('md5','123456')
        );
        
         $this->db->actualizar('usuarios', $datos,"id={$data['id']}");
    }

    public function buscar_usuario($nombre) {

       $consulta = $this->db->ejecutarConsulta("SELECT usuarios.id,usuarios.nombre,apellido,login,perfiles.nombre as rol from usuarios inner join perfiles on usuarios.id_perfil=perfiles.id where usuarios.nombre like '%$nombre%' or apellido like '%$nombre%' or login like '%$nombre%' or perfiles.nombre like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
       $data = $consulta->fetchAll();
       echo json_encode($data);
    }
    
    public function listarPerfiles(){
        $consulta = $this->db->ejecutarConsulta('SELECT id, nombre FROM perfiles') ;
        return $consulta->fetchAll();
    }


}