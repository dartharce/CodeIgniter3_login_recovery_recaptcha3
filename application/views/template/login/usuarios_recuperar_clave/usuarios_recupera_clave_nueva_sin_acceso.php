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
                            <div class="animate__animated animate__zoomIn">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2><?=$this->lang->line('recupera_clave_titulo_crea_clave')?></h2>
                                            <p><?=$this->lang->line('recupera_clave_msg_acceso_denegado')?></p>
                                        </div>                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="botones">
                                                <a href="<?php echo base_url("login").$this->urlVersionSite ?>"><button type="button" class="btn btn-axalta"><?=$this->lang->line('recupera_clave_btn_login')?></button></a>
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
    </div>
</section>