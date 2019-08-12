<script>
    Dropzone.autoDiscover = false;
    
    $(document).ready(function() {
        //Opciones del dropzone
        Dropzone.options.mydropzone = {
            maxFilesize: 30, // MB
        };

        var dropzone = new Dropzone("div.dropzone", {url: "modelos/modelo.bitacoras.php"});  //Objeto de dropzone

        $(".historial").css("display", "none");
        $(".revision").css("display", "none");
        $(".subir-bitacora").css("display", "none");
        $(".elegir").css("display", "none");

        //Verificar si hay una cuenta y si la cuenta es de talento o no
        $.ajax({
            type: "POST",
            url: "modelos/modelo.bitacoras.php",
            data: "verificar=1",
            success: function(response) {
                if(response == "0") 
                    window.location = "index.php";
                else if(response =="Talento") 
                    $(".elegir").css("display", "block");
                else {
                    $(".historial").css("display", "block");
                    $(".subir-bitacora").css("display", "block");
                }
            }
        });

        //Obtener la semana actual
        var fecha_actual = new Date();
        var datos = "consultarSemana=" + fecha_actual.getFullYear() + "-" + (fecha_actual.getMonth() + 1) + "-" + fecha_actual.getDate();
        var periodo = "";    //Periodo actual en Ludi
        var num_semana = "";   //Numero de la semana actual
        var idSemana = "";      //Id de la semana
        $.ajax({
            type: "POST",
            url: "modelos/modelo.bitacoras.php",
            data: datos,
            success: function (response) {
                var datosSemana = response.split(",");
                periodo = datosSemana[2];
                num_semana = datosSemana[1];
                idSemana = datosSemana[0];
                $("#bitacorasSemana").text(datosSemana[2] + " Semana " + datosSemana[0] + " (" + datosSemana[3] + " a " + datosSemana[4] + ")");
            }
        });

        //Obtener el historial de bitacoras
        $.ajax({
            type: "POST",
            url: "modelos/modelo.bitacoras.php",
            data: "historial=1",
            success: function (response) {
                var bitacora = response.split(";");
                var datos = Array();
                for(var i = 0; i < bitacora.length - 1; i++) {
                    datos = bitacora[i].split(",");
                    datos[3] = (datos[3] == "") ? "No rebisada" : datos[3];
                    $("#historial").append("<tr><td>" + datos[2] + "</td><td><a href=\"#\" onclick=\"abrirArchivo(this.text, '" + periodo + "')\">" + datos[0] + "</a></td><td>" + datos[1] + "</td><td>" + datos[3] + "</td><td>" + "<button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#verComentarios\">Ver Comentarios</button>" + "</td></tr>");
                }
            }
        });

        //Subir la bitacora
        $("#btnSubir").click(function (e) {
            e.preventDefault();

            //Si hay una bitacora cargada en el dropzone
            if(dropzone.getAcceptedFiles().length > 0) {
                var datos = new FormData();
                datos.append("bitacora", dropzone.getAcceptedFiles()[0]);
                datos.append("periodo", periodo);
                datos.append("idSemana", idSemana);
                datos.append("semana", fecha_actual.getFullYear() + "-" + (fecha_actual.getMonth() + 1) + "-" + fecha_actual.getDate());

                $.ajax({
                    type: "POST",
                    url: "modelos/modelo.bitacoras.php",
                    contentType: false,
                    data: datos,
                    processData: false,
                    success: function (response) {
                        alert(response);
                    }
                });
            }
        });
    });

    function btnSubirBitacora() {
        $(".historial").css("display", "block");
        $(".subir-bitacora").css("display", "block");
        $(".elegir").css("display", "none");
    }

    function btnEvaluarBitacora() {
        $(".revision").css("display", "block");
        $(".elegir").css("display", "none");
    }

    var valorEntregado;
    function entregado(x){
        switch(x) {
            case 1:
                $('#si').css('background-color','green');
                $('#no').css('background-color','white');
                valorEntregado = true;
                break;
            case 2:
                $('#si').css('background-color','white');
                $('#no').css('background-color','red');
                valorEntregado = false;
                break;
        }
    }

    //Funcion abrir archivo
    function abrirArchivo(text, periodo) {
        var datos = "archivo=" + text + "&periodo=" + periodo;
        $.ajax({
            type: "post",
            url: "modelos/modelo.bitacoras.php",
            data: datos,
            success: function(response) {alert(response);
                window.location = response;
            }
        });        
    }
</script>