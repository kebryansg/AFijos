<?php
//$nombres = explode(' ',$_SESSION["nombres"]);
//$apellidos = explode(' ',$_SESSION["apellidos"]);
$Nombres = "Kevin Byran";
$Apellidos = "Suarez Guzman";
$RolNombre = "Administrador";
?>
<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>NT</span>
        <!-- logo for regular state and mobile devices -->
        <!--<span class="logo-lg"><b>Brau</b>Pe<b>Comp</b></span>-->
        <span class="logo-lg">Antares</span>
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
                        <!-- The user image in the navbar-->

                        <img src="resource/img/icono-activos-fijos.jpg" class="user-image" alt="User Image">
                        <!--<img src="resource/Plantilla/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">Kebryan</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="resource/img/icono-activos-fijos.jpg" class="img-circle" alt="User Image">

                            <p>
                                Antares - Admin
                                <!--<small>Member since Nov. 2012</small>-->
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <!--<div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>-->
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Cerrar Sesión</a>
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
                <p>Kebryan</p>
                <!-- Status -->
                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Navegación Principal</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open"></i> <span>Pedidos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right loco"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="mvc/views/Pedido/ordenPedido.php">Orden de Pedidos</a></li>
                    <li><a href="mvc/views/Pedido/aprobacionPedido.php">Aprobación de Pedidos</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-folder-open"></i> <span>Compras</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-folder-open"></i> <span>Catálogo</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="mvc/views/items/proveedor.php"><i class="fa fa-group fa-fw"></i> Proveedor</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="mvc/views/items/presupuesto.php">Presupuesto</a></li>
                    <li><a href="mvc/views/Compras/GenerarOrdenCompra.php">Generar Orden Compra</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-folder-open"></i> <span>Administración</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-folder-open"></i> <span>Catálogo</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="mvc/views/activos/departamento.php"><i class="fa fa-lock fa-fw"></i> Departamento</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="mvc/views/Administracion/rol.php"><i class="fa fa-lock fa-fw"></i> Roles / Permisos</a>
                    </li>
                    <li>
                        <a href="mvc/views/Administracion/modulo.php"><i class="fa fa-group fa-fw"></i> Módulos</a>
                    </li>
                    <li>
                        <a href="mvc/views/Administracion/submodulo.php"><i class="fa fa-group fa-fw"></i> SubMódulos</a>
                    </li>
                    <li>
                        <a href="mvc/views/Administracion/usuarios.php"><i class="fa fa-group fa-fw"></i> Usuarios</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-folder-open"></i> <span>Items</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-folder-open"></i> <span>Catálogo</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="mvc/views/activos/pais.php"><i class="fa fa-lock fa-fw"></i> País</a>
                            </li>
                            <li>
                                <a href="mvc/views/activos/categoria.php"><i class="fa fa-group fa-fw"></i> Categoría</a>
                            </li>
                            <li>
                                <a href="mvc/views/activos/tipoidentificacion.php"><i class="fa fa-group fa-fw"></i> Tipo Identificación</a>
                            </li>
                            <li>
                                <a href="mvc/views/activos/tipoemisor.php"><i class="fa fa-group fa-fw"></i> Tipo Emisor</a>
                            </li>
                            <li>
                                <a href="mvc/views/activos/contribuyente.php"><i class="fa fa-group fa-fw"></i> Contribuyente</a>
                            </li>
                            <li>
                                <a href="mvc/views/activos/grupos.php"><i class="fa fa-group fa-fw"></i> Grupo</a>
                            </li>
                            <li>
                                <a href="mvc/views/activos/subgrupos.php"><i class="fa fa-group fa-fw"></i>Sub Grupo</a>
                            </li>
                            <li>
                                <a href="mvc/views/activos/clases.php"><i class="fa fa-group fa-fw"></i> Clase</a>
                            </li>
                            <li>
                                <a href="mvc/views/activos/clasificacion.php"><i class="fa fa-group fa-fw"></i> Clasificación</a>
                            </li>
                            <li>
                                <a href="mvc/views/activos/unidad.php"><i class="fa fa-group fa-fw"></i> Unidad</a>
                            </li>
                            <li>
                                <a href="mvc/views/activos/centrocosto.php"><i class="fa fa-group fa-fw"></i> Centro de Costo</a>
                            </li>
                            <li>
                                <a href="mvc/views/activos/tipo.php"><i class="fa fa-group fa-fw"></i> Tipo</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mvc/views/items/items.php">
                            <i class="fa fa-group fa-fw"></i> Items
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>