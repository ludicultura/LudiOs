<script>
    $(document).ready(function() {
        //Mostrar las carreras registradas
        for(var i = 0; i < carreras.length; i++) 
            $("#registroCarrera").append("<option>" + carreras[i].nombre + "</option>");
        
        //Mostrar las comisiones registradas
        for(var i = 0; i < comisiones.length; i++) 
            $("#registroComision").append("<option>" + comisiones[i].nombre + "</option>");

        //Mostrar los tipos de ludis
        for(var i = 0; i < comisiones.length; i++) 
            $("#registroFuncion").append("<option>" + tipos[i].nombre + "</option>");
        
        //Evento de si es Ludi o aspirante
        $("#registroEsLudi").change(function() {
            if(this.checked) {
                $("#registroComision").prop("disabled", false);
                $("#registroFuncion").prop("disabled", false);
                $("#registroFecha").prop("disabled", false);
                $("#registroPersonalidad").prop("disabled", false);
            } else {
                $("#registroComision").prop("disabled", true);
                $("#registroFuncion").prop("disabled", true);
                $("#registroFecha").prop("disabled", true);
                $("#registroPersonalidad").prop("disabled", true);
            }
        });
    });
</script>