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
                <h1 class="page-header">Tabla Ganadores</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ganadores
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">

                            <!-- tabla aquí -->
                            <table class="table table-striped table-bordered table-hover" id="tabla">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre del Ganador</th>
                                        <th scope="col">Sorteo Ganado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($sorteos as $sorteo) {
                                        ?>

                                    <tr>
                                        <td>
                                            <?=$sorteo["nombreGanador"]?>
                                        </td>
                                        <td>
                                            <?=$sorteo["nombre"]?>
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