<!DOCTYPE html>
<html>
    <head>
        <!-- HEADER -->
        <?php require_once('mvc/views/header.php'); ?>
        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <?php require_once('mvc/views/scripts.php'); ?>

    </head>
    <body class="hold-transition fixed skin-blue sidebar-mini">
        <div class="wrapper">

            <?php require_once('mvc/views/navbar.php'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" >
                <section class="content-header">
                    <h1 title-contenido>
                        
                    </h1>
                    <hr class="style8">
                </section>
                <section class="content container-fluid" id="containPages">
                    <?php
                    include_once './mvc/views/Pedido/aprobacionPedido.php';
                    //include_once './mvc/views/items/items.php';
                    //include_once './components.php';
                    //include_once './mvc/views/Administracion/faIcons.php';
                    ?>
                </section>
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    UI Life
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2018.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <?php 
        require_once('mvc/views/modal.php'); 
        ?>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. -->
    </body>
</html>