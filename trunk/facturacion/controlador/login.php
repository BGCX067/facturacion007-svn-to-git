<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author informatica
 */
class Login extends Controlador {
    function __construct() {
        parent::__construct();
   }
    
    public function index(){
        $this->view->titulo = ' - Login';
        $this->view->js = array('login/js/login.js');
        $this->view->render('login/index',TRUE);
    }
    
    public function entrar(){
        $this->modelo->entrar();
    }
}


