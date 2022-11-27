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
                <h1 class="page-header">Tabla Usuarios</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Usuarios
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">

                            <!-- tabla aquí -->
                            <table class="table table-striped table-bordered table-hover" id="tablausuario">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contraseña</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($usuarios as $usuario) {
                                        ?>

                                    <tr>
                                        <th scope="row">
                                            <?=$usuario["id"]?>
                                        </th>
                                        <td>
                                            <?=$usuario["nombre"]?>
                                            <?=$usuario["apellidoPaterno"]?>
                                            <?=$usuario["apellidoMaterno"]?>
                                        </td>
                                        <td>
                                            <?=$usuario["telefono"]?>
                                        </td>
                                        <td>
                                            <?=$usuario["direccion"]?>
                                        </td>
                                        <td>
                                            <?=$usuario["email"]?>
                                        </td>
                                        <td>
                                            <?=$usuario["contrasena"]?>
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
        $('#tablausuario').DataTable();
    });
</script>

<!-- DataTables JavaScript -->
<script src="../js/dataTables/jquery.dataTables.min.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

<?= $this->endSection() ?>