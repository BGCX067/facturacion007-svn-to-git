<?php
class Controlador {

    function __construct() {
        $this->view=new Vista();
    }
    
    public function cargarModelo($nombre){
        $ruta = 'modelo/'. $nombre .'_model.php';
        if(file_exists($ruta)){
            require $ruta;
            $nombreModelo = $nombre . '_Model';
            if (empty($this->modelo)){
                $this->modelo = new $nombreModelo();
            }else{
                return new $nombreModelo();
            }
            
        }
    }

}