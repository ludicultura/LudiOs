<script>
    $(document).ready(function() {
        $("#loginDivErrors").css({"display": "none"});
        
        $("#btnLogin").click(function(e) {
            e.preventDefault(); //Quitar el evento del submit
            var email = $("#loginEmail").val();
            var password = $("#loginPassword").val();

            var datos = "loginEmail=" + email +"&loginPassword=" + password;

            $.ajax({
                type: "POST",
                url: "modelos/modelo.login.php",
                data: datos,
                success: function(response) {
                    if(response == "1") //No hubo erroes
                        window.location = "index.php?page=1";
                    else {  //Ocurro un error
                        $("#loginErrors").append("<li>" + response + "</i>");
                        $("#loginDivErrors").css({"display": "block"});
                    }
                }
            });
        });
    });
</script>
