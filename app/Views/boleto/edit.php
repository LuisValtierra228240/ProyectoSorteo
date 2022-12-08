<?= $this->extend('plantilla/layout') ?>

<?= $this->section('content') ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Compra de Boleto</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Nuevo Boleto
                    </div>
                    <div class="panel-body">
                        <!--Formulario aquí-->
                        <form action="<?=base_url();?>/boleto/update/<?=$boleto->id_boleto;?>" method="POST">
                        <input type="hidden" name="id_sorteo" value="<?=$boleto->sorteo_id?>">
                        <input type="hidden" name="id_usuario" value="<?=$boleto->id_usuario?>">
                            <div class="form-group">
                                <label>Boleto:</label>
                                <select class="form-control" name="numero_boleto">
                                <option selected value="<?=$boleto->numero_boleto?>">Boleto Actual: <?=$boleto->numero_boleto?></option>
                                    <?php
                                    $boletosExistentes = array();
                                    foreach($boletos as $num){
                                        $boletosExistentes[] = $num->numero_boleto;
                                    }
                                    for($i = 1; $i <= $num->cantidad_boletos_sorteo; $i++){
                                        if(!in_array( $i, $boletosExistentes)){
                                    ?>
                                    <option value="<?=$i?>">Boleto <?=$i?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Estado del Pago:</label>
                                <select class="form-control" name="estado_pago">
                                    <?php
                                    if($boleto->estado_pago == "PAGADO") {
                                    ?>

                                    <option selected value="PAGADO">Boleto Pagado</option>
                                    <option value="NO PAGADO">Boleto no Pagado</option>>
                                    <?php
                                    } else {
                                    ?>
                                    <option value="PAGADO">Boleto Pagado</option>
                                    <option selected value="NO PAGADO">Boleto no Pagado</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
        
                            <button class="btn btn-success" type="submit">Guardar</button>
        
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>