
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Cliente
        <small>Editar</small>
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
                        <form action="<?=base_url();?>administrador/usuarios/update" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Nombres:</label>
                                        <input type="hidden" name="id_persona" value="<?php echo $persona->idPersona;?>">
                                        <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $persona->nombres;?>" >
                                    </div> 
                                    <div class="col-md-6">
                                        <label for=""> Apellido Paterno:</label>
                                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="<?php echo $persona->apellidoPaterno;?>" >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Apellido Materno:</label>
                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno"  value="<?php echo $persona->apellidoMaterno;?>" >
                                    </div> 
                                    <div class="col-md-6">
                                        <label for=""> Email:</label>
                                        <input type="text" class="form-control" id="email" name="email"  value="<?php echo $persona->email;?>">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Nro Celular:</label>
                                        <input type="text" class="form-control" id="celular" name="celular"  value="<?php echo $persona->nroCelular;?>">
                                    </div> 
                                    <div class="col-md-6">
                                        <label for="">Teléfono Referencia:</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono"  value="<?php echo $persona->telefonoReferencia;?>">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="col-md-6">
                                    <input type="hidden" name="id_usuario" value="<?php echo $usuario->idUsuario;?>">
                                    <label for=""> Nombre Usuario</label>
                                        <input type="text" class="form-control"  name="nombreUsuario"  value="<?php echo $usuario->nombreUsuario;?>">
                                    </div> 
                                    <div class="col-md-6">
                                        <label for=""> Rol: </label>
                                       <select name="rol"  class="form-control">
                                       <?php foreach ($roles as $rol):?>
                                            <?php if ($rol->idRol ==$usuario->idRol):?>
                                                <option value="<?php echo $rol->idRol;?>" selected><?php echo $rol->nombreRol; ?></option>
                                            <?php else:?>
                                                <option value="<?php echo $rol->idRol;?>"><?php echo $rol->nombreRol; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        </select>   
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Contraseña Actual:</label>
                                        <input type="text" class="form-control" id="celular" name="celular"  value="<?php echo $usuario->password;?>">
                                    </div> 
                                    <div class="col-md-6">
                                        <label for="">Contraseña Nueva:</label>
                                        <input type="text" class="form-control" id="contrasena" name="contrasena">
                                    </div>
                                </div>

                                    <div class="col-md-12">
                                        <br>
                                            <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                            <a class="btn btn-primary" href="<?php echo base_url();?>administrador/usuarios"> Cancelar </a>
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
