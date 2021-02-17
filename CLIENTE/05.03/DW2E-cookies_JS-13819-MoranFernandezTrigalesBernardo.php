<?php
    //ESTE SCRIPT VA A CREAR LAS COOKIES CON PHP Y LAS VA A VISUALIZAR CON JAVASCRIPT
    function main(){
        if(isset($_POST['articulo'])){
            if(!isset($_COOKIE['carro'])){
                setcookie('carro', $_POST['articulo'], time() + (86400 * 15), "/");
                $_POST['articulo'] = null;
            }else{
                setcookie('carro', $_COOKIE['carro'].';'.$_POST['articulo'], time() + (86400 * 15), "/");
            }
        }
        //carrito();
        form();
    }

    /*function carrito(){
        if(isset($_COOKIE['carro'])){
            ?>
                <h1>TU CARRO DE LA COMPRA</h1>
            <?php
            $carrito_valores=explode(';', $_COOKIE['carro']);
            foreach($carrito_valores as $c)
                echo $c . '<br>';
        }
    }*/

    function form(){
        ?>
            <h1>COMPRA DE ARTICULOS</h1>
            <form action="DW2E-cookies_JS-13819-MoranFernandezTrigalesBernardo.php" method="post">
                <label for="articulo">Introduce el articlo que quieres agregar al carrito</label>
                <input type="text" name="articulo" id="articulo">
                <button type="submit">Agrega el articulo al carrito</button>
            </form>
            <button id='borrar'>Borrar cookie</button>
        <?php
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>

        function inicio(){
            document.getElementById('borrar').addEventListener('click', borrar);
            if(getCookie('carro')){
                var c=getCookie('carro').replaceAll(';', '<br>');
                c.replaceAll('%20' , ' ');
                var carro = document.createElement('div');
                carro.innerHTML = '<h1>TU CARRO DE LA COMPRA</h1>' + c.replaceAll('%20' , ' ');;
                document.body.appendChild(carro);
                console.log(c);
            }
        }

        function borrar(){
            document.cookie = "carro=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        

        window.onload = inicio;
    </script>
</head>
<body>
   <?php main(); ?>
</body>
</html>