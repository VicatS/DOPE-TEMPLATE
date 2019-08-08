
<div class="content-wrapper">

	 <section class="content-header">
        <h1>
        Pantallas
        <small>Por modelo</small>
        </h1>
    </section>
	
	<ul class="galeria">
		<li><a href="#img1"><img src="<?php echo base_url();?>imagenes/E1.jpeg"></a></li>
		<li><a href="#img2"><img src="<?php echo base_url();?>imagenes/E2.jpeg"></a></li>
		<li><a href="#img3"><img src="<?php echo base_url();?>imagenes/E3.jpeg"></a></li>
		<li><a href="#img4"><img src="<?php echo base_url();?>imagenes/E4.jpeg"></a></li>
	</ul>

	<div class="modal" id="img1">
		<h3>Paisaje 1</h3>
		<div class="imagen">
			<a href="#img4">&#60;</a>
			<a href="#img2"><img src="<?php echo base_url();?>imagenes/E2.jpeg"></a>
			<a href="#img2">></a>
		</div>
		<a class="cerrar" href="">X</a>
	</div>
	
	<div class="modal" id="img2">
		<h3>Paisaje 2</h3>
		<div class="imagen">
			<a href="#img1">&#60;</a>
			<a href="#img3"><img src="<?php echo base_url();?>imagenes/E3.jpeg"></a>
			<a href="#img3">></a>
		</div>
		<a class="cerrar" href="">X</a>
	</div>
	
	<div class="modal" id="img3">
		<h3>Paisaje 3</h3>
		<div class="imagen">
			<a href="#img2">&#60;</a>
			<a href="#img4"><img src="<?php echo base_url();?>imagenes/E4.jpeg"></a>
			<a href="#img4">></a>
		</div>
		<a class="cerrar" href="">X</a>
	</div>
	
	<div class="modal" id="img4">
		<h3>Paisaje 4</h3>
		<div class="imagen">
			<a href="#img3">&#60;</a>
			<a href="#img1"><img src="<?php echo base_url();?>imagenes/E1.jpeg""></a>
			<a href="#img1">></a>
		</div>
		<a class="cerrar" href="">X</a>
	</div>
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
            	 <div class="row">
                                <div class="col-md-12">
                                    <table id="example1" class="table table-bordered btn-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Color</th>
                                                <th>Precio</th>
                                                <th>Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Negro</td>
                                                    <td>300.50</td>
                                                    <td>5</td>
                                                </tr>
                                                 <tr>
                                                    <td>2</td>
                                                    <td>Blanco</td>
                                                    <td>300.50</td>
                                                    <td>2</td>
                                                </tr>  
                                                 <tr>
                                                    <td>3</td>
                                                    <td>Dorado</td>
                                                    <td>300.50</td>
                                                    <td>1</td>
                                                </tr>        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
           </div>
        </div>
    </section>
</div>