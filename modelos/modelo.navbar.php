<?php
    if(isset($_GET["cerrar"])) {
        if($_GET["cerrar"] == 1) {
            session_destroy();
            header("Location: index.php");
        }
    }
 ?>