<div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->
             <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body">
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h3 class="text-center">
      <strong><font color="#D34787">Cortes de caja </font></strong>
    </h3>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">

      <!-- <div class="row">
          <div class="col-md-4">

            <div class="form-group">
              <label for="">Usuario Responsable:</label>
              <input type="text" class="form-control" id="user_login" readonly value="<?php echo $username;?>" >
            </div>

          </div>
      </div> -->

<!-- <hr>  Le da una linea sombreada para ver la divicion -->


<div class="modal-dialog" id="formularioRegistroOficioTitulacion">
  <div class="modal-content">
    <div class="modal-body">
      <input type="hidden" class="form-control" id="user_login"  value="<?php echo $username;?>" >
      <input type="hidden" class="form-control" id="id_apertura" >
<?php foreach($totalProcesadosDelDia as $totalProcesadosDelDia):?>
      <input type="hidden" class="form-control" id="total_procesados" value="<?php echo $totalProcesadosDelDia->totalProcesados;?>" >
<?php endforeach;?>

<?php foreach($totalDevolucionCrudoDelDia as $totalDevolucionCrudoDelDia):?>
      <input type="hidden" class="form-control" id="total_devolucion_crudo" value="<?php echo $totalDevolucionCrudoDelDia->totalDevCrudo;?>" >
<?php endforeach;?>

      <form id="formularioAltaCorteCaja">

<?php foreach($totalVentasDelDia as $totalVentasDelDia):?>
        <div class="form-group">
          <label for="">Ventas:</label>
            <input type="text" class="form-control" id="id_ventas" value="<?php echo $totalVentasDelDia->totalVentasDelDiaHoy;?>" readonly >
        </div>
<?php endforeach;?>

<?php foreach($totalGastosDelDia as $totalGastosDelDia):?>
        <div class="form-group">
            <label for="">Gastos:</label>
            <input type="text" class="form-control" id="id_gastos" value="<?php echo $totalGastosDelDia->gastoTotal;?>" readonly >
        </div>
<?php endforeach;?>

<?php foreach($totalPagosDelDia as $totalPagosDelDia):?>
        <div class="form-group">
          <label for="">Total de pagos:</label>
            <input type="text" class="form-control" id="id_pagos" value="<?php echo $totalPagosDelDia->pagosTotal;?>" readonly >
        </div>
<?php endforeach;?>

        <div class="form-group">
            <label for="">Apertura de caja fue de:</label>
            <input type="text" class="form-control" id="monto_apertura" readonly >
        </div>

<?php foreach($totalDescuentos_y_sumTotalDescuentosDelDia as $totalDescuentos_y_sumTotalDescuentosDelDia):?>
  <div class="row">
          <div class="col-4 col-sm-6">
              <label for="">Cantidad de descuentos #:</label>
              <input type="text" class="form-control text-center" id="periodoAlum" value="<?php echo $totalDescuentos_y_sumTotalDescuentosDelDia->num_Descuentos;?>" readonly  >
          </div>
          <div class="col-8 col-sm-6">
            <label for="">Total de descuentos $:</label>
              <input type="text" class="form-control text-center" id="id_descuentos" value="<?php echo $totalDescuentos_y_sumTotalDescuentosDelDia->sum_Descuentos;?>" readonly >
          </div>
</div> <br>
<?php endforeach;?>

        <!-- <div class="form-group">
            <label for="">Gastos:</label>
            <input type="text" class="form-control" id="" readonly >
        </div> -->

        <div class="form-group">
          <label for="">Monto entregado:</label>
            <input type="text" class="form-control" id="id_monto" placeholder="$ 00.00" >
        </div>

      </form>
    </div>

    <div class="modal-footer">
        <!-- <?php if($permisos->insert == 1):?> -->
          <button type="button" class="btn btn-primary" id="agregarCorteCaja">Agregar</button>
        <!-- <?php endif;?> -->
    </div>

    </div>
</div>



  <div class="row my-4">
    <div class="col-md-12 mx-auto">
      <table id="tbl_consultaCortesDelDia" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important" width="100%" >
        <thead class="text-center bg-primary">
          <tr>
              <th>Apertura</th>
              <th>Monto Entregado</th>
              <th>Gastos</th>
              <th>Ventas</th>
              <th>Diferencia</th>
              <th>Fecha</th>
              <th>Usuario</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>



<div class="modal-dialog" id="noPermisoDeAddOficioTitulacion">
    <center>
        <strong><font color="#E74C3C">Aun no tiene permiso realizar el tramite de Titulación...!!!</font></strong> <br>
    </center>
</div>


<!--   TABLA  -->
 <!-- <div class="row my-4">
    <div class="col-md-12 mx-auto">

                              </div>
                            </div> -->

                          </div>
                        </div>
                      </div>
                    </div> <!-- /.box-body -->
                </div> <!-- /.box -->
            </section>
    </div> <!-- /END ALL CONTENT -->
