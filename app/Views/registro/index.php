<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->

    <!-- Custom CSS -->
    <link href="<?=base_url()?>/css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Crear cuenta</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?=base_url()?>/registro/registrar">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nombre completo" name="nombre_completo" type="text" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Correo" name="correo" type="email" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Introducir nueva contraseña" name="contra" required type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block">Crear cuenta</button>
                            </fieldset>
                            <hr />
                            <a href="/Login/">¿Ya tienes cuenta?</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
