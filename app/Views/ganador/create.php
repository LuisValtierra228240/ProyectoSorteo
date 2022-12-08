<?= $this->extend('plantilla/layout') ?>

<?= $this->section('content') ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Creación de Sorteo</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Nuevo Sorteo
                    </div>
                    <div class="panel-body">
        
                        <!--Formulario aquí-->
                        <form action="<?=base_url();?>/ganador/store/<?=$sorteo["id"];?>" method="POST">
                            <div class="form-group">
                                <label>Seleccione el Boleto Ganador:</label>
                                <select class="form-control" name="idGanador">
                                    <?php
                                    $boletosPagados = array();
                                    foreach($boletos as $boleto){
                                        if($boleto->estado_pago=="PAGADO"){
                                            $boletosPagados[] = $boleto->numero_boleto;
                                        }
                                    }
                                    for($i = 1; $i <= $sorteo["cantidadBoletos"]; $i++){
                                        if(in_array( $i, $boletosPagados)){
                                    ?>
                                    <option value="<?=$boleto->id_usuario?>">Boleto <?=$i?></option>
                                    <?php
                                        }
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