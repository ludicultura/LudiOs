<script>
    var displayError = function(error) {
        if (error != "") {
            document.write("<div id=\"error\" class=\"alert alert-danger\" role=\"alert\"><a href=\"#\" onclink=\"showHide(\"error\");\>[X]</a><ul>");
            document.write("<li>" + error + "</li>");
            document.write("</ul></div>");
        }
    }
</script>