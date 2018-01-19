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

            <!--            <li >
                            <a href="MVC/View/Configure/configure.php">
                                <i class="fa fa-gears"></i> <span>Configuración</span>
                            </a>
                        </li>
                        <li >
                            <a href="MVC/View/Client/cliente.php">
                                <i class="fa fa-users"></i> <span>Clientes</span>
                            </a>
                        </li>
                        <li >
                            <a href="MVC/View/Product/producto.php">
                                <i class="fa fa-product-hunt"></i> <span>Productos</span>
                            </a>
                        </li>
                        <li >
                            <a href="MVC/View/Proform/proforma.php">
                                <i class="fa fa-file-archive-o"></i> <span>Proformas</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-folder-open"></i> <span>Reportes</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#">Link in level 2</a></li>
                                <li><a href="#">Link in level 2</a></li>
                            </ul>
                        </li>-->
            <li class="treeview">
                <a href="#"><i class="fa fa-folder-open"></i> <span>Pedidos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="mvc/views/Pedido/ordenPedido.php">Orden de Pedidos</a></li>
                    <li><a href="#">Aprobación de Pedidos</a></li>
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
                    <!--<li><a href="mvc/views/items/proveedor.php"></a></li>-->
                    <li><a href="mvc/views/items/presupuesto.php">Presupuesto</a></li>
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
                    <!--<li>
                        <a href="mvc/views/Administracion/modulo.php"><i class="fa fa-group fa-fw"></i> Módulos</a>
                    </li>
                    <li>
                        <a href="mvc/views/Administracion/submodulo.php"><i class="fa fa-group fa-fw"></i> SubMódulos</a>
                    </li>
                    <li>
                        <a href="mvc/views/Administracion/usuarios.php"><i class="fa fa-group fa-fw"></i> Usuarios</a>
                    </li>-->
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>






<!--<li>
    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Compras<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="#">Catálogo<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="mvc/views/items/proveedor.php">Proveedor</a>
                </li>
            </ul>
        </li>
    </ul>
</li>-->

<!--<li id="item_admin" class="">
    <a href="#"><i class="fa fa-user fa-fw"></i> Catalogos<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li class="">
            <a href="mvc/views/activos/contribuyente.php"><i class="fa fa-check fa-fw"></i> Contribuyente</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/tipoidentificacion.php"><i class="fa fa-check fa-fw"></i> Tipo Identificación</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/tipoemisor.php"><i class="fa fa-check fa-fw"></i> Tipo Emisor</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/categoria.php"><i class="fa fa-check fa-fw"></i> Categoría</a>
        </li>
        <li id="item_admin_m1" class="">
            <a href="mvc/views/activos/bodega.php"><i class="fa fa-check fa-fw"></i> Bodega</a>
        </li>
        <li id="item_admin_m1" class="">
            <a href="mvc/views/activos/ubicacion.php"><i class="fa fa-check fa-fw"></i> Ubicación</a>
        </li>
        <li id="item_admin_m1" class="">
            <a href="mvc/views/activos/edificio.php"><i class="fa fa-check fa-fw"></i> Edifico</a>
        </li>
        <li id="item_admin_m1" class="">
            <a href="mvc/views/activos/grupos.php"><i class="fa fa-check fa-fw"></i> Grupo</a>
        </li>
        <li id="item_admin_m2" class="">
            <a href="mvc/views/activos/clases.php"><i class="fa fa-check fa-fw"></i> Clase</a>
        </li>
        <li id="item_admin_m3" class="">
            <a href="mvc/views/activos/subgrupos.php"><i class="fa fa-check fa-fw"></i> SubGrupos</a>
        </li>
        <li id="item_admin_m4" class="">
            <a href="mvc/views/activos/subclases.php"><i class="fa fa-check fa-fw"></i> SubClases</a>
        </li>
        <li id="item_admin_m4" class="">
            <a href="mvc/views/activos/fabricante.php"><i class="fa fa-check fa-fw"></i> Fabricante</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/ciudad.php"><i class="fa fa-check fa-fw"></i> Ciudad</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/pais.php"><i class="fa fa-check fa-fw"></i> País</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/categoria.php"><i class="fa fa-check fa-fw"></i> Categoría</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/departamento.php"><i class="fa fa-check fa-fw"></i> Departamento</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/clasificacion.php"><i class="fa fa-check fa-fw"></i> Clasificación</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/area.php"><i class="fa fa-check fa-fw"></i> Área</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/unidad.php"><i class="fa fa-check fa-fw"></i> Unidad</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/centrocosto.php"><i class="fa fa-check fa-fw"></i> Centro de Costo</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/tipo.php"><i class="fa fa-check fa-fw"></i> Tipo</a>
        </li>
        <li class="">
            <a href="mvc/views/activos/subtipos.php"><i class="fa fa-check fa-fw"></i> Sub Tipo</a>
        </li>
    </ul>
