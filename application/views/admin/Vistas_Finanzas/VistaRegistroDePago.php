
    <div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->
            <!-- Content Header (Page header) -->
      <!-- <section class="content-header">
        <h1>
              <center><strong><font color="#D34787">Lista de los pagos realizados ISAUL ==></font></strong></center>
              <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Menu cesvi</font></small></center>
        </h1>
        </section> -->



            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body">



<!-- AKI EMPIEZA LOMMIOO LO NUEVO -->

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center">
      <strong><font color="#D34787">Lista de pagos realizados orden</font></strong>
      </h1>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRecords">
        Agregar Nuevo Registro
      </button> -->

      <div class="row">
          <div class="col-md-12">
            <center>
      <?php if($permisos->insert == 1):?>
              <a type="button" class="btn btn-primary btn-float" data-toggle="modal" data-target="#addRecords"> <span class="fa fa-plus"></span>  Agregar Nuevo Registro</a>
      <?php endif;?>
            </center>
          </div>
      </div>
<hr> <!-- Le da una linea sombreada para ver la divicion -->

      <!-- Modal Agregar nueuvo registro -->
      <div class="modal fade" id="addRecords" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Agregar Nuevo Registro</strong>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Add Record Form -->
          <form id="addRecordForm">
                <!-- Name -->
                <div class="form-group">
                    <label for="">Nombre Alumno: *</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Username">
                </div>

                <!-- Email -->
                <div class="form-group">
                  <label for="">Número de control: *</label>
                  <input type="text" class="form-control" id="numero_con" placeholder="Email Address">
                </div>

                <!-- Mobile No. -->
              <div class="form-group">
                  <label for="">Carrera: *</label>
                  <input type="text" class="form-control" id="carrera" placeholder="Mobile No.">
                </div>

                <!-- Email -->
                <div class="form-group">
                  <label for="">Semestre: *</label>
                  <input type="text" class="form-control" id="semestre" placeholder="semestre">
                </div>

                <!-- Image -->
                <div class="form-group">
                  <label for="customFile">Adjuntar archivo: *</label>
                  <input type="file" class="custom-file-input" id="archivo">
                </div>

          </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <!-- Insert Button -->
              <button type="button" class="btn btn-primary" id="addPagos">Agregar Pago</button>
            </div>
          </div>
        </div>
      </div>



      <!-- Modal preparado para editar datos y file -->
      <div class="modal fade" id="editRecords" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row text-center">
                <div class="col-md-12 my-3">
                  <div id="show_archivo"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">

                  <!-- Edit Record Form -->
                  <form id="editForm">

                    <!-- ID -->
                    <input type="hidden" id="edit_record_id">

                    <!-- Name -->
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-user"></i></span>
                      </div>
                      <input type="text" class="form-control" id="edit_nombre" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <!-- Email -->
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                      </div>
                      <input type="text" class="form-control" id="edit_numero_con" placeholder="numero control">
                    </div>

                    <!-- Mobile -->
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" id="edit_carrera" placeholder="Mobile No.">
                    </div>

                    <div class="form-group">
                      <label for="">Semestre: *</label>
                      <input type="text" class="form-control" id="edit_semestre" placeholder="semestre">
                    </div>

                    <!-- Image -->
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="edit_archivo">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- Update Button -->
            <button type="button" class="btn btn-primary" id="update">Update Record</button>
          </div>

        </div>
      </div>
    </div>



    </div>
  </div>

  <div class="row my-4">
    <div class="col-md-12 mx-auto">

      <!-- <table class="table table-borderless" id="tbl_regPagos" style="width:100%"> -->
      <table id="tbl_regPagos" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="text-center bg-primary">
          <tr>
            <th width="3%">#</th>
            <th>Nombre</th>
            <th>No. Control</th>
            <th>Carrera</th>
            <th>Semestre</th>
            <th class="text-center" width="7%">Pdf</th>
            <th class="text-center" width="7%">Acciones</th>
          </tr>
        </thead>
      </table>

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
