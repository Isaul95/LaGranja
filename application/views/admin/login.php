<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>.:: Login ::. "La Granja"</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- base_url() = http://localhost/ventas_ci/-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">

</head>
<body class="hold-transition login-page">  <!--COLOR background NEGRO => style="background-color: #060405;"-->
    <div class="login-box">
        <div class="login-logo">
            <!-- <h2>Cesvi</h2> -->
        </div>
        <!-- /.login-logo  <font color="#D34787"></font>-->
        <div class="login-box-body">

          <center><img src="<?php echo base_url()?>assets/template/dist/img/logo-cesvi2.png"  class="user-image" alt="User Image" width=120px heigth=120px></center> <br>
         <!-- <center> <label><h3>Bienvenidos</h3></font></label> </center> -->

            <p class="login-box-msg"><center><h4>Introduzca sus datos de ingreso</h4></center></p>
            <br>
              <?php if($this->session->flashdata("error")):?>
                    <div class="alert alert-danger">
                        <p><?php echo $this->session->flashdata("error")?></p>
                    </div>
               <?php endif; ?>
<!---SE ESTA LLAMADO AL ALERT DE Auth.php line 28/ EN ESTA SOLO ES LA POSICION DONDE APARECERA LA ALERTA NO TIENE NADA K VER DONDE VAYA ESTA PARTDE DEL LLAMADO AL CONTRILALDOR-->

            <form action="<?php echo base_url();?>auth/login" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Número de control" name="username"> <!--- HERE ADD -->
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback" >

                    <input type="password" class="form-control" placeholder="Contraseña" name="password"> <!--- HERE ADD -->
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