</li>-->
<!--<li id="item_admin" class="">
    <a href="#"><i class="fa fa-user fa-fw"></i> Administración<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li id="item_admin_m1" class="">
            <a href="mvc/views/Administracion/rol.php"><i class="fa fa-lock fa-fw"></i> Roles / Permisos</a>
        </li>
        <li >
            <a href="mvc/views/Administracion/modulo.php"><i class="fa fa-group fa-fw"></i> Módulos</a>
        </li>
        <li >
            <a href="mvc/views/Administracion/submodulo.php"><i class="fa fa-group fa-fw"></i> SubMódulos</a>
        </li>
        <li id="item_admin_m2" class="">
            <a href="mvc/views/Administracion/usuarios.php"><i class="fa fa-group fa-fw"></i> Usuarios</a>
        </li>
        <li id="item_admin_m3" class="">
            <a href="/app/modules/dispositivos.php"><i class="fa fa-tablet fa-fw"></i> Dispositivos</a>
        </li>
        <li id="item_admin_m4" class="">
            <a href="/app/modules/opciones-generales.php"><i class="fa fa-cog fa-fw"></i> Opciones Generales</a>
        </li>
    </ul>
</li>-->
<!--<li id="item_cat" class="hidden">
    <a href="#"><i class="fa fa-folder fa-fw"></i> Catálogos<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li id="item_cat_m1" class="">
            <a href="/app/modules/tipos-bienes.php"><i class="fa fa-bicycle fa-fw"></i> Tipos de Bienes</a>
        </li>
        <li id="item_cat_m10" class="">
            <a href="/app/modules/catalogo-bienes.php"><i class="fa fa-cube fa-fw"></i> Catálogo de Bienes</a>
        </li>
        <li id="item_cat_m4" class="">
            <a href="/app/modules/custodios.php"><i class="fa fa-group fa-fw"></i> Custodios</a>
        </li>
        <li id="item_cat_m5" class="">
            <a href="/app/modules/destinos.php"><i class="fa fa-university fa-fw"></i> Destinos / Departamentos</a>
        </li>
        <li id="item_cat_m6" class="">
            <a href="/app/modules/estados.php"><i class="fa fa-thumbs-up fa-fw"></i> Estados del Bien</a>
        </li>
        <li id="item_cat_m9" class="">
            <a href="/app/modules/tipos-comprobante.php"><i class="fa fa-file-text-o fa-fw"></i> Tipos de Comprobante</a>
        </li>
        <li id="item_cat_m11" class="">
            <a href="/app/modules/unidades.php"><i class="fa fa-balance-scale fa-fw"></i> Unidades / Medidas</a>
        </li>
    </ul>
</li>
<li id="item_reg" class="">
    <a href="#"><i class="fa fa-barcode fa-fw"></i> Registros<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li id="item_reg_m2" class="">
            <a href="/app/modules/activos-fijos.php"><i class="fa fa-tags fa-fw"></i> Activos Fijos</a>
        </li>
        <li id="item_reg_m2" class="">
            <a href="mvc/views/items/items.php"><i class="fa fa-tags fa-fw"></i> Items</a>
        </li>
        <li id="item_reg_m1" class="">
            <a href="/app/modules/existencias.php"><i class="fa fa-puzzle-piece fa-fw"></i> Existencias</a>
        </li>
        <li id="item_reg_m3" class="">
            <a href="/app/modules/existencias-movimientos.php"><i class="fa fa-exchange fa-fw"></i> Movimientos Existencias</a>
        </li>
    </ul>
</li>-->
<!--<li id="item_sup" class="hidden">
    <a href="#"><i class="fa fa-eye fa-fw"></i> Supervisión<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li id="item_sup_m2" class="">
            <a href="/app/modules/activos-registrados.php"><i class="fa fa-tags fa-fw"></i> Activos Fijos registrados</a>
        </li>
        <li id="item_sup_m3" class="">
            <a href="/app/modules/control-dispositivos.php"><i class="fa fa-tablet fa-fw"></i> Control de dispositivos</a>
        </li>
    </ul>
</li>-->
<!--<li id="item_man" class="hidden">
    <a href="#"><i class="fa fa-gears fa-fw"></i> Mantenimiento<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li id="item_man_m1" class="hidden">
            <a href="/app/modules/actualizaciones.php"><i class="fa fa-download fa-fw"></i> Actualizaciones</a>
        </li>
        <li id="item_man_m2" class="hidden">
            <a href="/app/modules/configuracion.php"><i class="fa fa-cogs fa-fw"></i> Configuración</a>
        </li>
    </ul>
<!-- /.nav-second-level 
</li>-->
<!--<li id="item_inf" class="hidden">
    <a href="#"><i class="fa fa-list-alt fa-fw"></i> Informes<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li id="item_inf_m1" class="">
            <a href="/app/modules/reportesimple.php"><i class="fa fa-file fa-fw"></i></i>&nbsp;Reporte Simple</a>
        </li>
        <li id="item_inf_m2" class="">
            <a href="/app/modules/estadisticas.php"><i class="fa fa-file-text-o fa-fw"></i>&nbsp;Reporte Avanzado</a>
        </li>
        <li id="item_inf_m3" class="">
            <a href="/app/modules/reporteavanzado.php"><i class="fa fa-filter"></i>&nbsp;Filtros</a>
        </li>

    </ul>
</li>-->
