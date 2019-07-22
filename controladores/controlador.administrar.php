<script>
    $(document).ready(function() {
        //Ocultar cuadro de errores
        $("#loginDivErrors").css({"display":"none"});

        //Verificar sesion iniciada
        $.ajax({
            type: "POST",
            url: "modelos/modelo.administrar.php",
            data: "verificar=1",
            success: function(response) {
                if(response == "0")
                    document.location = "index.php";
            }
        });

        //Cargar universidades
        $.ajax({
            type: "POST",
            url: "modelos/modelo.administrar.php",
            data: "consultaUniversidades=1",
            success: function(response) {
                if(response == "0")
                    alert("No se conectó a la base de datos");
                else {
                    var datos = response.split(",");
                    for(var i = 0; i < datos.length - 1; i++)
                        $("#registroUniversidad").append("<option>" + datos[i] + "</option>");
                }
            }
        });

        //Cargar comisiones
        $.ajax({
            type: "POST",
            url: "modelos/modelo.administrar.php",
            data: "consultaComisiones=1",
            success: function(response) {
                if(response == "0")
                    alert("No se conectó a la base de datos");
                else {
                    var datos = response.split(",");
                    for(var i = 0; i < datos.length - 1; i++)
                        $("#registroComision").append("<option>" + datos[i] + "</option>");
                }
            }
        });

        //Cargar funciones
        $.ajax({
            type: "POST",
            url: "modelos/modelo.administrar.php",
            data: "consultaFunciones=1",
            success: function(response) {
                if(response == "0")
                    alert("No se conectó a la base de datos");
                else {
                    var datos = response.split(",");
                    for(var i = 0; i < datos.length - 1; i++)
                        $("#registroFuncion").append("<div class=\"dropdown-item\"><input type=\"checkbox\" class=\"form-check-input\" name=\"funcion[]\" value=\"" + datos[i] + "\"><label class=\"form-check-label\">" + datos[i] + "</label></div>");
                }
            }
        });

        //Cargar facultades
        $("#registroUniversidad").change(function() {
            var universidad = $("#registroUniversidad").val();
            $("#registroFacultad").empty().append("<option disabled selected>(Seleccionar facultad)</option>");

            $.ajax({
                type: "POST",
                url: "modelos/modelo.administrar.php",
                data: "consultaFacultades=" + universidad,
                success: function(response) {
                    if(response == "0")
                        alert("No se conectó a la base de datos");
                    else {
                        var datos = response.split(",");
                        for(var i = 0; i < datos.length - 1; i++)
                            $("#registroFacultad").append("<option>" + datos[i] + "</option>");
                    }
                }
            });
        });

        //Cargar carreras
        $("#registroFacultad").change(function() {
            var facultad = $("#registroFacultad").val();
            $("#registroCarrera").empty().append("<option disabled selected>(Seleccionar carrera)</option>");

            $.ajax({
                type: "POST",
                url: "modelos/modelo.administrar.php",
                data: "consultaCarreras=" + facultad,
                success: function(response) {
                    if(response == "0")
                        alert("No se conectó a la base de datos");
                    else {
                        var datos = response.split(",");
                        for(var i = 0; i < datos.length - 1; i++)
                            $("#registroCarrera").append("<option>" + datos[i] + "</option>");
                    }
                }
            });
        });

        //Ocultar o mostrar el panel de registro de Ludi
        $("#registroEsLudi").change(function() {
            if(this.checked)
                $(".divDatosLudi").css({"display":"block"});
            else 
                $(".divDatosLudi").css({"display":"none"});
        });

        //Confirmar Password automaticamente
        $("#registroPassword2").keyup(function() {
            //alert($("#registroPassword2").val());
        });

        //Registrar al Ludi
        $("#btnRegistrar").click(function(e) {
            e.preventDefault();

            //Errores ocurridos durente el registro
            var errors = Array();
            
            //Leer datos
            var nombre = $("#registroNombre").val();
            var nickname = $("#registroNickname").val();
            var telefono = $("#registroTelefono").val();
            var correo = $("#registroEmail").val();
            var username = $("#registroUsername").val();
            var password = $("#registroPassword").val();
            var password2 = $("#registroPassword2").val();
            var semestre = $("#registroSemestre").val();
            var universidad = $("#registroUniversidad option:selected").text();
            var facultad = $("#registroFacultad option:selected").text();
            var carrera = $("#registroCarrera option:selected").text();
        
            if(nombre != "" && nickname != "" && telefono != "" && correo != "" && username != "" && password != "" && password2 != "" &&
               !semestre.includes("Seleccionar") && !universidad.includes("Seleccionar") && !facultad.includes("Seleccionar") && !carrera.includes("Seleccionar")) {
                if(password == password2) {     //Verificar el password
                    var datos = "insertar=1&nombre=" + nombre + "&nickname=" + nickname + "&telefono=" + telefono + "&correo=" + correo + "&username=" + username + "&password=" + password;
                    datos += "&semestre=" + semestre + "&universidad=" + universidad + "&facultad=" + facultad + "&carrera=" + carrera + "&comision=" + comision;
                    
                    if($("#registroEsLudi").is(":checked")) {   //Verificar si es ludi
                        //Leer los datos del Ludi
                        var comision = $("#registroComision option:selected").text();
                        //Obtener los tipos de un ludi
                        var funciones = "";
                        $("input[name=\"funcion[]\"]:checked").each(function() {
                            funciones += $(this).val() + "-";
                        });
                        var fecha = $("#registroFecha").val();
                        var personalidad = $("#registroPersonalidad").val();
                        
                        //Verificar que no esten vacios
                        if(!comision.includes("Seleccionar") && funciones != "" && fecha != "" && personalidad != "")
                            datos += "&comision=" + comision + "&fecha=" + fecha + "&personalidad=" + personalidad  + "&tipos=" + funciones;
                        else 
                            errors.push("Datos incompletos");
                    }

                    if(errors.length == 0) {
                        //Mandar los datos al modelos
                        $.ajax({
                            type: "POST",
                            url: "modelos/modelo.administrar.php",
                            data: datos,
                            success: function(response) {
                                alert(response);
                            }
                        });
                    }
                } else
                    errors.push("Los password no coinciden");
            } else 
                errors.push("Datos incompletos");
            
            if(errors.length != 0) {
                for(var i = 0; i < errors.length; i++)
                    $("#loginErrors").append("<li>" + errors[i] + "</li>");
                $("#loginDivErrors").css({"display":"block"});
            }
        });
    });
</script>