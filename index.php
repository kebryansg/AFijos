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
                    <?php
                    //include_once './mvc/views/Pedido/ordenPedido.php';
                    //include_once './mvc/views/Administracion/modulo.php';
//                    include_once './mvc/views/Administracion/Submodulo.php';
                    //include_once './mvc/views/activos/grupos.php';
                    //include_once './mvc/views/Compras/GenerarOrdenCompra.php';
                    //include_once './mvc/views/Administracion/faIcons.php';
                    ?>
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
            $("#containPages").load("mvc/views/administracion/submodulo.php");
//            
//            dt = {
//                url: getURL("_administracion"),
//                data: {
//                    accion: "list",
//                    op: "Menu"
//                }
//            };
//            dts = getJson(dt);
//            console.log(dts);
//            console.log(JSON.parse(dts[0].submodulos));

        </script>
    </body>
</html>
