<script>
    $(document).ready(function() {
        nombre = "<?php echo $_SESSION["sessionNombre"]; ?>";
        nombre = (nombre == "") ? "LudiOs": nombre;  //Verificar si hay una sesion iniciada
        $("#navbarNombre").text(nombre);   //Mostrar el nombre del Ludi en la barra superior
    });
</script>