

<div class="content-wrapper colorfondo">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center><strong><font color="#D34787">Nueva RegistrarPagos</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Registro del RegistrarPagos</font></small></center>
        </h1>
            </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid colorfondo">
            <div class="box-body letras">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                             </div>
                        <?php endif;?>









      <form  autocomplete="off" class="form-inline" id="formArchivos" method="POST">

<center>
                          <!-- <form action="<?php echo base_url();?>mantenimiento/Controller_RegistroPago/captura_inputs" method="POST"> -->

                                    <div class="form-group">
                                    <label>Nombre_Completo_del_Alumno:</label>
                                      <input type="text" class="form-control" id="alumno_nombre_completo" name="alumno_nombre_completo" placeholder="Nombre del Alumno">

                                    </div>
                                     <!-- <div class="form-group">
                                               <center>   <button type="submit" class="btn btn-success btn-flat">Agregar</button></center>
                                     </div> -->



                          <br><br>




                            <label>Nombre del documento: </label>
                            <div class="input-group">
                              <spam class="input-group-addon">
                                <i class="fa fa-file" aria-hidden="true"></i>
                              </spam>

        <input type="text" id="nombre" name="nombre" placeholder="Nombre del documento" class="form-control" />
                            </div>

  <button class="btn btn-light btn-sm" id="upFile"><i class="fa fa-upload" id="ico-btn-file" aria-hidden="true"></i></button>

  <input type="file" name="archivo" id="getFile" class="hidden" required="required" accept="application/pdf" />
  <input type="submit" form="formArchivos" id="smtArchivo" class="btn btn-success btn-sm" value="Agregar" />

   <br/>
                          </center>
        </form>


<br><br><br>

<table id="tabla-archivos" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" width="100%" style="background:white!important">

<thead>
  <tr>
    <th class="text-center bg-primary">Num</th>
    <th class="bg-primary">Nombre archivo</th>
    <th class="text-center bg-primary">Acciones</th>
  </tr>
</thead>

<tbody>

      <?php
      $contador = 1;
      foreach($archivos as $archivo){
      ?>

  <tr>
    <td class="text-center"><?=$contador?></td>
    <td> <?=$archivo['nombre']?> </td>
    <td class="text-center">

      <a class="btn btn-primary btn-xs" href="<?=base_url()?>mantenimiento/RegistrarPagos/verArchivo/<?=$archivo['id']?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
      <button class="btn btn-danger btn-xs delArchivo" data-id="0"><i class="fa fa-trash" aria-hidden="true"></i></button>
    </td>
  </tr>

<?php
$contador++;
}
 ?>

</tbody>
</table>

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
