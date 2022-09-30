<!DOCTYPE html>
<html>
<head>
    <title>Google Recaptcha Code in Codeigniter 3 - ItSolutionStuff.com</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://www.google.com/recaptcha/api.js?render=<?=$this->config->item('google_key')?>"></script>   
</head>
<body>
  
<div class="container">
    <div class="card">
        <div class="card-header">
            Google Recaptcha Code in Codeigniter 3 - ItSolutionStuff.com
        </div>
        <div class="card-body">
            <form action="http://localhost/CodesCodeigniter/recaptcha/index.php/FormController/formPost" method="POST" enctype="multipart/form-data" id="frm_recaptcha">
                <div class="text-danger"><strong><?=$this->session->flashdata('flashError')?></strong></div>
   
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
  
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>                    
                <br/>
                <button type="button" id="entrar" class="btn btn-primary">LOGIN</button> 
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#entrar").click(function(){ 
            grecaptcha.ready(function() {
                grecaptcha.execute('<?=$this->config->item('google_key')?>', { action: 'frm_recaptcha'}).then(function(token) {
                    // Add your logic to submit to your backend server here.
                    $.ajax({
                        type: 'POST',
                        url: 'formController/autentica',
                        dataType: 'json',
                        data : {token: token},	
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
    });
</script>
</body> 
</html>