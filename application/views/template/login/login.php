<?php
/* 
 * Sistema Web Responsivo Club Del Pintor Axalta Guatemala  *
 * @author	Strategic Solutions S.A. de C.V             * 
 * @programmer  Enrique Arce Rosas                          * 
 * @CreateDate 11 abr. 2022 15:31:56                        * 
 */

defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section id="login">
    <div class="row">
        <div class="col-lg-6" style="padding-right:0;">
            <div class="login-img">
                <div>
                    <img src="<?=base_url("application/views/template/login/imagenes/logo.png");?>" alt="" style="width:150px;"><br>
                    <img src="<?=base_url("application/views/template/login/imagenes/logoCDP.png");?>" alt="" style="width:350px;">
                </div>
            </div>
            <div class="login-img-responsive">
                <div>
                    <img src="<?=base_url("application/views/template/login/imagenes/logo.png");?>" alt="">
                </div>
                <div>
                    <img src="<?=base_url("application/views/template/login/imagenes/logoCDP.png");?>" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-6" style="padding-left:0;">
            <div class="form-login">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-12">
                            <form action="<?=base_url("autenticacion/autenticacion".$this->urlVersionSite)?>" id="frm_login" role="form" method="post" accept-charset="utf-8">
                                <?=$token;?>
                                <div class="form-group">
                                    <label><?=$this->lang->line('login_input_usuario')?><span data-toggle='tooltip' title='<?=$this->lang->line('login_input_tooltip_usuario')?>'> <i class="fas fa-question-circle"></i></span></label>
                                    <input type="text" name="txt_usuario" id="txt_usuario" class="form-control trans" placeholder="<?=$this->lang->line('login_input_placeholder_usuario')?>" />
                                    <p id="error"></p>
                                </div>
                                <div class="form-group">
                                    <label><?=$this->lang->line('login_input_clave')?><span data-toggle='tooltip' title='<?=$this->lang->line('login_input_tooltip_clave')?>'> <i class="fas fa-question-circle"></i></span></label>
                                    <input type="password" name="txt_clave" id="txt_clave" class="form-password trans" value="abc123" placeholder="<?=$this->lang->line('login_input_placeholder_clave')?>"/>
                                    <i class="far fa-eye-slash seepwd icon-password" id="eyeclave1"></i>
                                    <div id="error"></div>
                                </div>      
                                <div class="form-group captcha-input">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="captcha"><?=$this->lang->line('login_input_captcha')?> <span data-toggle='tooltip' title='<?=$this->lang->line('login_captcha_tooltip')?>'> <i class="fas fa-question-circle"></i></span></label>
                                            <input type="text" name="txt_captcha" id="txt_captcha" maxlength="8" class="form-control"  onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete="off"  value="<?=$this->session->userdata('s_captcha_code',true);?>" >
                                            <div id="error"></div>
                                        </div>
                                        <div class="col-1">
                                            <div class="captcha-refresh">
                                                <a href="javascript:void(0);" id="refreshCaptcha"><i class="fas fa-sync"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="captcha-img" id="captImg">
                                                <?=$captchaImg;?>
                                            </div>
                                        </div>  
                                    </div>
                                </div>    
                                <div class="botones">
                                    <div class="d-grid gap-2">
                                        <button name="button_login" type="button" id="button_login" value="true" class="btn btn-axalta" ><?=$this->lang->line('login_btn_ingresar')?></button>
                                    </div>
                                </div>         
                            </form>
                        </div>              
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="enlaces">
                                <p><a href="<?php echo base_url("RecuperaClave").$this->urlVersionSite ?>"><?=$this->lang->line('login_recupera_clave')?></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright">
                                <p><?=$this->lang->line('login_copyright')?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <div class="aviso-cookies animate__animated animate__fadeInUp" id="aviso-cookies">
    <h3 class="titulo"><?=$this->lang->line('login_cookie_titulo')?></h3>
    <p class="parrafo"><?=$this->lang->line('login_cookie_texto')?></p>
    <button type="button" class="btn btn-black" id="avisocookies1" aria-hidden="true"><?=$this->lang->line('login_cookie_btn_acuerdo')?></button>
    <a class="enlace" href='/site/login' data-bs-toggle="modal" data-bs-target="#ModalCookies"><?=$this->lang->line('login_cookie_btn_aviso_cookie')?></a>
</div>
<div class="fondo-aviso-cookies" id="fondo-aviso-cookies"></div> 
        
