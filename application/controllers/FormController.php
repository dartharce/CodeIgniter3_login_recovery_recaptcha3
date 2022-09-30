<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class FormController extends CI_Controller {
 
    public function __construct() {
       parent::__construct();
       $this->load->helper('url');
       $this->load->library('session');
    }
    public function index(){
        $this->load->view('formPost');
    }
    public function autentica() {
        //print_r($this->input->post());
        $token      = $this->input->post('token');
        $postfields = array('secret'=>$this->config->item('google_secret'),'response'=>$token);
        $url        ="https://www.google.com/recaptcha/api/siteverify";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postfields));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $res = curl_exec($ch);
        curl_close($ch);                
        $status = json_decode($res, true); 
        print_r($status); 
        if ($status['success']==1 AND $status['score']>=0.5){
            echo "captcha valido";
        } else {
            echo "eres un robot";
        }
    }   
}