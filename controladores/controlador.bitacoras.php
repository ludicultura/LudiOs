<script>

var valorEntregado;

function entregado(x){
    switch (x) {

case 1:
$('#si').css('background-color','green');
$('#no').css('background-color','white');
valorEntregado = true;

break;

case 2:
$('#si').css('background-color','white');
$('#no').css('background-color','red');
valorEntregado = false;

break;

}
}




</script>