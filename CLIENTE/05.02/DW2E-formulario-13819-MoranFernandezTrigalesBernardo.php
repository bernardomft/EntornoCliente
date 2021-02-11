<?php
    $ERRORES=array();
    $REQUERIDOS=array('Nombre','Usuario','Provincia');
    $infoArray = array('name' => 'Type your name',
                'sex' => '',
                'check' => '',
                'ab' => 'Describe your hability.Be honest');
    function main(){
        form();
    }

    function getRequired(){
            echo '<span class="asterisc">*</span>';
    }

    //Dibuja el fomrulario en el dom
    //busca si hay campos requeridos
    function form(){
        ?>
            <form class="contact_form" action="" method="post" name="contact_form" novalidate>
        <ul>
            <li>
                 <h2>Name</h2>
                 <span class="required_notification">* Denotes Required Field</span>
            </li>
            <li>
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder=<?php print_r($infoArray['name']); ?>/> <?php echo getRequired();?>
            </li>
            <li >
                <label for="sex">Sex:</label>
                <div class="radio">
                    <input type="radio" id="male" name="sex" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="male" name="sex" value="female">
                    <label for="male">Female</label>
                    <?php echo getRequired();?>
                </div>
            </li>
            <li>
                <label for="eye">Eye color:</label>
                <select name="eye" id="eye">
                    <option value="green" selected>Green</option>
                    <option value="blue">Blue</option>
                    <option value="brown">brown</option>
                </select>
                
            </li>
            <li>
                <label for="check">Check all the apply:</label>
                <div class="check-box">
                    <label for="feet"><input type="checkbox" name="apply" id="feet">Over 6 feet tall</label><br>
                    <label for="feet"><input type="checkbox" name="apply" id="punds">Over 200 pounds</label>
                    <?php echo getRequired();?>
                </div>
            </li>
            <li>
                <label for="message">Describe pur athletic ability:</label>
                <textarea name="message" cols="40" rows="6"> </textarea>
            </li>
            <li>
                <button class="submit" type="submit">Send Information</button>
                <button class="submit" type="reset">Clear data</button>
            </li>
        </ul>
    </form>
        <?php
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" media="screen" href="styles.css" >    
    <title>Formulario</title>
    <style>
         div.radio{
            display: flex;
            justify-content: flex-start;
        }
        div.radio input, div.radio label{
            flex-basis: 10%;
        }
        div.check-box{
            display: flex;
            flex-direction: row;
            align-items: baseline;
            justify-content: flex-start;
        }
        div.check-box input{
            flex-basis: 10%;
            width: 10%;
        }
        span.asterisc{
            color:red;
        }
    </style>
</head>
</head>
<body>
    <?php main(); ?>
</body>
</html>