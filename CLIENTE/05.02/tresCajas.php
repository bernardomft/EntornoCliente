<?php 
    $REQUERIDOS=array('Nombre','Usuario','Provincia');

    function esPrimero(){
        return !$_REQUEST;
    }

    function form(){
        //HTML de la página
        ?>
            <h1>Introduce los datos</h1>
            <form method="post" novalidate>
                <div class=interno>
                    <input type="text" required   id="clave" name="clave" value='' size="20" maxlength="6" placeholder="clave" />
                </div>
                <div class=interno>
                    <input type="email" required   id="email" name="email" value='' size="20" maxlength="" placeholder="email" />
                </div>
                <div class=interno>
                    <input type="email" required   id="cp" name="cp" value='' size="20" maxlength="5" placeholder="Código postal" />
                </div>
            </form>
        <?php
    }

    function main(){
        if ( esPrimero() ){
            form();
        }else{
            echo "Acceso<br/>";var_dump($_REQUEST);echo "<br/>";var_dump($_FILES); 		
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TresCajas</title>
    <style>
        form{
            width:15%;
            height:20vh;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
            align-items:space-between;
        }
        div.interno{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
        }
    </style>
    <script>
        function validar(){
            //console.log(this.id);
            if(this.id === 'clave'){
                if(this.value.length != 6){
                    cargarCruz(this.id);
                }
                else {
                    cargarOk(this.id)
                }
            }
            if(this.id === 'email'){
                if(this.value.indexOf('@') === -1){
                    cargarCruz(this.id);
                }else {
                    cargarOk(this.id)
                }
            }

            if(this.id === 'cp'){
                if(this.value.length != 5 || isNaN(parseInt(this.value))==true){
                    cargarCruz(this.id);
                }
                else {
                    cargarOk(this.id)
                }
            }
        }

        function cargarOk(id){
            var ele = document.getElementById('cruz_'+ id);
            ele.setAttribute('src','verde.jpg');
        }

        function cargarCruz(id){
            var parent = document.getElementById(id).parentNode;
            console.log(parent.childNodes);
            if(document.getElementById('cruz_'+ id)!=null){
                document.getElementById('cruz_'+ id).setAttribute('src','rojo.jpg');
            }
            if(parent.childNodes.length <=3){
                var ele = document.createElement('img');
                ele.setAttribute('width','20');
                ele.setAttribute('height','20');
                ele.setAttribute('src','rojo.jpg');
                ele.id = 'cruz_' + id;
                parent.appendChild(ele);
            }
        }

        function inicio(){
            document.getElementById('clave').onkeyup=validar;
            document.getElementById('email').onkeyup=validar;
            document.getElementById('cp').onkeyup=validar;
        }

        window.onload=inicio;
    </script>
</head>
<body>
    <?php main();?>
</body>
</html>