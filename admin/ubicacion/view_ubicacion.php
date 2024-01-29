<?php

require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `localizacion` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
	<dl>
        <dt class="text-muted">Ciudad</dt>
        <dd class="pl-4"><?= isset($ciudad) ? $ciudad : "" ?></dd>
        <dt class="text-muted">Ubicación</dt>
        <dd class="pl-4"><?= isset($ubicacion) ? $ubicacion : '' ?></dd>
        <dt class="text-muted">Zona</dt>
        <dd class="pl-4"><?= isset($zona) ? $zona : '' ?></dd>
    </dl>
    <div class="clear-fix my-3"></div>
    <div class="text-right">
        <button class="btn btn-sm btn-dark bg-danger btn-flat" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
    </div>
</div>