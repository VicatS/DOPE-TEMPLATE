  <script type="text/javascript">
  	//para agregar servicios (valores en campos ocultos)
    $("#btn-agregar-servicio").on("click",function(){
        data = $(this).val();
        if (data !='') {
            infoservicio = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idServicio[]' value='"+infoservicio[0]+"'>"+infoservicio[1]+"</td>";
            html += "<td><input type='text' name='precios[]' value='"+infoservicio[2]+"' class='precios'></td>";
            html += "<td><input type='text' name='cantidades[] 'readonly value='1' class='cantidades'></td>";
            html += "<td><input type='hidden' name='importes[]' value='"+infoservicio[2]+"'><p>"+infoservicio[2]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-articulo'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbordenes tbody").append(html);
            sumarOrden();
            $("#btn-agregar-servicio").val(null);
            $("#servicio").val(null);
        }else{
            alert("Seleccione un servicio válido ...");
        }
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
  </script>
  