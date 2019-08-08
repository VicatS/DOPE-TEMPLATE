
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Artículos
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
                        <?php if ($permisos->insert == 1) :?>
                        <a href="<?=base_url();?>mantenimiento/articulos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar Artículo</a>
                         <?php endif ?>                         
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Código</th>
                                    <th>Modelo</th>
                                    <th>Imagen</th>
                                    <th>Marca</th>
                                    <th>Color</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Categoría</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indice=1; ?>
                                <?php if(!empty($articulos)) :?>
                                    <?php foreach ($articulos as $articulo):?>
                                        <tr>
                                            <td>
                                                <?php echo $indice;
                                                $indice += 1;?>
                                            </td>
                                            <td><?php echo $articulo->codigo;?></td>
                                            <td><?php echo $articulo->modelo;?></td>
                                            <td><img width="60" height="60" src="<?php echo base_url();?><?php echo $articulo->urlImagen;?>"/></td>
                                            <td><?php echo $articulo->marca;?></td>
                                            <td><?php echo $articulo->color;?></td>
                                            <td><?php echo $articulo->precio;?></td>
                                            <td><?php echo $articulo->stock;?></td>
                                            <td><?php echo $articulo->categoria;?></td>
                                            <?php $dataarticulo = $articulo->codigo."*".$articulo->modelo."*".$articulo->marca."*".$articulo->color."*".$articulo->stock."*".$articulo->precio."*".$articulo->categoria."*".$articulo->descripcion;?>
                                            <td>
                                                <div class="btn-group">
                                                   <button type="button" class="btn btn-info btn-view-articulo" data-toggle="modal" data-target="#modal-default" value="<?php echo $dataarticulo?>">
                                                        <span class="fa fa-eye"></span>
                                                    </button>
                                                    <?php if ($permisos->update == 1) :?>
                                                    <a href="<?=base_url();?>mantenimiento/articulos/edit/<?php echo $articulo->idArticulo;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                     <?php endif ?> 
                                                    <?php if ($permisos->delete == 1) :?>
                                                    <a href="<?=base_url();?>mantenimiento/articulos/delete/<?php echo $articulo->idArticulo;?>" class="btn btn-danger btn-remove-articulo"><span class="fa fa-remove"></span></a>
                                                     <?php endif ?> 
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif; ?>
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
        <h4 class="modal-title">Información del Artículo</h4>
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
