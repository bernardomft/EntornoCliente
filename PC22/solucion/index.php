<?php

if ($_REQUEST){
	$d = json_decode($_REQUEST['json']);
	usleep($d[1]*1000);
	echo $d[0];
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
<script>

var a=[7,8,4,6,5,4,3,2,1];
var b=[10,500,200,1000,200,300,400,200,300];

function envio() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.write("recibido a="+this.responseText+" tiempo:"+tiempo()+"<br/>"); 
            if (z>a.length-2){return} 
            z+=1;
            envio();
        }
    };
    var datos=[a[z],b[z]];
    var txt = JSON.stringify(datos); 
    // xhttp.open("GET","index.php?json="+txt,true);
    // o tambien mejor no poner el nombre del archivo
    // sino indicamos archivo solicita el mismo al mismo dominio
    // eso evita que no se pueda ejecutar si cambiamos la ruta local
    // equivale a un form con action vacio
    xhttp.open("GET","?json="+txt,true);
    xhttp.send();
    document.write(z+":enviado a="+a[z]+" b="+b[z]+" tiempo:"+tiempo()+"<br/>"); // imprimir  
}
function tiempo(){
    var fecha = new Date();
    return (fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds()+":"+fecha.getMilliseconds());
}
var z=0;
window.onload=envio;
</script>
</head>

<body>
</body>
</html>
