<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Autenticacion_controller extends CI_Controller {
 
    public function __construct() {
       parent::__construct();
       $this->load->helper('url');
       $this->load->library('session');
    }
    public function index(){
        echo "sess1:";
        print_r($this->session->sess_expiration);
        print_r($this->input->post());
        $token      = $this->input->post('token');
        $action      = $this->input->post('action');
        $remember      = $this->input->post('rememberme');
        $resultado = $this->repatcha3_library->send_recaptcha($token,$action);
        //print_r($resultado);

        if($remember == 1)
        {
            $this->config->set_item('sess_expiration', 0);
            $this->config->set_item('sess_expire_on_close', TRUE);
            $this->session->sess_expiration = 0;
            $this->session->sess_expire_on_close = TRUE;            
        }    
        
        $session_data = array('fechahora'=>date('Y')."/".date('m')."/".date('d')." ".date('H').":".date('i').":".date('s'),'my_session_id' =>md5(uniqid(rand(), TRUE)));
        $this->session->set_userdata( $session_data );          
        echo "<br>sess2:";
        print_r($this->session->sess_expiration);
        
        echo "<br>sess user:";
        print_r($this->session->userdata());
    } 
    public function verifica() {
        echo "<br>sess:";
        print_r($this->session->sess_expiration);
        
        echo "<br>sess user:";
        print_r($this->session->userdata());
    }
}