<?php

if ($_REQUEST){
	// tengo parametros
	if (isset($_REQUEST['json'])){
		// analizo q=valor
		main();
	}else{
		// no entramos aqui
		echo "falta parametro json";
	}
    exit;
}

function main(){
    $data = $_REQUEST['json'];
    $data = substr($data,1);
    $data = substr($data,0,strlen($data)-1);
    $data = explode(',',$data);
    usleep($data[1]);
    echo $data[0];
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC22</title>
    <script>
        var a=[7,8,4,6,5,4,3,2,1];

        var b=[10,500,200,1000,200,300,400,200,300];
        function inicio(){
            for(var i = 0; i < a.length; i++){
                peticion(a[i], b[i] , i);
            }
        }

        function tiempo(){
            var time = new Date();
            return time.getHours() + ':' + time.getMinutes() + ':' + time.getSeconds() + ':' + time.getMilliseconds();
        }

        function peticion(a,b,i){
            var ele = document.createElement('div');
            ele.innerHTML = i + ': enviado a=' + a + ' b=' + b + ' tiempo:' + tiempo(); 
            document.body.appendChild(ele);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "DW2E-PC22-13819-MoranFernandezTrigalesBernardo.php?json=["+a+','+b+']', false);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();
            console.log(xmlhttp.responseText);
            var ele2 = document.createElement('div');
            ele2.innerHTML = 'recibido a=' + xmlhttp.responseText + ' tiempo: ' +  tiempo();
            document.body.appendChild(ele2);
        }

        


        window.onload = inicio;
    </script>
</head>
<body>
    
</body>
</html>