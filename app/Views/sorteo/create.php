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
                        <form action="<?=base_url();?>/sorteo/store" method="POST">
                            <input type="hidden" name="idCreador" value="<?=$usuario["id"]?>">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input class="form-control" name="nombre"/>
                            </div>

                            <div class="form-group">
                                <label>Fecha del Sorteo:</label>
                                <input type="date" class="form-control" name="fechaSorteo"/>
                            </div>

                            <div class="form-group">
                                <label>Precio del Boleto:</label>
                                <input class="form-control" name="precioBoleto"/>
                            </div>

                            <div class="form-group">
                                <label>Premio:</label>
                                <input class="form-control" name="premio"/>
                            </div>

                            <div class="form-group">
                                <label>Descripción:</label>
                                <input class="form-control" name="descripcion"/>
                            </div>

                            <div class="form-group">
                                <label>Cantidad de Boletos:</label>
                                <select class="form-control" name="cantidadBoletos">
                                    <option value="10">10 Boletos</option>
                                    <option value="100">100 Boletos</option>
                                    <option value="1000">1000 Boletos</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Imagen:</label>
                                <input class="form-control" name="imagen"/>
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