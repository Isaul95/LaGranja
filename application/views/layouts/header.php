<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Gestión de Control | CESVI </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/Ionicons/css/ionicons.min.css">
       <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- DataTables Export -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables-export/css/buttons.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/skins/_all-skins.min.css">
    <!-- Toastr -->
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <!--TIME PICKER-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.16/jquery.timepicker.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.16/jquery.timepicker.css">







   <!-- DatePicker- AGREGADO-->
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>



</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a  class="logo"> <!--- SOBRARR NO ME SIRVE href="../../index2.html" -->
  <!-- CUANDO LA BARRA DE OCULTA ALA IZKIERDA mini logo for sidebar mini 50x50 pixels   ISAULLLL    -->
                <span class="logo-mini"><b>C</b>E</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b> "CESVI" </b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>


                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                         <!-- <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url()?>assets/template/dist/img/restaurant.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"> <?php echo $this->session->userdata("nombres")?></span>
                                 IMPESION variable de session "NOMBRE DE USUARIO"
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <a href=" <?php echo base_url(); ?>auth/logout">
                                            <img src="<?php echo base_url()?>assets/template/dist/img/marranito.jpg" class="user-image" > Cerrar Sesión</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li> -->


                        <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="<?php echo base_url()?>assets/template/dist/img/usernew.png" class="user-image img-circle elevation-2" alt="User Image">
        <span class="hidden-xs"> <?php echo $this->session->userdata("nombres")?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-primary">
          <img src="<?php echo base_url()?>assets/template/dist/img/usernew.png" class="img-circle elevation-2" alt="User Image">

          <p>
            <span style="font-weight: 900;" class="hidden-xs"> <?php echo $this->session->userdata("nombres")?></span>
            <p><font color="black"><span class="hidden-xs"> <?php echo $this->session->userdata("username")?></span></font></p>
          </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          <center>
          <a href=" <?php echo base_url();?>auth/logout"> <font color="red" style="font-weight: 900;"> Cerrar Sesión</font></a>
        </center>
        </li>
      </ul>
    </li>
                    </ul>
                </div>








            </nav>
        </header>
