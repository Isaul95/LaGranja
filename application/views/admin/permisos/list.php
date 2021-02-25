
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Permisos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>administrador/permisos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Permiso</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="tbl_permisos" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
                            <thead class="text-center bg-primary">
                                <tr>
                                    <th><center>#</center></th>
                                    <th><center>Menu</center></th>
                                    <th><center>Rol</center></th>
                                    <th><center>Ver</center></th>
                                    <th><center>Agregar</center></th>
                                    <th><center>Actualizar</center></th>
                                    <th><center>Eliminar</center></th>
                                    <th><center>opciones</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($permisos)):?>
                                    <?php foreach($permisos as $permiso):?>
                                        <tr>
                                            <td><center><?php echo $permiso->id;?></center></td>
                                            <td><center><?php echo $permiso->menu;?></center></td>
                                            <td><center><?php echo $permiso->rol;?></center></td>
                                            <td>  <center>
                                                <?php if($permiso->read == 0 ):?>
                                                    <span class="fa fa-times text-danger"></span>
                                                <?php else:?>
                                                    <span class="fa fa-check text-success"></span>
                                                <?php endif;?>
                                            </center>  </td>
                                             <td>  <center>
                                                <?php if($permiso->insert == 0 ):?>
                                                    <span class="fa fa-times text-danger"></span>
                                                <?php else:?>
                                                    <span class="fa fa-check text-success"></span>
                                                <?php endif;?>
                                              </center></td>
                                             <td>  <center>
                                                <?php if($permiso->update == 0 ):?>
                                                    <span class="fa fa-times text-danger"></span>
                                                <?php else:?>
                                                    <span class="fa fa-check text-success"></span>
                                                <?php endif;?>
                                            </center>  </td>
                                             <td>  <center>
                                                <?php if($permiso->delete == 0 ):?>
                                                    <span class="fa fa-times text-danger"></span>
                                                <?php else:?>
                                                    <span class="fa fa-check text-success"></span>
                                                <?php endif;?>
                                            </center>  </td>
                                            <td>  <center>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url()?>administrador/permisos/edit/<?php echo $permiso->id;?>" class="btn btn-success"><span class="fas fa-edit"></span></a>

                                                    <a href="<?php echo base_url();?>administrador/permisos/delete/<?php echo $permiso->id;?>" class="btn btn-danger btn-remove"><span class="fas fa-trash-alt"></span></a>
                                                </div>
                                            </center>  </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Categoria</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
