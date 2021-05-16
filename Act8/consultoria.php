<?php
require_once("./config.php");
$con=dataBaseConection();
session_name("exist");
session_start();

$userExists="SELECT Ncuenta FROM alumno WHERE Ncuenta=".$_SESSION["account"]."";

if ($r=mysqli_query($con,$userExists))
{
    $rowcount=mysqli_num_rows($r);
}

if($rowcount>0)
{
    echo"
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset='UTF-8'>
            <title>Consultoría de Kiki</title>
            <link rel='icon' href='https://images-na.ssl-images-amazon.com/images/I/51FhO1SEQyL._AC_.jpg' type='image/jpg'>
        </head>
        <body>";
        $getData="SELECT Ncuenta, Nombre, ApellidoP, ApellidoM, Area FROM alumno";
        $consult=mysqli_query($con, $getData);
        while($row=mysqli_fetch_array($consult, MYSQLI_NUM))
        {
            echo $row[0]."<br>";
        }
            echo"<form action='./config.php' method='post'>
                <label for='exit'>
                    <button type='submit' name='exit' value='exit'>Cerrar sesión</button>
                </label>
                <label for='delete'>
                    <button type='submit' name='delete' value='delete'>Eliminar cuenta</button>
                </label>
            </form>
        </body>
    </html>";
}
else
{
    header("location: ./session.php");
}
    
?>