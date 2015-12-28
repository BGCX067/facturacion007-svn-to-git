<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Permisos {
    
    public static function tienePermiso($modulo,$permiso){
        $permisos = Session::get('permisos');
        if($permisos[$modulo][$permiso]){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    
}
