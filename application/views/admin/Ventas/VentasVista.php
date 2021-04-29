<div class="content-wrapper colorfondo">
  <section class="content">
    <div class="box box-solid colorfondo">
      <div class="box-body">
        <div class="container">


          <?php
            $id_user=$this->session->userdata('id');
          ?>

          <input type="hidden" id="id_usuario_venta" name="" value="<?php echo $id_user;?>">


          <div class="row">
            <div class="col-md-12 mt-5">
              <h1 class="text-center">
                <strong><font color="#D34787">Venta</font></strong>
              </h1>
              <hr style="background-color: black; color: black; height: 1px;">
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">

              <div class="row">
                <div class="col-md-12">
                  <div class="d-flex flex-row">
                    <div class="col-sm-4 col-md-4">
                      <a type="button" class="btn btn-primary btn-float" id="BotonModalProductosCrudos"><i class="fas fa-drumstick-bite"></i> Productos crudos</a>
                    </div>
                    <div class="col-sm-4 col-md-4">
                      <a type="button" class="btn btn-primary btn-float" id="BotonModalProductosCocidos"> <i class="fas fa-drumstick-bite"></i> Productos cocidos</a>
                    </div>
                    <div class="col-sm-4 col-md-4">
                      <a type="button" class="btn btn-primary btn-float" id="BotonModalProductosAcompañantes"><i class="fas fa-drumstick-bite"></i> Productos acompañantes</a>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12">
                  <div class="d-flex flex-row">
                    <a type="button" class="btn btn-primary btn-float" id="BotonRealizarVenta">Realizar venta</a>
                  </div>
                </div>
              </div>


              <hr>


              <div class="row my-4">
                <div class="col-md-12 mx-auto">
                  <table class="table table-striped table-bordered table-hover table-condensed dt-responsive nowrap" id="TablaDescripcionVenta" style="background: white!important;" cellspacing="0">
                    <thead class="text-center bg-primary">
                      <tr>
                        <!--<th width="21%">id_producto</th>-->
                        <th width="21%">Producto</th>
                        <th width="21%">Piezas</th>
                        <th width="21%">Precio por pieza</th>
                        <th width="21%">Precio total</th>
                        <th width="16%">Eliminar</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>

            </div>
          </div>


          <div class="modal fade" id="ModalProductos" tabindex="-1" aria-labelledby="TituloModalProductos" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header bg-primary text-center">
                  <strong id="TituloModalProductos" class="modal-title"></strong>
                </div>

                <div class="modal-body">
                  <div class="row">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover table-condensed dt-responsive nowrap" id="TablaVentaProductos" style="background: white!important;" cellspacing="0" width="100%">
                        <thead class="text-center bg-primary">
                          <tr>
                            <th width="30%">Producto</th>
                            <th width="30%">Piezas disponibles</th>
                            <th width="30%">Cantidad de piezas</th>
                            <th width="10%">Agregar</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" id="EliminarTablaVentaProductos" data-dismiss="modal">Cerrar</button>
                </div>

              </div>
            </div>
          </div>


          <div class="modal fade" id="ModalRealizarVenta" tabindex="-1" aria-labelledby="TituloModalRealizarVenta" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header bg-primary text-center">
                  <strong id="TituloModalRealizarVenta" class="modal-title">Realizar venta</strong>
                </div>

                <div class="modal-body">
                  <form id="FormularioRealizarVenta">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-center">Subtotal</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control text-center" id="SubtotalVenta" readonly/>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-center">Descuento</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control text-center" id="DescuentoVenta"/>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-center">Total</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control text-center" id="TotalVenta" readonly/>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-center">Pago</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control text-center" id="PagoVenta"/>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-center">Cambio</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control text-center" id="CambioVenta" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" id="CancelarVenta">Cancelar venta</button>
                  <button type="button" class="btn btn-primary" id="ConcretarVenta">Concretar venta</button>
                </div>

              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </section>
</div>
