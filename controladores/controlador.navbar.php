<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "modelos/modelo.navbar.php",
            data: "verificar=1",
            success: function (response) {
                $("#navbarNombre").text(response);
            }
        });
    });

    var btnCerrar = function() {
        $.ajax({
            type: "POST",
            url: "modelos/modelo.navbar.php",
            data: "cerrar=1",
            success: function (response) {
                document.location = "index.php";
            }
        });
    }
</script>