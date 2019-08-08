
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Clientes
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
                        <form action="<?=base_url();?>administrador/usuarios/store" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Nombres:</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" >
                                    </div> 
                                    <div class="col-md-6">
                                        <label for=""> Apellido Paterno:</label>
                                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Apellido Materno:</label>
                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" >
                                    </div> 
                                    <div class="col-md-6">
                                        <label for=""> Email:</label>
                                        <input type="text" class="form-control" id="email" name="email" >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Nro Celular:</label>
                                        <input type="text" class="form-control" id="celular" name="celular" >
                                    </div> 
                                    <div class="col-md-6">
                                        <label for="">Teléfono Referencia:</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Nombre Usuario</label>
                                        <input type="text" class="form-control"  name="nombreUsuario" >
                                    </div> 
                                    <div class="col-md-6">
                                        <label for=""> Contraseña: </label>
                                        <input type="text" class="form-control"  name="contrasena" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Imagen Usuario</label>
                                        <input type="file" class="form-control" name="foto_usuario" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""> Rol: </label>
                                       <select name="rol"  class="form-control">
                                        <?php foreach ($roles as $rol):?>
                                        <option value="<?php echo $rol->idRol;?>"><?php echo $rol->nombreRol; ?></option>
                                        <?php endforeach; ?>
                                        </select>   
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                            <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                            <a class="btn btn-primary" href="<?php echo base_url();?>administrador/usuarios"> Cancelar </a>
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
