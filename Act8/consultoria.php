<?php
if(isset($_POST["start"]))
{
    echo"
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset='UTF-8'>
            <title>Consultoría de Kiki</title>
            <link rel='icon' href='https://images-na.ssl-images-amazon.com/images/I/51FhO1SEQyL._AC_.jpg' type='image/jpg'>
        </head>
        <body>
            
        </body>
    </html>";
}
else
{
    header("location: ./session.php");
}
    

    

?>