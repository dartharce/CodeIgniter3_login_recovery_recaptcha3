<?php
/* 
 * Sistema Web Responsivo Club Del Pintor Axalta Guatemala  *
 * @author	Strategic Solutions S.A. de C.V             * 
 * @programmer  Enrique Arce Rosas                          * 
 * @CreateDate 11 abr. 2022 15:31:56                        * 
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="shortcut icon" href="<?=$site_icon?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?=$site_title?></title> 
        <!-- jquery-3.5.1  --> 
        <script src="<?=base_url("vendors/jquery/jquery-3.5.1.js")?>" type="text/javascript"></script>          
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?=base_url("vendors/bootstrap/bootstrap.min.css")?>"> 
        <script src="<?=base_url("vendors/bootstrap/bootstrap.bundle.min.js")?>" type="text/javascript"></script>   
        <!-- Fontawesome -->
        <link rel="stylesheet" href="<?=base_url("vendors/fontawesome/font-awesome.min.css")?>">  
        <link rel="stylesheet" href="<?=base_url("vendors/fontawesome/css/all.min.css")?>">  
        <link rel="stylesheet" href="<?=base_url("vendors/fontawesome/js/all.min.js")?>">  
        <!-- Bootstrap Date-Picker Plugin -->
        <script src="<?=base_url("vendors/datepicker/bootstrap-datepicker.min.js")?>" type="text/javascript"></script>
        <link href="<?=base_url("vendors/datepicker/bootstrap-datepicker3.css")?>" rel="stylesheet" type="text/css"/>
        <!-- Chart JS -->
        <script src="<?=base_url("vendors/chartjs/chart.js")?>" type="text/javascript"></script>
        <!-- Sweet Alert 2 -->
        <script src="<?=base_url("vendors/sweetalert/sweetalert2.all.min.js")?>" type="text/javascript"></script>
        <script src="<?=base_url("vendors/sweetalert/sweetalert2.min.js")?>" type="text/javascript"></script>
        <link rel="stylesheet" href="<?=base_url("vendors/sweetalert/sweetalert2.min.css")?>"> 
        <!-- Datatables -->
        <script src="<?=base_url('vendors/datatables/datatables.min.js')?>" type="text/javascript"></script>
        <link href="<?=base_url('vendors/datatables/datatables.min.css')?>" rel="stylesheet" type="text/css"/>
        <script src="<?=base_url('vendors/datatables/buttons.html5.js')?>" type="text/javascript"></script>
        <link href="<?=base_url('vendors/datatables/buttons.bootstrap.css')?>" rel="stylesheet" type="text/css"/>
        <script src="<?=base_url('vendors/datatables/pdfmake.min.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('vendors/datatables/dataTables.buttons.min.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('vendors/datatables/vfs_fonts.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('vendors/datatables/buttons.html5.min.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('vendors/datatables/jszip.min.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('vendors/datatables/buttons.html5.styles.min.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('vendors/datatables/buttons.html5.styles.templates.min.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('vendors/datatables/dataTables.responsive.min.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('vendors/datatables/dataTables.rowReorder.min.js')?>" type="text/javascript"></script>
        <!-- Iconify -->
        <script src="<?=base_url("vendors/iconify/iconify.min.js")?>" type="text/javascript"></script>  
        <!-- Stylesheet -->   
        <link rel="stylesheet" href="<?=base_url("application/views/template/sistema/css/styles.css")?>">  
        <!-- Chosen -->
        <link rel="stylesheet" href="<?=base_url("vendors/chosen/chosen.css")?>">
        <link rel="stylesheet" href="<?=base_url("vendors/chosen/docsupport/prism.css")?>">
        <script src="<?=base_url("vendors/chosen/chosen.jquery.js")?>" type="text/javascript"></script>
        <script src="<?=base_url("vendors/chosen/docsupport/prism.js")?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?=base_url("vendors/chosen/docsupport/init.js")?>" type="text/javascript" charset="utf-8"></script>
         <!-- Date RangePicker -->
        <script src="<?=base_url("vendors/daterangepicker/moment.min.js")?>" type="text/javascript"></script>     
        <script src="<?=base_url("vendors/daterangepicker/daterangepicker.js")?>" type="text/javascript"></script>     
        <link rel="stylesheet" href="<?=base_url("vendors/daterangepicker/daterangepicker.css")?>"> 
        <!-- DropZone -->
        <script src="<?=base_url('vendors/dropzone/dropzone.js')?>" type="text/javascript"></script>
        <link href="<?=base_url('vendors/dropzone/dropzone.css')?>" rel="stylesheet"/>
 
    </head>
    <body>
            <div class="row" style="display: none; position: fixed; width: 100%; height: 150%; background-color: #111; z-index: 9999; opacity: .5; margin: -180px 0px 0px 0px; padding-top:-100px;" id='loader_panel'>
                <img src="<?=base_url("application/views/template/sistema/imagenes/cargando.gif")?>" style='width: 400px; height: 400px; margin: auto auto; margin-top:180px;'>
            </div>         
