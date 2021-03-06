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
                <strong><font color="#D34787">Productos</font></strong>
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
                      <a type="button" class="btn btn-primary btn-float" data-toggle="modal" data-target="#modal_add_producto"> <span class="fa fa-plus"></span> Nuevo Producto</a>
                    </div>
                <?php endif;?>
              </div>
            </div>
            <hr> <!-- Le da una linea sombreada para ver la divicion -->

            <div class="row my-4">
              <div class="col-md-12 mx-auto">

                <table id="tbl_productos" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
                  <thead class="text-center bg-primary">
                    <tr>
                      <th width="3%" type="hidden">#</th>
                      <th>Nombre</th>
                      <th width="10%">Tipo</th>
                      <th width="7%">Precio</th>
                      <th width="7%">Cantidad</th>
                      <th>Fecha Caducidad</th>
                      <th>Fecha Registro</th>
                      <th class="text-center" width="7%">Acciones</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>

            <!-- Modal Agregar nuevo registro -->
            <div class="modal fade" id="modal_add_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-center">
                    <strong class="modal-title" id="exampleModalLabel">Agregar Producto</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="addproducto">

                      <input type="hidden" id="fechaf" name="fechaf">
                      <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre_producto" placeholder="Nombre">
                      </div>
                      <div class="form-group">
                        <label for="">Tipo</label>
                        <input type="text" class="form-control" id="tipo_producto" placeholder="Tipo">
                      </div>
                      <div class="form-group">
                        <label for="">Precio</label>
                        <input type="text" class="form-control" id="precio_producto" placeholder="Precio">
                      </div>
                      <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="text" class="form-control" id="cantidad_producto" placeholder="Cantidad">
                      </div>



                      <div class="input-group">
                        <label class="control-label">Fecha Caducidad</label>
                        <div class="input-group date">
                          <input class="control-input" type="text" id="fecha_caducidad">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>

                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <!-- Insert Button -->
                    <button type="button" class="btn btn-primary" id="btnaddproducto">Agregar</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal preparado para editar datos y file -->
            <div class="modal fade" id="modaleditproducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-center">
                    <strong class="modal-title" id="exampleModalLabel">Editar Producto</strong>
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
                          <form id="formeditarproducto">
                            <!-- Inputs para editar  -->
                            <input type="hidden" id="id_producto_update">
                            <input type="hidden" id="fecha_caducidad_anterior">
                            <div class="form-group">
                              <label for="">Nombre</label>
                              <input type="text" class="form-control" id="nombre_producto_nuevo">
                            </div>
                            <div class="form-group">
                              <label for="">Tipo</label>
                              <input type="text" class="form-control" id="tipo_producto_nuevo">
                            </div>
                            <div class="form-group">
                              <label for="">Precio</label>
                              <input type="text" class="form-control" id="precio_producto_nuevo">
                            </div>
                            <div class="form-group">
                              <label for="">Cantidad</label>
                              <input type="text" class="form-control" id="cantidad_producto_nuevo">
                            </div>
                            <div class="input-group">
                              <label class="control-label">Fecha Caducidad</label>
                              <div class="input-group date">
                                <input class="" type="text" id="fecha_caducidad_nueva">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="update_producto">Actualizar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section><!-- / MAIN content -->
</div> <!-- /END ALL CONTENT -->
