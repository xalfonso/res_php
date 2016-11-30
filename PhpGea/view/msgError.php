<?php if (isset($e)) { ?>
<div id = "idDivMessaje" class="divMessage">
        <div class = "alert alert-danger" id = "alertaMensajeAjax">
            <strong><span id = "alertMessageHeader">Opps!</span></strong> <span id = "alertMessageContent"><?php echo $e->getMessage(); ?></span>
        </div>
    </div>
<?php } else { ?>
    <div id = "idDivMessaje" class="divMessage">
        <div class = "alert alert-danger" id = "alertaMensajeAjax">
            <strong><span id = "alertMessageHeader">Opps!</span></strong> <span id = "alertMessageContent">Ha ocurrido un error</span>
        </div>
    </div>
<?php } ?>


