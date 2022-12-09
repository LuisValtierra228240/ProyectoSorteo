<?= $this->extend('plantilla/layout') ?>

<?= $this->section('content') ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Vista de Sorteo</h1>
            </div>
        </div>

                    <div class="row">                
                        <div class="col-lg-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <center>
                                    <img style="width:95%" src="<?=$sorteo["imagen"]?>">
                                    <h4 style="font-weight: bold">Sorteo: <?=$sorteo["nombre"]?></h4>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li class="list-group-item"><p style="font-weight: bold">Fecha de Creación:</p> <?=$sorteo["fechaCreacion"]?></li>
                                        <li class="list-group-item"><p style="font-weight: bold">Precio del Boleto:</p> $<?=$sorteo["precioBoleto"]?> Pesos</li>
                                        <li class="list-group-item"><p style="font-weight: bold">Premio:</p> $<?=$sorteo["premio"]?> Pesos</li>
                                        <li class="list-group-item"><p style="font-weight: bold">Descripción:</p> <?=$sorteo["descripcion"]?></li>
                                        <li class="list-group-item"><p style="font-weight: bold">Creador:</p> <?=$sorteo["nombreCreador"]?></li>
                                        <?php
                                        if($sorteo["idGanador"] != "") {
                                        ?>  
                                        <li class="list-group-item"><p style="font-weight: bold">Ganador:</p> <?=$sorteo["nombreGanador"]?></li>
                                        <?php
                                        } else {
                                        ?>
                                        <center><a href="<?=base_url()?>/boleto/create/<?=$sorteo['id']?>" class="btn btn-success" style="margin-top:30px">Comprar boleto</a></center>
                                        <?php
                                            if($usuario["id"] == $sorteo["idCreador"]) {
                                            ?>
                                            <center><a href="<?=base_url()?>/ganador/create/<?=$sorteo['id']?>" class="btn btn-warning" style="margin-top:30px">Asignar Ganador</a></center>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                        <center><a href="<?=base_url()?>/boleto/index/<?=$sorteo['id']?>" class="btn btn-primary" style="margin-top:30px">Ver boletos del sorteo</a></center>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

    </div>
</div>

<?= $this->endSection() ?>