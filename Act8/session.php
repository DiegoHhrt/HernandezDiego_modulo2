<?php
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <link rel='icon' href='https://images-na.ssl-images-amazon.com/images/I/51FhO1SEQyL._AC_.jpg' type='image/jpg'>
        <title>Inicio de sesión</title>
    </head>
    <body>
        <h2>Ingresa tus datos para acceder a la consultoría</h2>
        <form action='./Register.php' method='POST'>
            <fieldset style='width:500px'>
                <legend>Registro</legend>
                <label for='cuenta'>
                    Número de cuenta: <input type='text' name='cuenta' placeholder='111111111' minlength='9' maxlength='9' required>
                </label>
                <br>
                <label for='start'> 
                    <button type='submit' name='start' value='start'>Iniciar sesión</button>
                </label>
            </fieldset>
        </form>
    </body>
</html>