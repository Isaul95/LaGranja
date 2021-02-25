<div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->
             <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body">
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center">
      <strong><font color="#D34787">Carreras</font></strong>
      </h1>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="row">
          <div class="col-md-12">
           
      <?php if($permisos->insert == 1):?>
        <div class="d-flex flex-row">
              <a type="button" class="btn btn-primary btn-float" data-toggle="modal" data-target="#modal_add_licenciatura"> <span class="fa fa-plus"></span> Nueva licenciatura</a>
              </div>
      <?php endif;?>
          
          </div>
      </div>
<hr> <!-- Le da una linea sombreada para ver la divicion -->
<div class="row my-4">
    <div class="col-md-12 mx-auto">


      <table id="tbl_carreras" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="text-center bg-primary">
          <tr>
            <th width="3%" type="hidden">#</th>
            <th>Licenciatura</th>
            <th>Clave</th>
            <th>Fecha</th>
            <th class="text-center" width="7%">Acciones</th>
          </tr>
        </thead>
      </table>

    </div>
  </div>
      <!-- Modal Agregar nueuvo registro -->
      <div class="modal fade" id="modal_add_licenciatura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Agregar licenciatura</strong>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <form id="addcarrera">
                <div class="form-group">
                    <label for="">Licenciatura</label>
                  <input type="text" class="form-control" id="licenciatura" placeholder="Licenciatura">
                </div>
             
                <div class="form-group">
                  <label for="">Clave</label>
                  <input type="text" class="form-control" id="clave_licenciatura" placeholder="Rvoe">
                </div>

              <div class="form-group">
                  <label for="">Fecha</label>
                  <input type="text" id="datepicker_fecha_licenciatura" />
                </div>
          </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <!-- Insert Button -->
              <button type="button" class="btn btn-primary" id="btnaddcarrera">Agregar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal preparado para editar datos y file -->
      <div class="modal fade" id="modaleditcarrera" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar periodos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row text-center">
                  <div class="col-md-12 my-3">
                    <div id="show_img"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <form id="formeditarcarrera">
                    <input type="hidden" id="id_licenciatura_update">
                    <div class="form-group">
                    <label for="">Licenciatura</label>
                  <input type="text" class="form-control" id="licenciatura_update" placeholder="Ciclo escolar">
                </div>
             
                <div class="form-group">
                  <label for="">Clave</label>
                  <input type="text" id="clave_licenciatura_update" />
                </div>

              <div class="form-group">
                  <label for="">Fecha</label>
                  <input type="text" id="datepicker_fecha_licenciatura_update" />
                </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              <button type="button" class="btn btn-primary" id="update_carrera">Actualizar</button>
            </div>
          </div>
        </div>
      </div>



    </div>
  </div>

 

</div>


<!-- AKI TERMIAN LO MIO LO NUEVO QUE AGREGUE -->




                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- / MAIN content -->




    </div> <!-- /END ALL CONTENT -->
