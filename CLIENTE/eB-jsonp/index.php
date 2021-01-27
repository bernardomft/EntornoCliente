<?php
/*
accedemos al dominio mywebcommunity , por ajax no deja da error , usando script src si podemos acceder
*/
if ($_REQUEST){
	if (isset($_REQUEST['q'])){
		main();
	}else{
		echo "falta parametro q";
	}
	exit;	
}

function main(){

sleep(1);

// Fill up array with names
$a[]="Anna";
$a[]="Brittany";
$a[]="Cinderella";
$a[]="Diana";
$a[]="Eva";
$a[]="Fiona";
$a[]="Gunda";
$a[]="Hege";
$a[]="Inga";
$a[]="Johanna";
$a[]="Kitty";
$a[]="Linda";
$a[]="Nina";
$a[]="Ophelia";
$a[]="Petunia";
$a[]="Amanda";
$a[]="Raquel";
$a[]="Cindy";
$a[]="Doris";
$a[]="Eve";
$a[]="Evita";
$a[]="Sunniva";
$a[]="Tove";
$a[]="Unni";
$a[]="Violet";
$a[]="Liza";
$a[]="Elizabeth";
$a[]="Ellen";
$a[]="Wenche";
$a[]="Vicky";

// get the q parameter from URL
$q=$_REQUEST["q"]; $hint="";

// lookup all hints from array if $q is different from ""
if ($q !== "")
  { $q=strtolower($q); $len=strlen($q);
    foreach($a as $name)
    { if (stristr($q, substr($name,0,$len)))
      { if ($hint==="")
        { $hint=$name; }
        else
        { $hint .= ",$name"; }
      }
    }
  }

if ($hint===""){$hint="no suggestion";}
// pasamos a un array la lista de cadenas separadas por comas
$miArray=explode(",",$hint);
// pasamos el array a un json
$miJson=json_encode($miArray);
// padding, empaquetado del json
$hint="unaFuncion(".$miJson.");";
echo $hint;
}
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<script>
function ajax(a){

	var xmlhttp; // objeto comunicacion
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){ 
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			console.log('peticion recibida de ajax');	
			// pero nunca se recibe
		}
	}
	xmlhttp.open("GET","http://ies.mywebcommunity.org/eB-jsonp/index.php?q="+a,true);
	// llamada fuera de origen
	xmlhttp.send();

}
function varios(pulsado){
	console.log("1) tecla pulsada",pulsado);
	
	// acceso a otro dominio es denegado por politica del mismo origen
	ajax(pulsado);

	// acceso a otro dominio usando src de un nodo script
    var s = document.createElement("script");
    s.src = "http://ies.mywebcommunity.org/eB-jsonp/index.php?q="+pulsado;
    document.body.appendChild(s);	
}
function unaFuncion(json){
	/*
	El servidor responde unaFuncion(['Anna','Ammanda']) ,
	es decir cliente y servidor "acuerdan" pasar json usando 
	esta unaFuncion. El cargar esto usando script src,
	se ejecuta, se llama a unaFuncion y se lee el json
	que proviene del segundo dominio , de otra forma
	no se podria por la politica del mismo origen.
    Un script que se carga mediante la etiqueta <script> 
    tiene acceso sin límites a toda nuestra aplicación.
    La diferencia principal con las peticiones AJAX es que 
    script src no permite leer directamente la respuesta,
    a no sere que montemos este jsonp
	*/
	console.log('2) recibido por jsonp: ',json);
	// recorrer el json y montar el texto
	var txt='';
	for(i in json) {
		txt+=json[i]+" ";		
	}
	// mostrar el texto
	document.getElementById("txtHint").innerHTML=txt;
}

</script>

</head>

<body>

<h3>Start typing a name in the input field below:</h3>

First name: <input type="text" id="txt1" onkeyup="varios(this.value)" />

<p>Suggestions: <span id="txtHint"></span></p> 

</body>
</html>
