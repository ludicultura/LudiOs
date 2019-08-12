<script>
    $(document).ready(function() {
        
        //Evento de si es Ludi o aspirante
        $("#registroEsLudi").change(function() {
            if(this.checked) {
                $(".divDatosLudi").css("display", "block");
                
            } else {
                $(".divDatosLudi").css("display", "none");
             
            }
        });
    });

    
</script>
<script>
function cambiarDiv(x){
    switch (x) {

        case 1:
        $('.h1Registro').html('Editar Perfil');
        $('.divEditar').css('display','block');
        $('.divCambiar').css('display','none');
        $('.divNotificacion').css('display','none');

        break;

        case 2:
        $('.h1Registro').html('Cambiar Contraseña');
        $('.divEditar').css('display','none');
        $('.divCambiar').css('display','block');
        $('.divNotificacion').css('display','none');

        break;

        case 3:
        
        $('.h1Registro').html('Notificaciones');
        $('.divEditar').css('display','none');
        $('.divNotificacion').css('display','block');
        $('.divCambiar').css('display','none');
        break;
    }
}

</script>