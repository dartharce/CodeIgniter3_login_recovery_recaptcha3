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
        $this->site_title       = 'CLUB DEL PINTOR AXALTA GUATEMALA';
        $this->site_icon        = base_url('favicon.ico');
        $this->urlVersionSite   = urlVersion();
        //$this->BCC              = "luis.rivera@strategix.com.mx,patricia.carteno@strategix.com.mx,enrique.arce@strategix.com.mx,amaury.leon@strategix.com.mx,emma.valdivieso@strategix.com.mx,contacto@clubdelpintoraxalta.com.gt";
        $this->BCC              = "luis.rivera@strategix.com.mx,patricia.carteno@strategix.com.mx,enrique.arce@strategix.com.nx,amaury.leon@strategix.com.mx";
        $this->alias            = "_cdpg";
        $this->cookie_name      = "CDPCOOKIE20220413";
        $this->cookie_value     = "FFF7F8F5F4E444848F5F4";
        $this->login_url        = "login".$this->urlVersionSite;
        $this->base_controller_valida_usuario();
    }
    public function base_controller_create_view_sistema($view, $data = array()){//Estructura de Sitio
        $data['token']              = $this->base_controller_csrf_input_token(); 
        $datafooter="";        
        $dataheader['site_title']           = $this->site_title;
        $dataheader['site_icon']            = $this->site_icon;
        $datanav['perfil_nombre']           = mb_strtoupper($this->session->userdata('s_perfil_nombre'.$this->alias));
        $datanav['usuario_nombre']          = mb_strtoupper($this->session->userdata('s_usuario_nombre'.$this->alias));
        $datanav['menu']                    = $this->base_controller_menus();
        $datanav['menu_hide']               = (valida_terminos_condiciones_aviso_privacidad_actualiza_datos($this->session->userdata('s_actualiza_datos'.$this->alias)))?1:0;
        $this->load->view('template/sistema/header', $dataheader);
        $this->load->view('template/sistema/menu/menu', $datanav);
        $this->load->view($view, $data);
        $this->load->view('template/sistema/footer', $datafooter); 
    }
    public function base_controller_create_view_login($view, $data = array()){
        $data['token']              = $this->base_controller_csrf_input_token(); 
        $dataheader['site_title']   = $this->site_title;
        $dataheader['site_icon']    = $this->site_icon;        
        $this->load->view('template/login/header', $dataheader);        
        $this->load->view($view, $data);
        $this->load->view('template/login/footer');         
    }
    public function base_controller_create_view_out($view, $data = array()){
        $data['token']              = $this->base_controller_csrf_input_token(); 
        $dataheader['site_title']   = $this->site_title;
        $dataheader['site_icon']    = $this->site_icon;
        $datanav['logo']            = base_url('assets/application/images/inicio/logo.png'); 
        $this->load->view('template/publico/header', $dataheader);
        $this->load->view('template/publico/nav',$datanav);
        $this->load->view($view, $data);
        $this->load->view('template/publico/footer'); 
    }
    private function base_controller_menus(){
        $menu = '';
        switch ($this->session->userdata('s_perfil_id'.$this->alias)) {            
            case 1: $menu = 'menu_administrador_strategix'; break;//ADMINISTRADORES STRATEGIX
            case 2: $menu = 'menu_atencion_cliente'; break;//ATENCIÓN A CLIENTES
            case 3: $menu = 'menu_administrador_axalta'; break;//ADMINISTRADORES AXALTA
            case 4: $menu = 'menu_administrador_axalta_region'; break;//ADMINISTRADOR AXALTA POR REGIÓN
            case 5: $menu = 'menu_gerente_region'; break;//GERENTE REGIONAL
            case 6: $menu = 'menu_ejecutivo'; break;//EJECUTIVOS
            case 7: $menu = 'menu_administrador_distribuidor'; break;//ADMINISTRADOR DE DISTRIBUIDOR
            case 8: $menu = 'menu_personal_tienda'; break;//PERSONAL DE TIENDA
            case 9: $menu = 'menu_responsable_tienda'; break;//RESPONSABLE DE TIENDA
            case 10: $menu = 'menu_maestro_pintor'; break;//MAESTRO PINTOR
        }
        return $this->load->view('template/sistema/menu/'.$menu,'',true);
    }
    public function base_controller_envio_correos($to = array(), $subject, $content, $file = '' ){//Cunfiguracion y envío de Mail
        $this->load->library('email');
        $config = array('smtp_timeout'  => "60",'protocol'      => "smtp",'smtp_host'     => "smtp.office365.com",'smtp_user'     => "contacto@clubdelpintoraxalta.com.gt",'smtp_pass'     => "Tab55113",'smtp_port'     => "587",'smtp_crypto'   => "tls",'mailtype'      => "html",'wordwrap'      => TRUE,'charset'       => "utf-8",'newline'       => "\r\n",'crlf'          => "\r\n");             
        $this->email->initialize($config);
        $this->email->from('contacto@clubdelpintoraxalta.com.gt', 'Contacto Axalta Club del Pintor');
        $this->email->subject($subject);
        $this->email->message($content);
        if ($file != ''){ $this->email->attach($file); }
        $this->email->to($to['to']);
        if ($to['cc'] != "" ){ $this->email->cc($to['cc']); }
        if ($to['bcc'] != "" ){ $this->email->bcc($to['bcc']); }        
        $estatus_msg = $this->email->send(FALSE);
//        if($estatus_msg){
//            echo "enviado<br/>";
//            echo $this->email->print_debugger(array('headers'));
//        }else {
//            echo "fallo <br/>";
//            echo "error: ".$this->email->print_debugger(array('headers'));
//        }
        return $estatus_msg;
    }
    public function base_controller_borrar_captcha(){
        if($this->session->userdata('s_captcha_time')!=""){
             $captcha_file = set_realpath("captcha_images/".$this->session->userdata('s_captcha_time').".jpg");
            if (file_exists($captcha_file)){ 
                unlink($captcha_file); 
            }
        }        
    }
    public function base_controller_crea_captcha(){   
        $folder = set_realpath('captcha_images'); if(!is_dir($folder)){ mkdir($folder,777); }
        $this->base_controller_borrar_captcha();
        // Captcha configuration
        $config = array('img_path'      => 'captcha_images/','img_url'       => base_url().'captcha_images/','img_width'     => '130','img_height'    => 40,'word_length'   => 8,'font_size'     => 16,'pool'=>'23456789abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ');
        $captcha = create_captcha($config);
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('s_captcha_code');
        $this->session->unset_userdata('s_captcha_image');
        $this->session->unset_userdata('s_captcha_time');
        $this->session->set_userdata('s_captcha_code',$captcha['word']);
        $this->session->set_userdata('s_captcha_image',$captcha['image']);
        $this->session->set_userdata('s_captcha_time',$captcha['time']);
        // Display captcha image
        $datos['captcha_code'] = $captcha['word'];
        $datos['captcha_image'] = $captcha['image'];
        $datos['captcha_time'] = $captcha['time'];
        return $datos;
    }
    public function base_controller_codigo_postal($cp){
        $d_col = $this->Base_Model->base_model_busca_asentamiento($cp);
        $d_mun = $this->Base_Model->base_model_busca_delegacion($cp);
        $d_est = $this->Base_Model->base_model_busca_estado($cp);
        $d_ciu = $this->Base_Model->base_model_busca_ciudad($cp);          
        $colonia = $munic = $estado = $ciudad = $est = "";
        foreach ($d_col as $val_col){ $colonia 	.= '<option value="'.utf8_encode(strtoupper($val_col->CodigoPostalAsentacion)).'">'.utf8_encode(strtoupper($val_col->CodigoPostalAsentacion)).'</option>';}
        foreach ($d_mun as $val_mun){ $munic 	.= '<option value="'.utf8_encode(strtoupper($val_mun->CodigoPostalDelegacionMunicipio)).'">'.utf8_encode(strtoupper($val_mun->CodigoPostalDelegacionMunicipio)).'</option>'; }
        foreach ($d_est as $val_est){ $estado   .= '<option value="'.utf8_encode(strtoupper( $val_est->CodigoPostalEstado)).'">'.utf8_encode(strtoupper($val_est->CodigoPostalEstado)).'</option>'; $est = $val_est->CodigoPostalEstado; }
        foreach ($d_ciu as $val_ciu){ $ciudad   .= '<option value="'.utf8_encode(strtoupper($val_ciu->CodigoPostalCiudad)).'">'.utf8_encode(strtoupper($val_ciu->CodigoPostalCiudad)).'</option>'; }
        $entrada = ($estado == "")?0:1;
        $data = array('entrada'=> $entrada, 'colonia' => $colonia, 'munic' => $munic, 'estado' => $estado, 'ciudad'=>$ciudad );
        return $data;
    }
    public function base_controller_valida_crea_carpetas($carpeta){
        $folder = set_realpath('uploads/'.$carpeta); if(!is_dir($folder)){ mkdir($folder,777); } return $folder;
    }
    public function base_controller_cargas_upload_archivo($input_file_name,$directorio,$extenciones,$nombre_archivo){
        if(!empty($_FILES[$input_file_name]['name'])){
            $filename = $_FILES[$input_file_name]["name"];
            $ext = strtolower(".".pathinfo($filename,PATHINFO_EXTENSION));
            $filenewname = $nombre_archivo.$ext;
            $config['upload_path'] = $directorio;
            $config['allowed_types'] = $extenciones;
            $config['file_name'] = $filenewname;
            $this->upload->initialize($config);
            $this->load->library('upload',$config);
            if($this->upload->do_upload($input_file_name)){
                $res['resultado']  = 1;
                $res['file_name']  = $filenewname;
                $res['ext']  = $ext;
            } else {                
                $res['msg'] = "Error al cargar el archivo ".$this->upload->display_errors();
                $res['resultado']  = 0; 
            }
        } else {
            $res['msg'] = "FileInput no definido"; $res['resultado']  = 0;
        }
        return $res;
    }
    public function base_controller_datos_usuario_web() {
        $this->load->library('user_agent');
        if ($this->agent->is_browser()){
            $navegador = $this->agent->browser().' '.$this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $navegador = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $navegador = $this->agent->mobile();
        } else { $navegador = 'Unidentified User Agent';
        }
        $data['sitemaOperativo'] = $this->agent->platform();
        $data['ip_address'] =  $this->input->ip_address();
        return $data;
    }
    private function base_controller_valida_usuario() {
        if ($this->base_controller_check_session()){ redirect($this->login_url); } 
//        if ($this->base_controller_paginas_publicas()==true and $this->uri->segment(1)!="TerminosCondicionesAviso" and valida_terminos_condiciones_aviso_privacidad_actualiza_datos($this->session->userdata('s_terminos'.$this->alias))==0){ redirect(base_url("TerminosCondicionesAviso".$this->urlVersionSite));}
//        if ($this->base_controller_paginas_publicas()==true and $this->uri->segment(1)!="TerminosCondicionesAviso" and $this->uri->segment(1)!="ActualizarDatos" and valida_terminos_condiciones_aviso_privacidad_actualiza_datos($this->session->userdata('s_actualiza_datos'.$this->alias))==0){ redirect(base_url("ActualizarDatos".$this->urlVersionSite)); }
        if ($this->base_controller_paginas_publicas()==true and $this->uri->segment(1)!="ActualizarDatos" and valida_terminos_condiciones_aviso_privacidad_actualiza_datos($this->session->userdata('s_actualiza_datos'.$this->alias))==0){ redirect(base_url("ActualizarDatos".$this->urlVersionSite)); }
//        if ($this->base_controller_paginas_publicas()==true and $this->uri->segment(1)!="ActualizarDatos" and valida_terminos_condiciones_aviso_privacidad_actualiza_datos($this->session->userdata('s_actualiza_datos'.$this->alias))==1){ /*POPUPS*/ }
    }
    private function base_controller_check_session(){//Valida session de participante
        if  ($this->base_controller_paginas_publicas()==false){
            return false;
        }else{
            if ($this->session->userdata('logged_in'.$this->alias)) {
                return false;
            }else { 
                return true;
            }
        }
    }
    private function base_controller_paginas_publicas() {
        if  (uri_string()=='' || uri_string() == 'login' || uri_string() == 'Login' || uri_string() == 'logout/logout' || uri_string() == 'logout' || uri_string() == 'login/login/login_refresh_captcha' || uri_string() == 'RecuperaClave' || uri_string() == 'RecuperaClaveNueva' || uri_string() == 'usuarios/usuarios_recupera_clave/usuarios_recupera_clave/usuarios_recupera_clave_email' || uri_string() == 'usuarios/usuarios_recupera_clave/usuarios_recupera_clave_nueva/usuarios_recupera_clave_nueva_actualizacion' || uri_string() == 'autenticacion/autenticacion' || uri_string() == 'legal/terminos_condiciones_aviso/terminos_condiciones_aviso_guarda_acepto' || uri_string() == 'usuarios/usuarios_actualizar/usuarios_actualizar_datos/usuarios_actualizar_datos_form_validate' || uri_string() == 'usuarios/usuarios_actualizar/usuarios_actualizar_datos/usuarios_actualizar_datos_guardar_participante' || uri_string() == 'login/login/login_crea_cookie'|| uri_string() == 'RecuperaCrearClave' 
                || uri_string() == 'usuarios/usuarios_crea_clave/usuarios_crea_clave_controller/usuarios_crea_clave_controller_clave_nueva'
                || uri_string() == 'tutoriales/tutoriales_externos_controller/tutoriales_externos_controller_modal_popup'
                || uri_string() == 'TutorialesAxalta'
                || uri_string() == 'tutoriales/tutoriales_controller/tutoriales_controller_modal_popup'
                || uri_string() == 'tutoriales/tutoriales_externos_controller/tutoriales_externos_controller_modal'
                || uri_string() == 'TutorialesAxalta'
                || uri_string() == 'TutorialesAxalta'
                ){
            return false;
        } else {
            return true;
        }
    }
    public function base_controller_historial_carga($nombre_archvio_original,$nombre_archivo_nuevo,$folder,$tipo) {
        $tabla = "";$x=$cargaId=0;
        $sheets = $this->phpspreadsheet_sx_library->phpspreadsheet_sx_library_lee_archivo($folder.$nombre_archivo_nuevo);
        if (count($sheets)>1){
            $cargaId = $this->Base_Model->base_model_insert_cargas($tipo,$nombre_archvio_original,$nombre_archivo_nuevo);
            foreach ($sheets as $row) {   
                if($x!=0){
                    $error = $this->Base_Model->base_model_insert_cargas_detalle($row,$tipo,$cargaId);
                    $tabla.=carga_tabla_helper($tipo,$row,$error,$cargaId);
                }
                $x++;
            }
            $data['cargaId'] = $cargaId;
            $data['tabla'] = $tabla;
            $data['error'] = $this->Base_Model->base_model_valida_carga_error($tipo,$cargaId);
        } else {
            $data['cargaId'] = 0;
            $data['tabla'] = "";
            $data['error'] = -1;
        }
        return $data;
    }
    public function base_controller_csrf_input_token() {
        return "<input type=\"hidden\" id=\"".$this->security->get_csrf_token_name()."\" name=\"".$this->security->get_csrf_token_name()."\" value=\"".$this->security->get_csrf_hash()."\" />";
    }
    public function base_controller_valida_corte($tipo,$anio='',$mes='',$CorteIdOtro='') {
        return ($this->Base_Model->base_model_valida_corte($tipo,$anio,$mes,$CorteIdOtro)==0)?0:1;
    }
    public function base_controller_valida_ventas($anio,$mes,$mes_anterior) {
        return ($this->Base_Model->base_model_valida_ventas($anio,$mes,$mes_anterior)==0)?0:1;
    }    
    public function base_controller_valida_ventas_auditoria($anio,$mes,$mes_anterior) {
        return $this->Base_Model->base_model_valida_ventas_auditorias($anio,$mes,$mes_anterior);
    }
    public function base_controller_valida_ventas_promocion($VentaPromocionId) {
        return ($this->Base_Model->base_model_valida_ventas_promocion($VentaPromocionId)==0)?0:1;
    }    
    public function base_controller_valida_ventas_auditoria_promocion($VentaPromocionId) {
        return $this->Base_Model->base_model_valida_ventas_auditorias_promocion($VentaPromocionId);
    }
    public function base_controller_guarda_corte($tipo,$anio,$mes,$id=0) {
        return $this->Base_Model->base_model_guarda_cortes($tipo,$anio,$mes,$id);
    }
    public function base_controller_guarda_corte_detalle($tabla,$data) {
        return $this->Base_Model->base_model_guarda_cortes_detalle($tabla,$data);
    }   
}
