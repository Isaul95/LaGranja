
    <div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->
            <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
              <center><strong><font color="#D34787">Lista de YOOOO de los pagos realizados</font></strong></center>
              <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Menu cesvi</font></small></center>
        </h1>
        </section>



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
        Codeigniter Datatables Ajax Crud Tutorial
      </h1>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 mt-2">
      <!-- Add Records Modal -->
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#exampleModal">
        Nuevo
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Agregar Datos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Add Records Form -->
              <form action="" method="post" id="form">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" id="name" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" id="email" class="form-control">
                </div>

              <div class="form-group">
                					<label>Adjuntar archivo:</label>
                	<input name="archivo" type="file" id="getFile"  />

              </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="add">Add Records</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 mt-4">
      <div class="table-responsive">
        <table class="table" id="tbl_registroPago">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>



<!-- Edit Record Modal -->
  <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Record Modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Edit Record Form -->
          <form action="" method="post" id="edit_form">
            <input type="hidden" id="edit_record_id" name="edit_record_id" value="">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" id="edit_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" id="edit_email" class="form-control">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="update">Update</button>
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
