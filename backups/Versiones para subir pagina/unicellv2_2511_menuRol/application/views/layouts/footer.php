        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- Jquery 1.12.1 -->
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- Jquery-print -->
<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<!-- Highcharts 6.2.2 -->
<script src="<?php echo base_url()?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url()?>assets/template/highcharts/exporting.js"></script>
<script src="<?php echo base_url()?>assets/template/highcharts/export-data.js"></script>

<script type="text/javascript">
   

    //capturar valores de metodo Ventas_model--> montos
    function datagrafico(base_url,year){
        nameMonth= ["Ene", "Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
        $.ajax({
            url: base_url + 'dashboard/getData',
            type: 'POST',
            dataType: 'json',
            data: {year: year},
            success:function(data){
                var meses = new Array();
                var montos = new Array();
                $.each(data, function(key, value){
                    meses.push(nameMonth[value.mes - 1]);
                    valor = Number(value.monto);
                    montos.push(valor);
                });
                graficar(meses,montos,year);     
            }
        });          
    } 


   function graficar(meses,montos,year){
    Highcharts.chart('grafico', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monto acumulado de ventas según meses'
    },
    subtitle: {
        text: 'Año:' + year 
    },
    xAxis: {
        categories: meses,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Monto acumulado (Bs)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{Monto}: </td>' +
            '<td style="padding:0"><b>{point.y:.2f} Bolivianos</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        },
        series:{
            dataLabels:{
                enabled: true,
                formatter:function(){
                    return Highcharts.numberFormat(this.y,2)
                }
            }
        }
    },
    series: [{
        name: 'Meses',
        data: montos

    }]
});
}

</script>

