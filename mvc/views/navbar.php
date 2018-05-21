<?php
//session_start();
$user = $_SESSION["login"]["user"];
$user["persona"] = json_decode($user["persona"], true);
$user["rol"] = json_decode($user["rol"], true);
$user["departamento"] = json_decode($user["departamento"], true);
?>
<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>NT</span>
        <!-- logo for regular state and mobile devices -->
        <!--<span class="logo-lg"><b>Brau</b>Pe<b>Comp</b></span>-->
        <span class="logo-lg">AFijos</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <i class="fa fa-align-justify"></i>
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="resource/img/icono-activos-fijos.jpg" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><?php echo $user["persona"]["nombres"]; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="resource/img/icono-activos-fijos.jpg" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $user["rol"]["descripcion"]; ?>
                                <small><?php echo $user["departamento"]["descripcion"]; ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <!--<div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>-->
                            <div class="pull-right">
                                <a href="#" id="cerrarSesion" class="btn btn-default btn-flat">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->

        <div class="user-panel">
            <div class="pull-left image">
                <img src="resource/img/icono-activos-fijos.jpg" class="img-circle" width="160"  alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $user["persona"]["nombres"]; ?></p>
                <a href="#"><?php echo $user["departamento"]["descripcion"]; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <!--        <ul class="sidebar-menu" data-widget="tree">
                    <li class="header" style="display: flex; flex-flow: row wrap;justify-content: space-between;">
                        <span>Navegación Principal</span>
                        <span refreshMenu style="color:#b8c7ce;cursor: pointer;">
                            <i class="fa fa-sync-alt pull-right "></i>
                        </span>
                    </li>
                </ul>-->


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!--<li class="header">Navegación Principal</li>-->
            <li class="header" style="display: flex; flex-flow: row wrap;justify-content: space-between;">
                <span>Navegación Principal</span>
                <span refreshMenu style="color:#b8c7ce;cursor: pointer;">
                    <i class="fa fa-sync-alt pull-right "></i>
                </span>
            </li>


        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>