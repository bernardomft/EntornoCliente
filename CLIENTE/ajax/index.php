<?php
// var_dump($_REQUEST);

if (isset($_REQUEST['cmd'])){
// retorno de informacion si se solicita
	$res='hola?';
	if (isset($_REQUEST['a'])){$a=$_REQUEST['a'];}
	if (isset($_REQUEST['b'])){$a=$_REQUEST['b'];}
	if ($_REQUEST['cmd']=='html'){$res='<b>si</b>no<b>si</b>';}
	if ($_REQUEST['cmd']=='datos'){$res='abcdefg 12345678 ';}
	if ($_REQUEST['cmd']=='json'){	
		$myArr = array('a','b','c','d','json');
		$res = json_encode($myArr);	
	}
	if ($_REQUEST['cmd']=='xml'){	
		$xmlDoc = new DOMDocument();
		$xmlDoc->load("notas.xml");
		$res=$xmlDoc->saveXML();		
	}
	if ($_REQUEST['cmd']=='datos6'){$res='res datos5';}
	if ($_REQUEST['cmd']=='datos7'){$res='res datos6';}
	echo $res;
	exit;
}

?>
<html>
	<head>
		<style>
			div{
				border:1px solid red;
				margin:20px;
				width:500px;
				height:32px;
				padding:10px;
			}
		</style>

		<script type="text/javascript">
			function inicio(){
				borra();
				document.getElementById('envio').onclick=envio;
			}
			function borra(){
				document.getElementById('caja1').innerHTML='';
				document.getElementById('caja2').innerHTML='';
				document.getElementById('caja3').innerHTML='';
				document.getElementById('caja4').innerHTML='';		
			}

			function envio(){
				borra();
				var valor=document.getElementById('escenarios').value;
				console.log(valor);
				if (valor==1){
					envioAjax('GET','0','a=6&b=5',true,'html',document.getElementById("caja"+valor));		
				}
				if (valor=='2'){
					envioAjax('POST','1','a=6&b=5',true,'datos',document.getElementById("caja"+valor));	
				}
				if (valor=='3'){
					envioAjax('GET','0','a=6&b=5',false,'json',document.getElementById("caja"+valor));		
				}
				if (valor=='4'){
					envioAjax('POST','1','a=6&b=5',false,'xml',document.getElementById("caja"+valor));				
				}
				if (valor=='5'){
					envioAjax('GET','0','a=6&b=5',true,'html',document.getElementById("caja1"));	
					envioAjax('POST','1','a=6&b=5',true,'datos',document.getElementById("caja2"));
					envioAjax('GET','0','a=6&b=5',false,'json',document.getElementById("caja3"));		
					envioAjax('POST','1','a=6&b=5',false,'xml',document.getElementById("caja4"));	
					envioAjax('GET','1','a=6&b=5',true,'datos6',document.getElementById("caja5"));
					envioAjax('POST','0','a=6&b=5',true,'datos7',document.getElementById("caja6"));
				}
				if (valor=='6'){
					envioAjax('GET','0','a=6&b=5',true,'datos6',document.getElementById("caja5"));	
				// si cambiamos tipo=0 por tipo=1	
				// no llegan parametros al servidor responde con la pagina completa	
				// en un GET no viajan parametros , solo se pueden enviar en la url			
				}
				if (valor=='7'){
					envioAjax('POST','1','a=6&b=5',true,'datos7',document.getElementById("caja6"));				
				}				
			}

			function envioAjax(metodo,tipo,parametros,asincrono,contenido,receptor){
			//
			// metodo		= GET|POST
			// tipo			= 0 en url // 1 en paramtros en la cabecera
			// asincrono	= true|false
			// contenido	= html|datos|json|xml
			// AJAX no modifica la URL
			// POST aunque los pongamos en URL los copia en la cabecera usa parametros
			// GET si los pasamos por la cabecera no los pasa
			// setRequestHeader("Content-type", "application/x-www-form-urlencoded"); para POST indica datos en el post

				console.log(metodo,tipo,parametros,asincrono,contenido,receptor);
				
				var p=parametros+'&cmd='+contenido;	

				console.log(p);

				// objeto de comunicaciones
				var xhttp = new XMLHttpRequest();
						
				if (asincrono){
					// la respuesta se trata en la callback
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						//respuesta asincrona
						respuesta(this.responseText,contenido,receptor);	
					}
					};
					// envio
					if (tipo=='0'){	// en url		
						xhttp.open(metodo,"index.php?"+p,asincrono);
						xhttp.send();	
					}
					if (tipo=='1'){ // en parametros en la cabecera
						xhttp.open(metodo,"index.php",asincrono);
						xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xhttp.send(p);		
					}		
							
				}

				if (!asincrono){	
					// la respuesta se trata a continuacion no hay callback	
					if (tipo=='0'){	// en url			
						xhttp.open(metodo,"index.php?"+p,asincrono);
						xhttp.send();
					}
					if (tipo=='1'){ // en parametros en la cabecera
						xhttp.open(metodo,"index.php",asincrono);
						xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xhttp.send(p);		
					}		
					//respuesta sincrona
					console.log('response=',asincrono,xhttp.responseText);
					texto = xhttp.responseText;
					respuesta(texto,contenido,receptor);						
				}		
			}

			function respuesta(res,contenido,receptor){

					console.log('respuesta=',res);

					if (contenido=='html'){
						receptor.innerHTML=res;			
					}
					if (contenido=='datos'){
						receptor.innerHTML=res;				
					}
					if (contenido=='json'){
						// parsear JSON
						var myArr =JSON.parse(res);	
						var txt='';
						for (j=0;j<myArr.length;j++){txt+=myArr[j]+' ';}
						receptor.innerHTML=txt;		
					}
					if (contenido=='xml'){
						// parsear XML
						parser = new DOMParser();
						xmlDoc = parser.parseFromString(res,"text/xml");
						txt = "";
						x = xmlDoc.getElementsByTagName("note");
						//console.log(x);				
						for (i = 0; i < x.length; i++) {					
							txt += x[i].children[0].textContent + " ";
							txt += x[i].children[1].textContent + " ";
							txt += x[i].children[2].textContent + " ";
							txt += x[i].children[3].textContent + " ";		
							receptor.innerHTML=txt;				
						}				
					}
					if (contenido=='datos6'){
						receptor.innerHTML=res;	
					}
					if (contenido=='datos7'){
						receptor.innerHTML=res;	
					}				
			}
			window.onload = inicio;
		</script>
	</head>
	<body>
		<div>
			<select id='escenarios'>
				<option value='1'>escenario1:GET,URL,ASINCRONO,HTML</option>
				<option value='2'>escenario2:POST,PARAM,ASINCRONO,DATOS</option>
				<option value='3'>escenario3:GET,URL,SINCRONO,JSON</option>
				<option value='4'>escenario4:POST,PARAM,SINCRONO,XML</option>
				<option value='5'>todos</option>
				<option value='6'>escenario5:GET,PARAM,ASINC,DATOS</option>	
				<option value='7'>escenario6:POST,PARAM,ASINC,DATOS</option>
			</select>
			<button id='envio'>ENVIO</button>
		</div>
		<div id="caja1">html</div>
		<div id="caja2">datos</div>
		<div id="caja3">json</div>
		<div id="caja4">xml</div>
		<div id="caja5">get param</div>
		<div id="caja6">post param</div>
	</body>
</html>