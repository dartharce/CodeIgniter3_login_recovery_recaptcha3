<?php
/* 
 * Sistema Web Responsivo Club Del Pintor Axalta Guatemala  *
 * @author	Strategic Solutions S.A. de C.V             * 
 * @programmer  Enrique Arce Rosas                          * 
 * @CreateDate 11 abr. 2022 15:31:56                        * 
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="modal fade" id="myModal" role="dialog"></div>
        <div id="modalPopups"></div>
        <script>          
            footer_js_view_modal();
            function footer_js_view_modal(archivo,tipo){
                $.ajax({
                    type: 'POST',
                    url: 'popups/popups_controller/index',
                    dataType: 'json',
                    data: {archivo:archivo,tipo:tipo},
                    success: function(data){
                        $('#modalPopups').html(data.pagina);
                        $.each(data.popupids, function(key, value) {
                            $('#'+value).modal('show');
                        });                          
                    },
                    error: function(data){ },
                    complete: function(){ $('#loader_panel').hide();}
                });
            }
        </script>
	</body>
</html>

