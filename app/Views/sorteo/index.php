<?= $this->extend('plantilla/layout') ?>

<?= $this->section('css') ?>

<!-- DataTables CSS -->
<link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tabla Sorteos</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sorteos
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">

                            <!-- tabla aquí -->
                            <table class="table table-striped table-bordered table-hover" id="tabla">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 5%">id</th>
                                        <th scope="col">idGanador</th>
                                        <th scope="col">fechaSorteo</th>
                                        <th scope="col">fechaCreacion</th>
                                        <th scope="col">precioBoleto</th>
                                        <th scope="col">premio</th>
                                        <th scope="col">descripcion</th>
                                        <th scope="col">idCreador</th>
                                        <th scope="col">cantidadBoletos</th>
                                        <!-- <th scope="col" style="width: 5%">Acciones</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($sorteos as $sorteo) {
                                        ?>

                                    <tr>
                                        <th scope="row">
                                            <?=$sorteo["id"]?>
                                        </th>
                                        <td>
                                            <?=$sorteo["idGanador"]?>
                                        </td>
                                        <td>
                                            <?=$sorteo["fechaSorteo"]?>
                                        </td>
                                        <td>
                                            <?=$sorteo["fechaCreacion"]?>
                                        </td>
                                        <td>
                                            <?=$sorteo["precioBoleto"]?>
                                        </td>
                                        <td>
                                            <?=$sorteo["premio"]?>
                                        </td>
                                        <td>
                                            <?=$sorteo["descripcion"]?>
                                        </td>
                                        <td>
                                            <?=$sorteo["idCreador"]?>
                                        </td>
                                        <td>
                                            <?=$sorteo["cantidadBoletos"]?>
                                        </td>
                                    </tr>

                                    <?php
                                        }
                                        ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->



<?= $this->endSection() ?>

<?= $this->section('js') ?>

<script>
    $(document).ready(function () {
        $('#tabla').DataTable({
            "oLanguage": {
                "sUrl": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
            }
        });
    });
</script>

<!-- DataTables JavaScript -->
<script src="../js/dataTables/jquery.dataTables.min.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

<?= $this->endSection() ?>