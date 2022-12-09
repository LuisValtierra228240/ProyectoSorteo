<?= $this->extend('plantilla/layout') ?>

<?= $this->section('css') ?>

<!-- DataTables CSS -->
<link href="<?=base_url()?>/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?=base_url()?>/css/dataTables/dataTables.responsive.css" rel="stylesheet">

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
                        <a href="<?=base_url()?>/sorteo/create" class="btn btn-primary">Agregar nuevo</a>
                        <a href="<?=base_url()?>/ganador" class="btn btn-success">Ver todos los Ganadores</a>
                        <div class="table-responsive" style="margin-top: 15px">

                            <!-- tabla aquí -->
                            <table class="table table-striped table-bordered table-hover" id="tabla">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 5%">id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Ganador</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Premio</th>
                                        <th scope="col">Boletos</th>
                                        <th scope="col" style="width: 12%">Acciones</th>
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
                                            <?=$sorteo["nombre"]?>
                                        </td>
                                        <td>
                                            <?=($sorteo["idGanador"] != "") ? $sorteo["nombreGanador"] : "Sin ganador"?>
                                        </td>
                                        <td>
                                            <?=$sorteo["fechaSorteo"]?>
                                        </td>
                                        <td>
                                            $<?=$sorteo["precioBoleto"]?>
                                        </td>
                                        <td>
                                            $<?=$sorteo["premio"]?>
                                        </td>
                                        <td>
                                            <?=$sorteo["cantidadBoletos"]?>
                                        </td>
                                        <td>
                                            <a href="/sorteo/show/<?=$sorteo['id']?>" class="btn btn-primary btn-circle"><i class="fa fa-eye"></i></a>
                                            <?php
                                            if($usuario["id"] == $sorteo["idCreador"]) {
                                            ?>
                                            <a href="/sorteo/edit/<?=$sorteo['id']?>" class="btn btn-success btn-circle"><i class="fa fa-pencil"></i></a>
                                            <a onclick="eliminar(<?=$sorteo['id']?>)" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>
                                            <?php
                                            }
                                            ?>
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
            "language": {
                "sUrl": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-MX.json"
            }
        });
    });
</script>

<script>
    function eliminar(id) {
    Swal.fire({
        title: '¿Está seguro que desea eliminar el registro?',
        text: "¡Se eliminará permanentemente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {

            location.href = "/sorteo/delete/" + id;
        }
    })
}
</script>
<!-- DataTables JavaScript -->
<script src="<?=base_url()?>/js/dataTables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Sweet Alert 2 JavaScript-->
<script src="<?=base_url()?>/js/sweetalert2.js"></script>

<?= $this->endSection() ?>