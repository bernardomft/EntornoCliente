<?php

    function load_form(){
        ?> 
            <form action="" method="post">
                Latitud: <input type="text" name="lat" id="lat">
                Longuitud: <input type="text" name="long" id="long">
            </form>
        <?php
    }

    function main(){
        if(!isset($_POST['lat']) || !isset($_POST['lon']))
            load_form();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mapForm</title>
</head>
<body>
    <?php main();?>
</body>
</html>