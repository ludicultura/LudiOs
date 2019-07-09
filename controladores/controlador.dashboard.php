<script>
    $(document).ready(function() {
        $("#idDashboardNombre").text("<?php echo $_SESSION["sessionNombre"]; ?>");
        $("#idDashboardTipo").append("<?php echo $_SESSION["sessionTipo"]; ?>");
        $("#idDashboardComision").append("<?php echo $_SESSION["sessionComision"]; ?>");
        $("#idDashboardCarrera").append("<?php echo $_SESSION["sessionCarrera"]; ?>");
    });
</script>