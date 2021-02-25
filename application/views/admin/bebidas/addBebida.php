
<!-- Content Wrapper. Contains page content -->
<style type="text/css">
        .inp{
            color: #DF7401;
        }
        .letras{
                color: white;
               }

           .colorfondo{
               background:#060405 ;       /*#1B2631;*/
           }
           </style>

<div class="content-wrapper colorfondo">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>   
            <center><strong><font color="#D34787">Nueva Bebida</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Registro del Menu Bebidas</font></small></center>
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
                <form action="<?php echo base_url();?>mantenimiento/bebidas/store" method="POST">


                            <div class="form-group <?php echo !empty(form_error('nombre_bebida')) ? 'has-error':'';?>">
                                <label for="nombre_bebida">Nombre_de_Bebida:</label>
                                <input type="text" class="form-control" id="nombre_bebida" name="nombre_bebida" value="<?php echo set_value('nombre_bebida');?>" placeholder="Nombre de la Bebida">
                                <?php echo form_error("nombre_bebida","<span class='help-block'>","</span>");?>
                            </div>

                            
                            <div class="form-group <?php echo !empty(form_error('precio_bebida')) ? 'has-error':'';?>">
                                <label for="precio_bebida">Precio_de_Bebida:</label>
                                <input type="text" class="form-control" id="precio_bebida" name="precio_bebida" value="<?php echo set_value('precio_bebida');?>" placeholder="Precio de la Bebida">
                                <?php echo form_error("precio_bebida","<span class='help-block'>","</span>");?>
                            </div>


                            <div class="form-group <?php echo !empty(form_error('descripcion_bebida')) ? 'has-error':'';?>">
                                <label for="descripcion_bebida">Descripcion_de_Bebida:</label>
                                <input type="text" class="form-control" id="descripcion_bebida" name="descripcion_bebida" value="<?php echo set_value('descripcion_bebida');?>" placeholder="Descripcion de la Bebida">
                                <?php echo form_error("descripcion_bebida","<span class='help-block'>","</span>");?>
                            </div>
                            
                            
                            <div class="form-group">
                                             <center>   <button type="submit" class="btn btn-success btn-flat">Agregar</button></center>
                                            </div>
                        </form>
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
