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
    <a class="dropdown-item" href="<?php echo base_url("CortesVentasPromociones").$this->urlVersionSite ?>">
        <button type="button" class="btn btn-gray">
            <?=$this->lang->line('menu_submenu_cortes_promociones')?>
        </button>    
    </a>
</div>
<div class="col-lg-3">
    <a class="dropdown-item" href="<?php echo base_url("CorteVentasBimestral").$this->urlVersionSite ?>">
        <button type="button" class="btn btn-gray">
            <?=$this->lang->line('menu_submenu_cortes_bimestral')?>
        </button>
    </a>
</div>
