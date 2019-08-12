<script>
    //Mostar u ocultar la barra lateral
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "modelos/modelo.nav.php",
            data: "verificar=1",
            success: function (response) {
                $(".barraIzq").css({"display":response});
            }
        });
    });
</script>