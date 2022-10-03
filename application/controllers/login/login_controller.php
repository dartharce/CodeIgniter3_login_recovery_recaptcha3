<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends Base_Controller {
    public function __construct(){         
        parent::__construct();
    }    
    public function index(){//Pagina de Inicio
        $data['frm_action'] = "frm_login_view";
        $this->base_controller_create_view_login('template/login/login_view',$data);        
    }
}