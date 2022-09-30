<form action="<?= base_url('usuarios/usuarios_crea_clave/usuarios_crea_clave_controller/usuarios_crea_clave_controller_clave_nueva')?>" id="frm_usuarios_crea_clave" role="form" method="post" accept-charset="utf-8">
    <?=$token;?>
    <section id="asignaclave">
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
            <div class="col-lg-6">
                <div class="form-login">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-section">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2><?=$this->lang->line('usuarios_crea_clave_titulo')?></h2>
                                        </div>                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-recovery animate__animated animate__zoomIn" id="axa-form">
                                                <p><?=$this->lang->line('usuarios_crea_clave_instrucciones')?></p>  
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                                        <input type="password" class="form-control trans" name="clave_nueva" value="" id="clave_nueva" placeholder='<?=$this->lang->line('usuarios_crea_clave_input_clave_nueva_placeholder')?>' aria-describedby="basic-addon1">
                                                        <i class="far fa-eye-slash seepwd" id="eyeclave1"></i>
                                                    </div>
                                                    <p id="error"></p>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                                        <input type="password" name="clave_nueva_confirma" value="" id="clave_nueva_confirma" class="form-control trans" placeholder="<?=$this->lang->line('usuarios_crea_clave_input_clave_nueva_confirma_placeholder')?>" pb-role="clave_nueva_confirma">
                                                        <i class="far fa-eye-slash seepwd" id="eyeclave2"></i>
                                                    </div>
                                                    <p id="error"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="botones animate__animated animate__zoomIn">
                                                <button type="button" id="button_crea_clave" class="btn btn-axalta btn-lg" pb-role="submit"><?=$this->lang->line('usuarios_crea_clave_msg_btn_guardar')?></button>
                                            </div>
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
        $("#frm_usuarios_crea_clave").keypress(function(e) { if (e.which == 13) { return false; } });
        $('#button_crea_clave').click(function() { usuarios_crea_clave_nueva_clave(); });
        $("#eyeclave1").click(function(){
        if($("#clave_nueva").prop('type')=='text'){
            $("#clave_nueva").prop('type','password');
            $("#eyeclave1").removeClass("fa-eye");
            $("#eyeclave1").addClass("fa-eye-slash");
        }else{
            $("#clave_nueva").prop('type','text');
            $("#eyeclave1").removeClass("fa-eye-slash");
            $("#eyeclave1").addClass("fa-eye");
            }
        })
        $("#eyeclave2").click(function(){
            if($("#clave_nueva_confirma").prop('type')=='text'){
                $("#clave_nueva_confirma").prop('type','password');
                $("#eyeclave2").removeClass("fa-eye");
                $("#eyeclave2").addClass("fa-eye-slash");
            }else{
                $("#clave_nueva_confirma").prop('type','text');
                $("#eyeclave2").removeClass("fa-eye-slash");
                $("#eyeclave2").addClass("fa-eye");
            }
        });
        /********************************************MSG ERROR******************************************************************************************/
        $('#frm_usuarios_crea_clave input').on('keyup', function ()  { js_general_limpiar_errores(this); });
        $('#frm_usuarios_crea_clave input').on('click', function ()  { js_general_limpiar_errores(this); });
        $('#frm_usuarios_crea_clave select').on('click', function () { js_general_limpiar_errores(this); });  
        $('#frm_usuarios_crea_clave input').on('change', function () { js_general_limpiar_errores(this); });
        /**************************************************************************************************************************************/         
    });
    function usuarios_crea_clave_nueva_clave(){
        var clave_nueva = $("#clave_nueva").val();
        var clave_nueva_confirma = $("#clave_nueva_confirma").val();
        var ssfvr = getQueryVariable("ssfvr");
        // CSRF Hash
        var csrfName = $('#csrf_test_name').attr('name'); // Value specified in $config['csrf_token_name']
        var csrfHash = $('#csrf_test_name').val(); // CSRF hash
        $.ajax({
            type: 	$('#frm_usuarios_crea_clave').attr('method'),
            url: 	$('#frm_usuarios_crea_clave').attr('action'),
            dataType:   'json',
            data: 	{clave_nueva:clave_nueva,clave_nueva_confirma:clave_nueva_confirma,ssfvr:ssfvr,[csrfName]: csrfHash},
            success: function(data){
                switch (data){
                case 0:
                    $('#clave_nueva').focus();
                        Swal.fire({icon: 'error',title: '',text: '<?=$this->lang->line('usuarios_crea_clave_valida_clave_nueva_confirma_no_concuerdan')?>'});
                    break;
                case 1:
                    Swal.fire({
                        title: '',
                        html: '<?=$this->lang->line('usuarios_crea_clave_actualizada')?>',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#fd7e14',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: '<?=$this->lang->line('usuarios_crea_clave_msg_btn_ok')?>',
                        cancelButtonText: ''
                    }).then((validacionaltaparticipante) => {
                        if (validacionaltaparticipante.isConfirmed) {
                            $(location).attr("href","<?=base_url("Login").$this->urlVersionSite?>");
                        } 
                    });  
                    break;
                default:
                    $.each(data, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key).parents('.form-group').find('#error').html(value);                        
                    });
                    break;                    
                }
            },
            error: function(data){
            console.log(data);
            },
            complete: function(){ }
        });
    }
        function getQueryVariable(variable) {
           var query = window.location.search.substring(1);
           var vars = query.split("&");
           for (var i=0; i < vars.length; i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable) {
                   return pair[1];
               }
           }
           return false;
        }   
</script>