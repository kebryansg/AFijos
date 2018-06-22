<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
}

$user = $_SESSION["login"]["user"];

require_once "init.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- HEADER -->
        <?php require_once('mvc/views/header.php'); ?>
        <!-- Google Font -->
        <!--href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->

        <?php require_once('mvc/views/scripts.php'); ?>

    </head>
    <!--<body class="hold-transition fixed skin-blue sidebar-mini sidebar-collapse">-->
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <div class="wrapper">

            <?php require_once('mvc/views/navbar.php'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" >
                <section class="content-header">
                    <h1 title-contenido>

                    </h1>
                    <!--<hr class="style8">-->
                </section>
                <section class="content container-fluid" id="containPages">
                </section>
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <strong>BuhoCorp</strong>
                </div>
                <strong>Copyright &copy; 2018.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <?php
        require_once('mvc/views/modal.php');
        ?>

        <script type="text/javascript">
            //$("#containPages").load("mvc/views/Inventario/RegistroFactura.php");
//            $("#containPages").load("mvc/views/Autorizacion/BodegaUsuario.php");
            //$("#containPages").load("mvc/views/Administracion/UsuarioDepartemento.php");
            //$("#containPages").load("mvc/views/Administracion/usuarios.php");
        </script>
    </body>
</html>
