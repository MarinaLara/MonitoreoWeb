<?php
$level = $this->session->userdata('nivel');
$nombre = $this->session->userdata('nombre');
$img_path = $this->session->userdata('img_path');
$segmento = $this->uri->segment(2);
$segmento1 = $this->uri->segment(1);
$navLinkDash = 'class="nav-link"';

if ($segmento1 == "Monitoreo" && $segmento == "") {
    $navLinkDash = 'class="nav-link active"';
}
?>
<style>
    .textSize {
        font-size: 24px;
    }
    .alignExit{
        display: flex;
    }
</style>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"
    style="height: 100%;">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #1B262C;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars textSize"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?= base_url() ?>Inicio/logOut" class="nav-link alignExit">
                        <i class="fa-solid fa-arrow-right-from-bracket textSize"></i>
                        <p class="textSize" style="margin-top: -10%;">
                            Salir
                        </p>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1B262C;">
            <!-- Brand Logo -->
            <a href="Inicio" class="brand-link" style="background-color: #1B262C;">
                <img src="<?= base_url() ?>recursos/imagenes/logoLogin.png" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8; max-height: 40px;">
                <span class="brand-text font-weight-light textSize">Monitoreo</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Monitoreo/" class="nav-link">
                                <i class="fa-solid fa-house textSize"></i>
                                <p class="textSize">
                                    Inicio
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Colmenas" class="nav-link">
                                <i class="fa-brands fa-hive textSize"></i>
                                <p class="textSize">
                                    Colmenas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Usuarios/" class="nav-link">
                                <i class="fa-solid fa-user textSize"></i>
                                <p class="textSize">
                                    Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Empresas/" class="nav-link">
                                <i class="fa-solid fa-building textSize"></i>
                                <p class="textSize">
                                    Empresas
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">