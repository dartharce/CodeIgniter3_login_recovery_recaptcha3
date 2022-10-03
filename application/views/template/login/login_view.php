<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

 <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <form class="bg-white rounded shadow-5-strong p-5">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form1Example1" class="form-control" />
                  <label class="form-label" for="form1Example1">User</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form1Example2" class="form-control" />
                  <label class="form-label" for="form1Example2">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" id="rememberme" />
                      <label class="form-check-label" for="form1Example3">
                        Remember me
                      </label>
                    </div>
                  </div>

                  <div class="col text-center">
                    <!-- Simple link -->
                    <a href="#!" id="Forgot">Forgot password?</a>
                  </div>
                </div>

                <!-- Submit button -->
                <button type="button" class="btn btn-primary btn-block" id="btn_login" >Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
 <script>
    $(document).ready(function(){
        $("#btn_login").click(function(){ 
            grecaptcha.ready(function() {
                grecaptcha.execute('<?=$this->config->item('google_key')?>', { action: '<?=$frm_action?>'}).then(function(token) {
                    // Add your logic to submit to your backend server here.
                    var frm_action = '<?=$frm_action?>';
                    var rememberme = $("#rememberme:checked").val();
                    $.ajax({
                        type: 'POST',
                        url: 'autenticacion/autenticacion_controller',
                        dataType: 'json',
                        data : {token: token,action:frm_action,rememberme:rememberme},	
                        success: function(data){
                            console.log(data);
                        },
                        error: function(){
                                //Code
                        },
                        complete: function(){
                                //Code
                        }
                    });                     
                });
            });
        });
        $("#Forgot").click(function(){
            $.ajax({
                type: 'POST',
                url: 'autenticacion/autenticacion_controller/verifica',
                dataType: 'json',
                data : {id:1},	
                success: function(data){
                    console.log(data);
                },
                error: function(){
                        //Code
                },
                complete: function(){
                        //Code
                }
            });   
        });
    });
</script>