<script >
$(document).ready(function () {
    var base_url= "<?php echo base_url();?>";

    //variable year para llamar datos del año seleccionado 
    var year = (new Date).getFullYear();

    //para llamar a funcion grafico creada arriba
    datagrafico(base_url,year);
    $("#year").on("change",function(){
        yearselect = $(this).val();
        datagrafico(base_url,yearselect);
    });

    $(".btn-remove-cliente").on("click", function(e){
    e.preventDefault();
    var ruta = $(this).attr("href");
    //alert(ruta)
    $.ajax({
        url:ruta,
        type:"POST",
        success:function(resp){
            //http://localhost:808/unicellv2/mantenimiento/articulos
            window.location.href=base_url + resp;
        }
    })
     });

     $(".btn-remove-usuario").on("click", function(e){
    e.preventDefault();
    var ruta = $(this).attr("href");
    //alert(ruta)
    $.ajax({
        url:ruta,
        type:"POST",
        success:function(resp){
            //http://localhost:808/unicellv2/mantenimiento/articulos
            window.location.href=base_url + resp;
        }
    })
     });

    $(".btn-remove-articulo").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        //alert(ruta)
        $.ajax({
            url:ruta,
            type:"POST",
            success:function(resp){
                //http://localhost:808/unicellv2/mantenimiento/articulos
                window.location.href=base_url + resp;
            }
        })
     });

     $(".btn-remove-categoria").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        $.ajax({
            url:ruta,
            type:"POST",
            success:function(resp){
                //http://localhost:808/unicellv2/mantenimiento/categorias
                window.location.href=base_url + resp;
            }
        })
     });

      $(".btn-remove-marca").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        $.ajax({
            url:ruta,
            type:"POST",
            success:function(resp){
                //http://localhost:808/unicellv2/mantenimiento/marcas
                window.location.href=base_url + resp;
            }
        })
     });

      //ver categoria
    $(".btn-view-categoria").on("click", function(){
        var idCategoria = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/categorias/view/" + idCategoria,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });

     //mostrar cliente
    $(".btn-view-cliente").on("click", function(){
        var cliente = $(this).val(); 
        //alert(cliente);
        var infocliente = cliente.split("*");
        html = "<p><strong>Nombres: </strong>" + infocliente[0]+"</p>"
        html += "<p><strong>Apellido Paterno: </strong>" + infocliente[1]+"</p>"
        html += "<p><strong>Apellido Materno: </strong>" + infocliente[2]+"</p>"
        html += "<p><strong>Email: </strong>" + infocliente[3]+"</p>"
        html += "<p><strong>Nro Celular: </strong>" + infocliente[4]+"</p>"
        html += "<p><strong>Teléfono Referencia: </strong>" + infocliente[5]+"</p>"
        html += "<p><strong>Razón Social: </strong>" + infocliente[6]+"</p>"
        html += "<p><strong># Documento: </strong>" + infocliente[7]+"</p>"
        html += "<p><strong>Tipo Cliente: </strong>" + infocliente[8]+"</p>"
        html += "<p><strong>Tipo Documento: </strong>" + infocliente[9]+"</p>"
        $("#modal-default .modal-body").html(html);
    });

       //mostrar usuario
    $(".btn-view-usuario").on("click", function(){
        var usuario = $(this).val(); 
        //alert(cliente);
        var infousuario = usuario.split("*");infousuario
        html = "<p><strong>Nombres: </strong>" + infousuario[0]+"</p>"
        html += "<p><strong>Apellido Paterno: </strong>" + infousuario[1]+"</p>"
        html += "<p><strong>Apellido Materno: </strong>" + infousuario[2]+"</p>"
        html += "<p><strong>Email: </strong>" + infousuario[3]+"</p>"
        html += "<p><strong>Nro Celular: </strong>" + infousuario[4]+"</p>"
        html += "<p><strong>Teléfono Referencia: </strong>" + infousuario[5]+"</p>"
        html += "<p><strong>Nombre Usuario: </strong>" + infousuario[6]+"</p>"
        $("#modal-default .modal-body").html(html);
    });

    //ver articulo
       $(".btn-view-articulo").on("click", function(){
        var articulo = $(this).val(); 
        //alert(cliente);
        var infoarticulo = articulo.split("*");
        html = "<p><strong>Código:</strong>" + infoarticulo[0]+"</p>"
        html += "<p><strong>Modelo:</strong>" + infoarticulo[1]+"</p>"
        html += "<p><strong>Marca:</strong>" + infoarticulo[2]+"</p>"
        html += "<p><strong>Color:</strong>" + infoarticulo[3]+"</p>"
        html += "<p><strong>Stock:</strong>" + infoarticulo[4]+"</p>"
        html += "<p><strong>Precio:</strong>" + infoarticulo[5]+"</p>"
        html += "<p><strong>Categoria:</strong>" + infoarticulo[6]+"</p>"
        html += "<p><strong>Descripción:</strong>" + infoarticulo[7]+"</p>"
        $("#modal-default .modal-body").html(html);
    });

      $(".btn-view-marca").on("click", function(){
        var idMarca = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/marcas/view/" + idMarca,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });
    });

    // dataTable-export-lenguaje
       $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',//boton a implementar
                title: "Listado de Ventas",
                exportOptions: {
                    columns: [ 0, 1,2, 3]
                }
            },
            {
                extend: 'pdfHtml5',
                title: "Listado de Ventas",
                exportOptions: {
                    columns: [ 0, 1,2, 3]
                }
                
            },
            {
                extend: 'print',
                title: "Listado de Ventas",
                exportOptions: {
                    columns: [ 0, 1,2, 3]
                }
                
            }
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
        });

        // dataTable-export-lenguaje para ordenes
       $('#example3').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',//boton a implementar
                title: "Listado de Órdenes de Servicio",
                exportOptions: {
                    columns: [ 0, 1,2, 3,4]
                }
            },
            {
                extend: 'pdfHtml5',
                title: "Listado de Órdenes de Servicio",
                exportOptions: {
                    columns: [ 0, 1,2, 3,4]
                }
                
            },
            {
                extend: 'print',
                title: "Listado de Órdenes de Servicio",
                exportOptions: {
                    columns: [ 0, 1,2, 3,4]
                }
                
            }
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
        });

          // dataTable-export-lenguaje para ordenes
       $('#example4').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',//boton a implementar
                title: "Listado de Órdenes de Servicio",
                exportOptions: {
                    columns: [ 0, 1,2, 3]
                }
            },
            {
                extend: 'pdfHtml5',
                title: "Listado de Órdenes de Servicio",
                exportOptions: {
                    columns: [ 0, 1,2, 3]
                }
                
            },
            {
                extend: 'print',
                title: "Listado de Órdenes de Servicio",
                exportOptions: {
                    columns: [ 0, 1,2, 3]
                }
                
            }
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
        });
          
      //dar lenguaje para paginacion datatables.net
	$('#example1').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    $('#example2').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar IMEI registrados",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

	$('.sidebar-menu').tree();

    //codigo para recuperar variables de comprobantes
    $("#comprobantes").on("change",function(){
        option=$(this).val();

        if (option != "") {
            infocomprobante = option.split("*");

            $("#idcomprobante").val(infocomprobante[0]);
            $("#iva").val(infocomprobante[2]);
            $("#serie").val(infocomprobante[3]);
            $("#numero").val(generarnumero(infocomprobante[1]));
        }
        else{
            $("#idcomprobante").val(null);
            $("#iva").val(null);
            $("#serie").val(null);
            $("#numero").val(null);
        }
        sumar();
    })

    // para recuperar clientes en un modal
    $(document).on('click', '.btn-check', function() {
        cliente = $(this).val();
        infocliente = cliente.split("*");
        $("#idcliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#numDocumento").val(infocliente[2]);
        $("#nrocelular").val(infocliente[3]);
        $("#teleref").val(infocliente[4]);
        $("#modal-default").modal("hide");
    });

    // para recuperar articulos-modelo en un modal
    $(document).on('click', '.btn-check-modelo', function() {
        articulo = $(this).val();
        infoarticulo = articulo.split("*");
        $("#codigo").val(infoarticulo[0]);
        $("#modelo").val(infoarticulo[1]);
        $("#idcliente").val(infoarticulo[2]);
        $("#cliente").val(infoarticulo[3]);
        $("#numDocumento").val(infoarticulo[4]);
        $("#nrocelular").val(infoarticulo[5]);
        $("#teleref").val(infoarticulo[6]);
        $("#modal-default-articulo").modal("hide");
    });

    // para recuperar articulos para un autocomplete segun modelo
       $("#articulo").autocomplete({
        source:function(request, response){
            $.ajax({
                url: base_url+"movimientos/ventas/get_articulos",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
        },
        minLength:4,
        select:function(event, ui){
            data = ui.item.idArticulo + "*"+ ui.item.codigo+ "*"+ ui.item.label+ "*"+ ui.item.precio+ "*"+ ui.item.stock;
            $("#btn-agregar").val(data);
        },
    });

    //para agregar articulos (valores en campos ocultos) segun modelo
    $("#btn-agregar").on("click",function(){
        data = $(this).val();
        if (data !='') {
            infoarticulo = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idArticulo[]' value='"+infoarticulo[0]+"'>"+infoarticulo[1]+"</td>";
            html += "<td>"+infoarticulo[2]+"</td>";
            html += "<td><input type='hidden' name='precios[]' value='"+infoarticulo[3]+"'>"+infoarticulo[3]+"</td>";
            html += "<td>"+infoarticulo[4]+"</td>";
            html += "<td><input type='text' name='cantidades[]' value='1' class='cantidades'></td>";
            html += "<td><input type='hidden' name='importes[]' value='"+infoarticulo[3]+"'><p>"+infoarticulo[3]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-articulo'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbventas tbody").append(html);
            sumar();
            $("#btn-agregar").val(null);
            $("#articulo").val(null);
        }else{
            alert("Seleccione un artículo ...");
        }
    });

    // para recuperar servicios para un autocomplete 
       $("#servicio").autocomplete({
        source:function(request, response){
            $.ajax({
                url: base_url+"movimientos/ordenservicio/get_servicios",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
        },
        minLength:2,
        select:function(event, ui){
            data = ui.item.idServicio + "*"+ ui.item.label+ "*"+ ui.item.precio;
            $("#btn-agregar-servicio").val(data);
        },
    });

    //para agregar servicios (valores en campos ocultos)
    $("#btn-agregar-servicio").on("click",function(){
        data = $(this).val();
        if (data !='') {
            infoservicio = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idServicio[]' value='"+infoservicio[0]+"'>"+infoservicio[1]+"</td>";
            html += "<td><input type='hidden' name='precios[]' value='"+infoservicio[2]+"'>"+infoservicio[2]+"</td>";
            html += "<td><input type='text' name='cantidades[] 'readonly value='1' class='cantidades'></td>";
            html += "<td><input type='hidden' name='importes[]' value='"+infoservicio[2]+"'><p>"+infoservicio[2]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-articulo'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbordenes tbody").append(html);
            sumarOrden();
            $("#btn-agregar-servicio").val(null);
            $("#servicio").val(null);
        }else{
            alert("Seleccione un servicio ...");
        }
    });

   
    // eliminacion logica-ajax
    $(document).on("click",".btn-remove-articulo", function(){
        $(this).closest("tr").remove();
        sumar();
    });

    // columnda de detalle ventas para tabla
    $(document).on("keyup","#tbventas input.cantidades input.precios", function(){
       cantidad = $(this).val();
        precio = $(this).closest("tr").find("td:eq(1)").text();
        importe = cantidad * precio;
        $(this).closest("tr").find("td:eq(5)").children("p").text(importe.toFixed(2));
        $(this).closest("tr").find("td:eq(5)").children("input").val(importe);
        sumar();
    });

      // columnda de detalle servicio para tabla
    $(document).on("keyup","#tbordenes input.cantidades", function(){
        cantidad = $(this).val();
        precio = $(this).closest("tr").find("td:eq(1)").text();
        importe = cantidad * precio;
        $(this).closest("tr").find("td:eq(3)").children("p").text(importe.toFixed(2));
        $(this).closest("tr").find("td:eq(3)").children("input").val(importe);
        sumar();
    });

   
    
    // ver venta-modal
    $(document).on("click",".btn-view-venta",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "movimientos/ventas/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#modal-default .modal-body").html(data);
            }
        });
    });

    // boton para impresion-venta
    $(document).on("click",".btn-print",function(){
        $("#modal-default .modal-body").print({
           title:"Nota de Venta"
       });
    });

    // boton para impresion
    $(document).on("click",".btn-print-orden",function(){
        $("#imprimirOrden").print({
           title:"Orden de servicio"
       });
    });

     })

    //para generar un numero para nota de venta
    function generarnumero(numero){
        if (numero>= 99999 && numero< 999999) {
            return Number(numero)+1;
        }
        if (numero>= 9999 && numero< 99999) {
            return "0" + (Number(numero)+1);
        }
        if (numero>= 999 && numero< 9999) {
            return "00" + (Number(numero)+1);
        }
        if (numero>= 99 && numero< 999) {
            return "000" + (Number(numero)+1);
        }
        if (numero>= 9 && numero< 99) {
            return "0000" + (Number(numero)+1);
        }
        if (numero < 9 ){
            return "00000" + (Number(numero)+1);
        }
    }

     //funcion para sumar el total de una venta
    function sumar(){
    subtotal = 0;
    $("#tbventas tbody tr").each(function(){
        subtotal = subtotal + Number($(this).find("td:eq(5)").text());
    });
    $("input[name=subtotal]").val(subtotal.toFixed(2));
    porcentaje = $("#iva").val();
    iva = subtotal * (porcentaje/100);
    $("input[name=iva]").val(iva.toFixed(2));
    descuento = $("input[name=descuento]").val();
    total = subtotal + iva - descuento;
    $("input[name=total]").val(total.toFixed(2));

    }

     //funcion para sumar el total de una orden de servicio
    function sumarOrden(){
    subtotal = 0;
    $("#tbordenes tbody tr").each(function(){
        subtotal = subtotal + Number($(this).find("td:eq(3)").text());
    });
    $("input[name=subtotal]").val(subtotal.toFixed(2));
    porcentaje = $("#iva").val();
    iva = subtotal * (porcentaje/100);
    $("input[name=iva]").val(iva.toFixed(2));
    descuento = $("input[name=descuento]").val();
    total = subtotal - descuento;
    $("input[name=total]").val(total.toFixed(2));
    }
</script>
<script type="text/javascript">
function sbClock() {
 var DateString=(new Date()).toString();
 self.status=DateString.substring(0,3+DateString.lastIndexOf(':'));
 setTimeout("sbClock()",200);}
 window.onload=function(){sbClock();}
</script>

</body>
</html>
