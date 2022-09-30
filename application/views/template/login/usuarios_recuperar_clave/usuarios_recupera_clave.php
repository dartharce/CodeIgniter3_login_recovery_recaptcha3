<form action="<?= base_url('usuarios/usuarios_recupera_clave/usuarios_recupera_clave/usuarios_recupera_clave_email')?>" id="frm_recupera_clave" role="form" method="post" accept-charset="utf-8">
    <?=$token;?>
    <section id="recuperaClave">
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
                <div class="form-recover">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>RECUPERA TU CONTRASEÑA</h2>
                                    </div>
                                </div>
                                <div class="form-recovery " id="axa-form">
                                    <p><?=$this->lang->line('recupera_clave_msg')?></p>    
                                    <div class="form-group">
                                        <input type="text" name="txt_email" id="txt_email" class="form-control trans" placeholder="<?=$this->lang->line('recupera_clave_input_correo_electronico_placeholder')?>" pb-role="username" autocomplete="off" >
                                        <div id="error"></div>
                                    </div>
                                </div>
                                <div class="form-group captcha-input">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="captcha"><?=$this->lang->line('login_input_captcha')?> <span data-toggle='tooltip' title='<?=$this->lang->line('login_captcha_tooltip')?>'> <i class="fas fa-question-circle"></i></span></label>
                                            <input type="text" name="txt_captcha" id="txt_captcha" maxlength="8" class="form-control">
                                            <div id="error"></div>
                                        </div>
                                        <div class="col-1">
                                            <div class="captcha-refresh">
                                                <a href="javascript:void(0);" id="refresh_captcha"><i class="fas fa-sync"></i></a>
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
                                    <div class="row">
                                        <div class="col-6 center">
                                            <button type="button" id="btn_envio_mail" class="btn btn-axalta" pb-role="submit"><span class="iconify" data-icon="bx:bx-mail-send"></span> ENVIAR</button>
                                        </div>
                                        <div class="col-6 center">
                                            <a href="<?php echo base_url("login").$this->urlVersionSite ?>"><button type="button" class="btn btn-gray"><?=$this->lang->line('recupera_clave_btn_login')?></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<script>
    $(document).ready(function(){
        $("#frm_recupera_clave").keypress(function(e) { if (e.which == 13) { return false; } });    
        $('#btn_envio_mail').click(function() { recupera_clave_envio(); });
        $('#refresh_captcha').on('click', function(){
            $.get('<?=base_url("login/login/login_refresh_captcha"); ?>', function(data){ $('#captImg').html(data); 
            $('#captcha').val(''); 
        }); 
        });
        /********************************************MSG ERROR******************************************************************************************/
        $('#frm_recupera_clave input').on('keyup', function ()  { js_general_limpiar_errores(this); });
        $('#frm_recupera_clave input').on('click', function ()  { js_general_limpiar_errores(this); });
        $('#frm_recupera_clave select').on('click', function () { js_general_limpiar_errores(this); });  
        $('#frm_recupera_clave input').on('change', function () { js_general_limpiar_errores(this); });
        /**************************************************************************************************************************************/          
    });
    function recupera_clave_envio(){
        $("#btnEnviarEmail").attr('disabled',true);
        $('#loader_panel').show();
        $.ajax({
            type: 	$('#frm_recupera_clave').attr('method'),
            url: 	$('#frm_recupera_clave').attr('action'),
            dataType:   'json',
            data: 	$('#frm_recupera_clave').serialize(),
            success: function(data){
                switch (data.res){
                    case 0:
                        Swal.fire({ icon: 'error', allowOutsideClick:false, text: '<?=$this->lang->line('recupera_clave_msg_captcha_erroneo')?>'});
                        break                    
                    case 1:
                        Swal.fire({
                            title: '',
                            html: '<?=$this->lang->line('recupera_clave_js_msg_text')?>',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#fd7e14',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: '<?=$this->lang->line('recupera_clave_msg_btn_ok')?>',
                            cancelButtonText: ''
                        }).then((validacionaltaparticipante) => {
                            if (validacionaltaparticipante.isConfirmed) {
                                $(location).attr("href","<?=base_url("Login").$this->urlVersionSite?>");
                            } 
                        });                                

                        break
                    default:
                        $.each(data, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key).parents('.form-group').find('#error').html(value);
                            $('#txt_captcha').focus();
                        });
                        break;
                }
            },
            error: function(){ },
            complete: function(){  $("#btnEnviarEmail").attr('disabled',false); $('#loader_panel').hide(); }
        });
    }       
</script>