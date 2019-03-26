<?php
    function displayErrors($errores) {
        if(count($errores) > 0) {
            echo "<div id=\"error\" class=\"alert alert-danger\" role=\"alert\"><a href=\"#\" onclink=\"showHide(\"error\");\>[X]</a><ul>";
            foreach ($errores as $error)
                echo "<li>".$error."</li>";
            echo "</ul></div>";
        }
  }
 ?>