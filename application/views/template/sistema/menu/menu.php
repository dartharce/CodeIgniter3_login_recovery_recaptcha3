<?php

/* 
 * Sistema Web Responsivo Club Del Pintor Axalta Guatemala
 * @author	Strategic Solutions S.A. de C.V  * 
 * @programmer  Enrique Arce Rosas  * 
 * @CreateDate 13 abr. 2022 18:25:47 * 
 */
?>
<div class="menuprincipal">
<div class="main-menu">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="logo">
          <a href="<?php echo base_url("Inicio").$this->urlVersionSite ?>"><img src="<?=base_url('application/views/template/sistema/imagenes/logo.png')?>" alt="" class="logoAxalta"></a>
          <a href="<?php echo base_url("Inicio").$this->urlVersionSite ?>"><img src="<?=base_url('application/views/template/sistema/imagenes/logoCDP.png')?>" alt="" class="logoCDP"></a>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="perfil-desktop" style="text-align:center !important;">
          <h2 class="dropdown" id="menuPerfil">
            <a class="dropdown-toggle" href="#" id="navbarDropdownMenuPerfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user"></i> <?=$usuario_nombre?><br><?=$perfil_nombre?>
            </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuPerfil" >
                    <li><a class="dropdown-item" href="<?php echo base_url("ActualizarDatos").$this->urlVersionSite ?>"><i class="far fa-user"></i> <?=$this->lang->line('menu_actualizar_datos')?></a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url("Construccion").$this->urlVersionSite ?>"><i class="far fa-envelope"></i> <?=$this->lang->line('menu_mis_mensajes')?></a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url("TerminosCondicionesAviso").$this->urlVersionSite ?>"><i class="fas fa-user-cog"></i> <?=$this->lang->line('menu_legal')?></a></li>
                </ul>
          </h2>
        </div>
      </div>
      <div class="col-lg-1"  id="menuCampana">
        <div class="perfil-desktop">
          <div class="notificaciones">
            <a class="nav-link" href="Construccion"><i class="fas fa-bell"></i></a>
            </div>
          </div>
      </div>
      <div class="col-lg-1">
        <div class="salir-desktop">
          <h3><a  href="logout">SALIR <i class="fas fa-sign-out-alt"></i></a></h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="menu" id="menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="menu-responsive">
      <div class="row">
        <div class="col-6">
          <div class="perfil-resp">
            <a class="dropdown-toggle" href="#" id="navbarDropdownMenuPerfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?=$usuario_nombre?><br><?=$perfil_nombre?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuPerfil">
              <li><a class="dropdown-item" href="<?php echo base_url("ActualizarDatos").$this->urlVersionSite ?>"><i class="far fa-user"></i> <?=$this->lang->line('menu_actualizar_datos')?></a></li>
              <li><a class="dropdown-item" href="<?php echo base_url("Construccion").$this->urlVersionSite ?>"><i class="far fa-envelope"></i> <?=$this->lang->line('menu_mis_mensajes')?></a></li>
              <li><a class="dropdown-item" href="<?php echo base_url("TerminosCondicionesAviso").$this->urlVersionSite ?>"><i class="fas fa-user-cog"></i> <?=$this->lang->line('menu_legal')?></a></li>
            </ul>
          </div>
        </div>
        <div class="col-2">
          <div class="notif-resp">
            <a class="nav-link" href="Construccion"><i class="fas fa-bell"></i></a>
          </div>
        </div>
        <div class="col-3">
          <div class="salir-resp">
            <a  href="logout">Salir <i class="fas fa-sign-out-alt"></i></a>
          </div>
        </div>
        <div class="col-1">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="text-align:right;">
              <i class="fas fa-bars"></i>
            </button>        
          </div>
        </div>
      </div>            
      </div>
      <?=$menu?>           
    </nav>
</div>
</div>
<script>
  $(document).ready(function(){
    var terminos = '<?=$menu_hide?>'; 
    if (terminos==1){ $("#menuPerfil").show(); $("#menu").show(); $("#menuCampana").show();  } else { $("#menuPerfil").hide(); $("#menu").hide();$("#menuCampana").hide(); }
    var pathname = $(location).attr('pathname');
    var res = pathname.split("/");
    if(res[2]=="AuditoriaFerreterasExt"){
      $("#nav_inicio").removeClass("active");
      $("#nav_auditorias").addClass("active");
    }
    if(res[2]=="Ferreterias" || res[2]=="Ferreteriasaltas"|| res[2]=="Ferreteriasmodificaciones" || res[2]=="Participantes"){
      $("#nav_auditorias").removeClass("active");
      $("#nav_inicio").removeClass("active");
      $("#nav_admin").addClass("active"); 
    }
    if(res[2]=="RpFerreteriasInscritas"){
      $("#nav_auditorias").removeClass("active");
      $("#nav_inicio").removeClass("active");
      $("#nav_ferreterias").removeClass("active");
      $("#nav_reportes").addClass("active");
    }
    if(res[2]=="Contacto"){
      $("#nav_auditorias").removeClass("active");
      $("#nav_inicio").removeClass("active");
      $("#nav_ferreterias").removeClass("active");
      $("#nav_reportes").removeClass("active");
      $("#nav_contacto").addClass("active");
    }
    if(res[2]=="RedesSociales"){
      $("#nav_auditorias").removeClass("active");
      $("#nav_inicio").removeClass("active");
      $("#nav_ferreterias").removeClass("active");
      $("#nav_reportes").removeClass("active");
      $("#nav_contacto").removeClass("active");
      $("#nav_redes_sociales").addClass("active");
    }
    if(res[2]=="Inicio" || res[2]==""){
      $("#nav_auditorias").removeClass("active");
      $("#nav_redes_sociales").removeClass("active");
      $("#nav_ferreterias").removeClass("active");
      $("#nav_reportes").removeClass("active");
      $("#nav_contacto").removeClass("active");
      $("#nav_inicio").addClass("active");
    }
    if(res[2]=="Reglas" || res[2]==""){
      $("#nav_auditorias").removeClass("active");
      $("#nav_redes_sociales").removeClass("active");
      $("#nav_ferreterias").removeClass("active");
      $("#nav_reportes").removeClass("active");
      $("#nav_contacto").removeClass("active");
      $("#nav_inicio").removeClass("active");
      $("#nav_reglas").addClass("active");
    }
  });
</script>
<div class="maincontent">
