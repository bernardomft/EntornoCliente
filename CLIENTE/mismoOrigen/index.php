<?php

// el navegador bloquea las respuestas de servidores fuera de mi origen

// pero si el usuario abre su navegador este puede cargar paginas de terceros con el consiguiente riesgo de seguridad
//mas info: http://www.w3.org/Security/wiki/Same_Origin_Policy

// si ejecutas esta paginas con el enlace chrome de la carpeta podras acceder al xml que esta en otro servidor sin aviso


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
        { $hint .= ", $name"; }
      }
    }
  }

// Output "no suggestion" if no hint were found
// or output the correct values
echo $hint==="" ? "no suggestion" : $hint;
}
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<script>
function showHint(str,b){
	var xmlhttp; // objeto comunicacion
	if (str.length==0){ 
	  document.getElementById("txtHint").innerHTML="";
	  return;
	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){ // callback del ajax
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("txtHint").innerHTML=xmlhttp.responseText; // respuesta textual
				console.log('<<< respuesta recibida de '+str+' '+xmlhttp.responseText);
		   }
	}
	// envio de la peticion al servidor
	xmlhttp.open("GET","index.php?q="+str,b);
	xmlhttp.send();
	console.log('GET >>> '+str);	
}
function showHint2(){
	var xmlhttp; // objeto comunicacion
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){ // callback del ajax
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("txtHint").innerHTML=xmlhttp.responseText; // respuesta textual
				console.log('+++ respuesta recibida: '+xmlhttp.responseText);
		   }
	}
	// envio de la peticion al servidor
	xmlhttp.open("GET","http://www.w3schools.com/xml/cd_catalog_with_css.xml",true);
	xmlhttp.send();
	console.log('peticion fuera del dominio +++ ');	
}
function varios(pulsado){
	showHint(pulsado,true);
	showHint2();
}
</script>
</head>
<body>

<h3>Monitoriza la red y teclea dentro de la caja</h3>

First name: <input type="text" id="txt1" onkeyup="varios(this.value)" />

<p>Suggestions: <span id="txtHint"></span></p> 

</body>
</html>
