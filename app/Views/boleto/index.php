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
                <h1 class="page-header">Tabla Boletos</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Boletos
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive" style="margin-top: 15px">

                            <!-- tabla aquí -->
                            <table class="table table-striped table-bordered table-hover" id="tabla">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10%">No. Boleto</th>
                                        <th scope="col">nombre sorteo</th>
                                        <th scope="col">numero de boleto</th>
                                        <th scope="col">sorteo</th>
                                        <th scope="col">fecha realizacion</th>
                                        <th scope="col">pagado</th>
                                        <th scope="col" style="width: 5%;">acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($boletos as $boleto) {
                                        ?>

                                    <tr>
                                        <th scope="row">
                                            <?=$boleto->numero_boleto?>
                                        </th>
                                        <td>
                                            <?=$boleto->nombre_sorteo?>
                                        </td>
                                        <td>
                                            <?=$boleto->numero_boleto?>
                                        </td>
                                        <td>
                                            <?=$boleto->nombre_sorteo?>
                                        </td>
                                        <td>
                                            <?=$boleto->fecha_sorteo?>
                                        </td>
                                        <td>
                                            <?=$boleto->estado_pago=="PAGADO" ? "SI" : "NO"?>

                                        <td>
                                        <a onclick="eliminar(<?=$boleto->id_boleto?>)" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>
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

            location.href = "<?base_url()?>/sorteo/delete/" + id;
        }
    })
}
</script>
<!-- DataTables JavaScript -->
<script src="../js/dataTables/jquery.dataTables.min.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Sweet Alert 2 JavaScript-->
<script src="../js/sweetalert2.js"></script>

<?= $this->endSection() ?>