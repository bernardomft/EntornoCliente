<?php
// ejemplo copiado de w3c


if ($_REQUEST){
	// tengo parametros
	if (isset($_REQUEST['q'])){
		// analizo q=valor
		main();
	}else{
		// no entramos aqui
		echo "falta parametro q";
	}
	exit;	
}
// sino tengo parametros continuo con la carga de la página


function main(){

//sleep(1);

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

$q=$_REQUEST["q"];
$q= simplexml_load_string($q);
//echo print_r($q);
$hint=[];
if ($q !== ""){ 
	$q=strtolower($q); 
	$len=strlen($q);
    foreach($a as $name){ 
    	if (stristr($q, substr($name,0,$len))){ 
            array_push($hint,$name);
      	}
    }
    $response = "";
    foreach($hint as $h){
        if ($response===""){ 
    		$response="<nombre>" . $h . "</nombre>"; 
		}else{ 
			$response.="<nombre>" . $h . "</nombre>"; ;
        }
    }
  }

  echo $hint===[] ? "no suggestion" : $response;

}

?> 