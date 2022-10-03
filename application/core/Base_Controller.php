<?php
/* 
 * Sistema Web Responsivo Club Del Pintor Axalta Guatemala  *
 * @author	Strategic Solutions S.A. de C.V             * 
 * @programmer  Enrique Arce Rosas                          * 
 * @CreateDate 4 abr. 2022 15:31:56                        * 
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {
    public function __construct(){        
        parent::__construct();
        $this->load->model('Base_Model');
        $this->site_title       = 'CodeIgniter Login RecoveryPassword y ReCaptcha3';
        $this->site_icon        = base_url('favicon.ico');
    }
    public function base_controller_create_view_sistema($view, $data = array()){
        $datafooter="";        
        $dataheader['site_title']           = $this->site_title;
        $dataheader['site_icon']            = $this->site_icon;
        $this->load->view('template/sistema/header', $dataheader);
        $this->load->view($view, $data);
        $this->load->view('template/sistema/footer', $datafooter); 
    }
    public function base_controller_create_view_login($view, $data = array()){
        $dataheader['site_title']   = $this->site_title;
        $dataheader['site_icon']    = $this->site_icon;        
        $this->load->view('template/login/header', $dataheader);        
        $this->load->view($view, $data);
        $this->load->view('template/login/footer');         
    } 
}
