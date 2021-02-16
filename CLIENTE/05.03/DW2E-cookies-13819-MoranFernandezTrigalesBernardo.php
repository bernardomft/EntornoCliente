<?php
    //ESTE SCRIPT VA A CREAR LAS COOKIES CON PHP Y LAS VA A VISUALIZAR CON JAVASCRIPT
    function main(){
        if(isset($_POST['articulo'])){
            if(!isset($_COOKIE['carro'])){
                setcookie('carro', $_POST['articulo'], time() + (86400 * 15), "/");
            }else{
                setcookie('carro', $_COOKIE['carro'].';'.$_POST['articulo'], time() + (86400 * 15), "/");
            }
        }
        carrito();
        form();
    }

    function carrito(){
        if(isset($_COOKIE['carro'])){
            ?>
                <h1>TU CARRO DE LA COMPRA</h1>
            <?php
            $carrito_valores=explode(';', $_COOKIE['carro']);
            foreach($carrito_valores as $c)
                echo $c . '<br>';
        }
    }

    function form(){
        ?>
            <h1>COMPRA DE ARTICULOS</h1>
            <form action="DW2E-cookies-13819-MoranFernandezTrigalesBernardo.php" method="post">
                <label for="articulo">Introduce el articlo que quieres agregar al carrito</label>
                <input type="text" name="articulo" id="articulo">
                <button type="submit">Agrega el articulo al carrito</button>
            </form>
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
</head>
<body>
   <?php main(); ?>
</body>
</html>