<?php
class Login_Model extends Modelo {

    function __construct() {
        parent::__construct();
    }
    
    public function entrar(){
        $consulta = $this->db->prepare("SELECT usuarios.id as id_usuario, perfiles.nombre as rol,perfiles.id as id_perfil,usuarios.nombre from usuarios inner join perfiles on perfiles.id=usuarios.id_perfil WHERE login = :login AND password = :password");
        $consulta->execute(array(
            ':login'    => $_POST['nick'],
            ':password' => Hash::create('md5', $_POST['clave'])
        ));
        
        $data = $consulta->fetch();
        $contar = $consulta->rowCount();
        if($contar > 0){
            Session::init();
            Session::set('rol', $data['rol']);
            Session::set('logeado', true);
            Session::set('usuario', $data['nombre']);
            Session::set('id_usuario', $data['id_usuario']);
            Session::set('id_perfil',$data['id_perfil']);
            Session::set('permisos', $this->generarArreglo($data['id_perfil']));
            $data['error'] = ''; 
            echo json_encode($data);
            //logear
        }else{
            $data['error'] = 'Usuario o Clave Incorrectos'; 
            echo json_encode($data); // Codificar la Data {"texto":"erg","texto2":"egerg"}
        }
       
    }

    
    private function generarArreglo($id){
        $modulos = $this->listarModulos();
        $permisos = $this->listarPermisos();
        $PermisosPerfil = $this->listarPermisosPerfil($id);
        $arreglo = array();
        foreach ($modulos as $clave => $modulo) {
            foreach ($permisos as $key => $permiso) {
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
        return $arreglo;
    }
    public function listarModulos() {
        $consulta = $this->db->ejecutarConsulta('SELECT id, nombre FROM modulos');
        return $consulta->fetchAll();
    }

    public function listarPermisos() {
        $consulta = $this->db->ejecutarConsulta('SELECT id, nombre FROM permisos');
        return $consulta->fetchAll();
    }
    
    public function listarPermisosPerfil($id_perfil) {

        $sql = "SELECT modulos.id as modulo_id,modulos.nombre as modulo_nombre, 
                            permisos.id as permiso_id, permisos.nombre as permiso_nombre 
                            FROM perfil_permiso_modulo 
                            INNER JOIN modulos on modulos.id = perfil_permiso_modulo.id_modulo
                            INNER JOIN permisos on permisos.id= perfil_permiso_modulo.id_permiso
                            WHERE id_perfil=$id_perfil order by modulo_id,permiso_id";
        $consulta = $this->db->ejecutarConsulta($sql);
        return $consulta->fetchAll();
    }
}