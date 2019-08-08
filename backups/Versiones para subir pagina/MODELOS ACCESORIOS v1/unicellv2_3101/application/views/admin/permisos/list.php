
<!-- =============================================== -->

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
                        <a href="<?=base_url();?>administrador/permisos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar Permiso</a>                        
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Menú</th>
                                    <th>Rol</th>
                                    <th>Leer</th>
                                    <th>Insertar</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indice=1; ?>
                                <?php if(!empty($permisos)) :?>
                                    <?php foreach ($permisos as $permiso):?>
                                        <tr>
                                            <td>
                                                <?php echo $indice;
                                                $indice += 1;?>
                                            </td>
                                            <td><?php echo strtoupper($permiso->menu);?></td>
                                            <td><?php echo strtoupper($permiso->rol);?></td>
                                            <td><span class="<?php 
                                            if($permiso->read=="0"){
                                                echo   "fa fa-times";
                                            }else
                                                 echo   "fa fa-check";
                                            
                                            ?>"></span></td>
                                             <td><span class="<?php 
                                            if($permiso->insert=="0"){
                                                echo   "fa fa-times";
                                            }else
                                                 echo   "fa fa-check";
                                            
                                            ?>"></span></td>
                                             <td><span class="<?php 
                                            if($permiso->update=="0"){
                                                echo   "fa fa-times";
                                            }else
                                                 echo   "fa fa-check";
                                            
                                            ?>"></span></td>
                                            <td><span class="<?php 
                                            if($permiso->delete=="0"){
                                                echo   "fa fa-times";
                                            }else
                                                 echo   "fa fa-check";
                                            
                                            ?>"></span></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url()?>administrador/permisos/edit/<?php echo $permiso->idPermiso;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url()?>administrador/permisos/delete/<?php echo $permiso->idPermiso;?>" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                                                </div>
                                            </td>
                                </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
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
        <h4 class="modal-title">Información de la Categoria</h4>
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
