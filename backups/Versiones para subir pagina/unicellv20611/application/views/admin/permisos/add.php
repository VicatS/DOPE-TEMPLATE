
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Permiso
        <small>Nuevo</small>
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
                        <form action="<?php echo base_url();?>administrador/permisos/store" method="POST">
                            <div class="form-group">
                                <div class="col-md-6">
                                        <label for=""> Rol: </label>
                                       <select name="rol"  class="form-control">
                                        <?php foreach ($roles as $rol):?>
                                        <option value="<?php echo $rol->idRol;?>"><?php echo $rol->nombreRol; ?></option>
                                        <?php endforeach; ?>
                                        </select>   
                                </div>
                                <div class="col-md-6">
                                        <label for=""> Menú: </label>
                                       <select name="menu"  class="form-control">
                                        <?php foreach ($menus as $menu):?>
                                        <option value="<?php echo $menu->idMenu;?>"><?php echo $menu->nombre; ?></option>
                                        <?php endforeach; ?>
                                        </select>   
                                    </div>  
                            </div>
                            <div class="form-group">
                                 <div class="col-md-3">
                                    <br>
                                    <label>Leer:</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="leer" value="1" checked="checked">Si
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="leer" value="0" checked="checked">No
                                    </label>
                                 </div>
                                 <div class="col-md-3">
                                    <br>
                                     <label>Insertar:</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="insertar" value="1" checked="checked">Si
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="insertar" value="0" checked="checked">No
                                    </label>
                                 </div>
                                 <div class="col-md-3">
                                    <br>
                                     <label>Editar:</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="editar" value="1" checked="checked">Si
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="editar" value="0" checked="checked">No
                                    </label>
                                 </div>
                                 <div class="col-md-3">
                                    <br>
                                     <label>Eliminar:</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="eliminar" value="1" checked="checked">Si
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="eliminar" value="0" checked="checked">No
                                    </label>
                                 </div>
                            </div>
                           <div class="form-group">
                                <div class="col-md-6">
                                    <br>
                                        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                        <a class="btn btn-primary" href="<?php echo base_url();?>administrador/permisos"> Cancelar </a>
                                </div>
                            </div>
                        </form>
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
