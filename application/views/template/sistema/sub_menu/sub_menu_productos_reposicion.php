<?php

/* 
 * Sistema Web Responsivo Club Del Pintor Axalta Guatemala
 * @author	Strategic Solutions S.A. de C.V  * 
 * @programmer  Enrique Arce Rosas  * 
 * @CreateDate 15 jun. 2022 16:59:17 * 
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-lg-3">
    <a class="dropdown-item" href="<?php echo base_url("CargaProductosPremios").$this->urlVersionSite ?>">
        <button type="button" class="btn btn-gray">
            <?=$this->lang->line('menu_submenu_reposicion_prodcutos_premios_productros')?>
        </button>    
    </a>
</div>
<div class="col-lg-3">
    <a class="dropdown-item" href="<?php echo base_url("RelacionPremiosProductos").$this->urlVersionSite ?>">
        <button type="button" class="btn btn-gray">
            <?=$this->lang->line('menu_submenu_reposicion_prodcutos_premios_relacion')?>
        </button>
    </a>
</div>
<div class="col-lg-3">
    <a class="dropdown-item" href="<?php echo base_url("GanadoresVentas").$this->urlVersionSite ?>">
        <button type="button" class="btn btn-gray"><?=$this->lang->line('menu_submenu_reposicion_prodcutos_generacion_ganadores')?>
        </button>
    </a>
</div>
<div class="col-lg-3">
    <a class="dropdown-item" href="<?php echo base_url("DescargaReposicionProductos").$this->urlVersionSite ?>">
        <button type="button" class="btn btn-gray"><?=$this->lang->line('menu_submenu_admin_reposicion_prodcutos_descarga')?>
        </button>
    </a>
</div>