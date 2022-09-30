<?php

/* 
 * Sistema Web Responsivo Club Del Pintor Axalta Guatemala
 * @author	Strategic Solutions S.A. de C.V  * 
 * @programmer  Enrique Arce Rosas  * 
 * @CreateDate 13 abr. 2022 18:25:47 * 
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>


    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item" id="nav_reglas"><a class="nav-link" aria-current="page" href="<?php echo base_url("Reglas").$this->urlVersionSite ?>"><?=$this->lang->line('menu_reglas')?></a></li>            
        <li class="nav-item" id="nav_productos"><a class="nav-link" aria-current="page" href="<?php echo base_url("Productos").$this->urlVersionSite ?>"><?=$this->lang->line('menu_productos')?></a></li>           
        <li class="nav-item dropdown" id="nav_catalogos">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$this->lang->line('menu_admin')?></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="<?php echo base_url("Distribuidores").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_admin_distribuidores')?></a></li> 
                <li><a class="dropdown-item" href="<?php echo base_url("Participantes").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_admin_usuarios')?></a></li>
                <li><a class="dropdown-item" href="<?php echo base_url("Recompensas").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_admin_recompensas')?></a></li>
                <li><a class="dropdown-item" href="<?php echo base_url("CargaProductosPremios").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_admin_reposicion_prodcutos')?></a></li>
                <li><a class="dropdown-item" href="<?php echo base_url("CargaPromociones").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_admin_carga_promociones')?></a></li>
            </ul>
        </li>          
        <li class="nav-item dropdown" id="nav_catalogos">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$this->lang->line('menu_reportes')?></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="<?php echo base_url("ReporteVentas").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_reportes_ventas')?></a></li> 
                <li><a class="dropdown-item" href="<?php echo base_url("ReporteDistribuidores").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_reportes_distribuidoras')?></a></li>
                <li><a class="dropdown-item" href="<?php echo base_url("ReporteMaestrosPintores").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_reportes_maestros_pintores')?></a></li>
                <li><a class="dropdown-item" href="<?php echo base_url("ReporteReposicionProductos").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_reportes_reposicion_productos')?></a></li> 
                <li><a class="dropdown-item" href="<?php echo base_url("ReporteAcumuladoReposicionProducto").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_reportes_acumulado_reposicion_productos')?></a></li> 
                <li><a class="dropdown-item" href="<?php echo base_url("ReportePersonalTienda").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_reportes_personal_tienda')?></a></li> 
                <li><a class="dropdown-item" href="<?php echo base_url("ReporteProductosRegistrados").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_reportes_productos_registrados')?></a></li> 
                <li><a class="dropdown-item" href="<?php echo base_url("ReporteGanadores").$this->urlVersionSite ?>"><?=$this->lang->line('menu_submenu_reportes_ventas_ganadores')?></a></li>
            </ul>
        </li> 
        <li class="nav-item" id="nav_redes_sociales"><a class="nav-link" href="<?php echo base_url("NoticiasCirculares").$this->urlVersionSite ?>"><?=$this->lang->line('menu_noticias_circulares')?></a></li> 
        <li class="nav-item" id="nav_tutoriales"><a class="nav-link" aria-current="page" href="<?php echo base_url("Tutoriales").$this->urlVersionSite ?>"><?=$this->lang->line('menu_tutoriales')?></a></li>   
        <li class="nav-item" id="nav_contacto"><a class="nav-link" aria-current="page" href="<?php echo base_url("Contacto").$this->urlVersionSite ?>"><?=$this->lang->line('menu_contacto')?></a></li>     
      </ul>
    </div>