<!-- Modal Aviso de Cookies -->
<div class="modal fade" id="ModalCookies" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=$this->lang->line('login_cookie_titulo')?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                      <div class="modal-body">
          
        <p>En nuestro Sitio web utilizamos "cookies". Las cookies son pequeños archivos de datos que se almacenan en el disco duro de su equipo de cómputo o del dispositivo de comunicación electrónica que usted utiliza cuando navega en nuestro Sitio. Estos archivos de datos permiten intercambiar información de estado entre nuestro Sitio web y el navegador que usted utiliza. La "información de estado" puede revelar medios de identificación de sesión, medios de autenticación o sus preferencias como usuario, así como cualquier otro dato almacenado por el navegador respecto del Sitio web.</p>
        <p>Las cookies nos permiten monitorear el comportamiento de un usuario en línea. Utilizamos la información que es obtenida a través de cookies para ayudarnos a optimizar su experiencia en el sitio. A través del uso de cookies podemos, por ejemplo, personalizar en su favor nuestra página de inicio de manera que nuestras pantallas se desplieguen de mejor manera de acuerdo con su tipo de navegador. Las cookies también nos permiten ofrecerle recomendaciones personalizadas.</p>
        <p>Las cookies no son software espía, y Axalta no recopila datos de múltiples sitios o comparte con terceros la información que obtenemos a través de cookies.</p>
        <p>Como la mayoría de los sitios web, nuestros servidores registran su dirección IP, la dirección URL desde la que accedió a nuestro Sitio web, el tipo de navegador, y la fecha y hora de sus compras y otras actividades. Utilizamos esta información para la administración del sistema, solución de problemas técnicos, investigación de fraudes y para nuestras comunicaciones con usted.</p>
        <p>Por último, le informamos que el Sitio web utiliza web BEACONS. Los webs BEACONS también nos permiten monitorear su comportamiento en medios electrónicos Utilizamos web BEACONS para determinar cuándo y cuántas veces una página ha sido vista. Utilizamos esta información para fines de mercadotecnia, pero únicamente para nuestras propias prácticas de mercadotecnia.</p>
            
        <p>Su navegador aceptará las cookies y permitirá la recolección automática de información a menos que usted cambie la configuración predeterminada del navegador. La mayoría de los navegadores web permiten que usted pueda gestionar sus preferencias de cookies.</p>
        <p>Puede ajustar su navegador para que rechace o elimine cookies. Los siguientes links muestran como ajustar la configuración del navegador de los navegadores que son utilizados con más frecuencia:</p>
        <p><a href="https://support.mozilla.org/es/kb/impedir-que-los-sitios-web-guarden-sus-preferencia" target="_blank">FIREFOX</a></p>
        <p><a href="https://support.apple.com/es-es/guide/safari/sfri11471/mac#:~:text=En%20la%20app%20Safari%20del,%E2%80%9CImpedir%20seguimiento%20entre%20sitios%E2%80%9D" target="_blank">SAFARI</a></p>
        <p><a href="https://support.google.com/chrome/answer/95647?hl=es" target="_blank">CHROME</a></p>
        <p>Si se inhabilitan las cookies del Sitio web, nuestro Sitio no se cargará apropiadamente.</p>
        <br>
        <table class="table table-bordered">
        	<thead>
                    <tr>
                        <th>Categorías de Cookies</th>
                        <th>¿Por qué utilizamos estas cookies?</th>
                    </tr>
        	</thead>
        	<tbody>
                    <tr>
                        <td>Técnicas</td>
                        <td>Son cookies necesarias para el funcionamiento de un sitio web. Incluyen, por ejemplo, cookies que le permiten iniciar sesión en áreas seguras.</td>
                    </tr>
                    <tr>
                        <td>Análisis</td>
                        <td>Estas cookies nos permiten entender mejor cómo interactúan nuestros usuarios con nuestro sitio web. Nos permiten reconocer y contar el número de visitas y saber cómo navegan en un sitio web cuando lo utilizan. Estas cookies nos ayudan a mejorar el modo en que funciona un sitio web, por ejemplo, garantizando que los usuarios encuentren lo que buscan fácilmente. Podemos utilizar estas cookies para conocer más sobre qué funcionalidades son las más populares entre nuestros usuarios y dónde necesitamos mejorar.</td>
                    </tr>
        	</tbody>
        </table>
        
        <br>
        <p>Si en algún momento decides revocar tu consentimiento para el uso de Cookies, esto significa que no se agregarán nuevas Cookies. Sin embargo, deberás eliminar las Cookies existentes en tu navegador. Para hacerlo, consulta la sección de ayuda o el sitio oficial de tu navegador.</p>
        <p>Configuración de cookies</p>
        <p>Utilizamos cookies propias y de terceros para analizar nuestros servicios y mostrarte publicidad relacionada con tus preferencias en base a un perfil elaborado a partir de tus hábitos de navegación (por ejemplo, páginas visitadas). Puedes obtener más información y configurar tus preferencias.</p>
            
        <p>Necesarias</p>
        <p>Las cookies necesarias son absolutamente esenciales para que el sitio web funcione correctamente. Esta categoría solo incluye cookies que garantizan funcionalidades básicas y características de seguridad del sitio web. Estas cookies no almacenan ninguna información personal.</p>

      </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-bs-dismiss="modal"><?=$this->lang->line('login_cookie_aviso_cookie_cerrar')?></button>
                <button type="button" class="btn btn-black" id="avisocookies2"><?=$this->lang->line('login_cookie_aviso_cookie_acepto')?></button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        /***************************************  eye clave  ***************************************/
        $("#eyeclave1").click(function(){
        if($("#txt_clave").prop('type')=='text'){
            $("#txt_clave").prop('type','password');
            $("#eyeclave1").removeClass("fa-eye");
            $("#eyeclave1").addClass("fa-eye-slash");
        }else{
            $("#txt_clave").prop('type','text');
            $("#eyeclave1").removeClass("fa-eye-slash");
            $("#eyeclave1").addClass("fa-eye");
            }
        })        
        /***************************************  COOKIES  ***************************************/
        var getCookie = function(name) {
            var cookies = document.cookie.split(';');
            for(var i=0 ; i < cookies.length ; ++i) {
                var pair = cookies[i].trim().split('=');
                if(pair[0] == name)
                    return pair[1];
            }
            return null;
        };
        if (getCookie('<?=$this->cookie_name?>')== '<?=$this->cookie_value?>') {} else { $('#aviso-cookies').show();$('#fondo-aviso-cookies').show(); }        
        $('#ModalCookies').modal({backdrop: 'static', keyboard: false}); 
        $('#aviso-cookies').modal({backdrop: 'static'});       
        $('.enlace').on('click', function(e){
            e.preventDefault();
            $('#ModalCookies').modal({backdrop: 'static', keyboard: false});            
        }); 
        $('#avisocookies1').on('click', function(e){
            $("#aviso-cookies").hide(); 
            $("#fondo-aviso-cookies").hide(); 
            $("#cookies1").val(1);
            cookie_axalta();            
        });        
        $('#avisocookies2').on('click', function(e){ 
            $("#ModalCookies").modal("hide"); 
            $("#aviso-cookies").hide(); 
            $("#fondo-aviso-cookies").hide();             
            $("#cookies2").val(1);            
            $("#cookies1").val(1);
            cookie_axalta();
        });        

        function cookie_axalta(){
            localStorage.clear("<?=$this->cookie_name?>");
            $.ajax({
                type: 'POST',
                url: 'login/login/login_crea_cookie',
                dataType: 'json',
                data: {id:0},
                success: function(data){ console.log(data);},
                error: function(data){ console.log(data);},
                complete: function(){  }
            });        
        }
        /***************************************  VALIDACION USUARIO Y CLAVE  ***************************************/
        $('#frm_login input').on('keyup', function ()  { js_general_limpiar_errores(this); });
        $('#frm_login input').on('click', function ()  { js_general_limpiar_errores(this); });
        $('#frm_login select').on('click', function () { js_general_limpiar_errores(this); });  
        $('#frm_login input').on('change', function () { js_general_limpiar_errores(this); });       
        /***************************************  OTROS  ***************************************/
        $('#txt_usuario').focus();
        $('#button_login').click(function() { login_autenticacion(); });
        $('#refreshCaptcha').on('click', function(){ login_captcha_refresh(); });
    });
    /***************************************  login_autenticacion  ***************************************/
    function login_autenticacion(){
        $('#error').html(" ");
        $('#loader_panel').show();        
        $.ajax({
            type: 	$('#frm_login').attr('method'),
            url: 	$('#frm_login').attr('action'),
            dataType:   'json',
            data: $("#frm_login").serialize(),
            success: function(data){
                switch (data.res){                    
                    case 0:
                        $('#txt_usuario').focus();
                        $('#txt_usuario').val('');
                        $('#txt_clave').val('');
                        login_captcha_refresh();
                        Swal.fire({ icon: 'error', allowOutsideClick:false, text: '<?=$this->lang->line('login_usuario_erroneo')?>'});
                        break
                    case 1:
                        $(location).attr('href','Inicio');
                        break
                    default: 
                        $.each(data, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key).parents('.form-group').find('#error').html(value);
                        });
                        return 0;
                        break;                            
                }
            },
            error: function(data){ console.log(data); },
            complete: function(){ 
                $('#loader_panel').hide(); 
            }
        });
    } 
    /***************************************  login_captcha_refresh  ***************************************/
    function login_captcha_refresh(){
        $.get('<?=base_url("login/login/login_refresh_captcha"); ?>', function(data){ $('#captImg').html(data); 
            $('#captcha').val(''); 
        }); 
    }    
</script>