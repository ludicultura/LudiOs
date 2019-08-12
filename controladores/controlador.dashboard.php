<script>
    $(document).ready(function() {
        //Verificar inicio de sesion
        $.ajax({
            type: "POST",
            url: "modelos/modelo.dashboard.php",
            data: "verificar=1",
            success: function(response) {
                if(response == "0")
                    window.location = "index.php";
                else {
                    datos = response.split(",");
                    $("#idDashboardNombre").text(datos[0] + " (" + datos[1] + ")");
                    $("#idDashboardTipo").append(datos[2]);
                    $("#idDashboardComision").append(datos[3]);
                    $("#idDashboardCarrera").append(datos[4]);
                }
            }
        });
    });
</script>