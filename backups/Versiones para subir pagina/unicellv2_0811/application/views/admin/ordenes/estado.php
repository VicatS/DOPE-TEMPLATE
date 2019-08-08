
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Orden de Servicio
        <small>Estado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($this->session->flashdata("error")):?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-ban"><?php if ($this->session->flashdata("error"));?></i></p>
                        </div>
                        <?php endif; ?>
                           <div class="col-md-6">
          <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Estado avance Orden de Servicio</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
              <p><code><?php echo $orden->valorEstado."%" ?></code></p>

              <div class="progress progress-sm active">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $orden->valorEstado;?>%">
                  <span class="sr-only">20% Complete</span>
                </div>
              </div>
              <form action="<?=base_url();?>movimientos/ordenservicio/updateEstado" method="POST">
                <div class="form-group">
                    <label for="categoria">Actualizar estado:</label>
                        <input type="hidden" value="<?php echo $orden->idOrdenServicio;?>" name="idOrdenServicio">
                            <select name="cambiarEstado" id="cambiarEstado" class="form-control">
                                <?php foreach ($estados as $estado):?>
                                    <option value="<?php echo $estado->idEstadoOrdenServicio;?>"><?php echo $estado->nombreEstado; ?></option>
                                <?php endforeach; ?>
                            </select>   
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                    <a class="btn btn-primary" href="<?php echo base_url() ?>movimientos/ordenservicio"> Cancelar </a>
                </div>
              </form>
             
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
                    </div>
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
