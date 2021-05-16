<?php
    require_once("./config.php");
    $con=dataBaseConection();
    function base($ye)
    {
        $con=dataBaseConection();
        $year=$ye;
            $getMaterias="SELECT nombre FROM asignaturas WHERE Anio=".$year."";
            echo "<form action='./Calificaciones.php'>
                <fieldset>";
                    $consultM=mysqli_query($con, $getMaterias);
                    $x=0;
                    while($rowM=mysqli_fetch_array($consultM, MYSQLI_NUM))
                    {
                        echo "<label for='".$x."'>
                        ".$rowM[0]."<input type='number' name='".$x."' min='1' max='10' required>
                        </label>
                        <br><br>";
                        $x++;
                    }
                    echo"<label for='iteration'>
                        <input type='hidden' name='iteration' value='".$x."'>
                    </label>";
        return $x;
    }
    echo "
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset='UTF-8'>
            <title>Calificaciones</title>
            <link rel='icon' href='https://images-na.ssl-images-amazon.com/images/I/51FhO1SEQyL._AC_.jpg' type='image/jpg'>
        </head>
        <body>";
        session_name("exist");
        session_start();
if((isset($_SESSION["nAccount"]))||(isset($_POST["iteration"])))
{
        $cuarto=(isset($_SESSION["4to"]) && $_SESSION["4to"] != "")? $_SESSION["4to"]:false;
        $quinto=(isset($_SESSION["5to"]) && $_SESSION["5to"] != "")? $_SESSION["5to"]:false;
        $sexto=(isset($_SESSION["6to"]) && $_SESSION["6to"] != "")? $_SESSION["6to"]:false;
        $iter=(isset($_POST["iteration"]) && $_POST["iteration"] != "")? $_POST["iteration"]:false;
        $m=0;
        $suma=0;
        $prom=0;
        if($iter)
        {
            while($m<=$iter);
            {
                $cal=(isset($_POST["".$m.""]) && $_POST["".$m.""] != "")? $_POST["".$m.""]:false;
                $suma+=$cal;
                $m++;
            }
            $prom=$suma/$iter;
            echo $prom;
        }
        if($cuarto===false)
        {
                    base(4);
                    echo"<label for='4to'>";
                        $_SESSION["4to"]=true;
                    echo"
                        <button type='submit' name='4to' value='4'>Registrar</button>
                    </label>";
                echo"</fieldset>
            </form>";
        }
        elseif($quinto===false)
        {
            echo $prom;
            echo $iter;
            $pushProm="UPDATE alumno SET Promedio_cuarto=".$prom." WHERE Ncuenta=".$_SESSION["nAccount"]."";
            $prom=mysqli_query($con, $pushProm);
            if($prom)
            {
                base(5);
                        echo"<label for='5to'>";
                            $_SESSION["5to"]=true;
                        echo"
                            <button type='submit' name='5to' value='5'>Registrar</button>
                        </label>";
                    echo"</fieldset>
                </form>";
            }
            else 
            {
                echo "Algo salió mal"; 
                session_unset();
                session_destroy();   
                header("location: ./session");
            }
        }
        elseif($sexto===false)
        {
            $pushProm="UPDATE alumno Promedio_quinto=".$prom." WHERE Ncuenta=".$_SESSION["nAccount"]."";
            $prom=mysqli_query($con, $pushProm);
            if($prom)
            {
                $year=6;
                $getMaterias="SELECT nombre FROM asignaturas WHERE Anio=".$year."";
                echo "<form action='./Calificaciones.php'>
                    <fieldset>";
                        $consultM=mysqli_query($con, $getMaterias);
                        $x=0;
                        while($rowM=mysqli_fetch_array($consultM, MYSQLI_NUM))
                        {
                            echo "<label for='".$x."'>
                            ".$rowM[0]."<input type='number' name='".$x."' min='1' max='10' required>
                            </label>
                            <br><br>";
                            $x++;
                        }
                        echo"<label for='iteration'>
                            <input type='hidden' name='iteration' value='".$x."'>
                        </label>";
                        echo"<label for='6to'>";
                            $_SESSION["6to"]=true;
                        echo"
                            <button type='submit' name='6to' value='6'>Registrar</button>
                        </label>";
                    echo"</fieldset>
                </form>";
            }
            elseif($sexto)
            {
                $pushProm="UPDATE alumno Promedio_sexto=".$prom." WHERE Ncuenta=".$_SESSION["nAccount"]."";
                session_unset();
                session_destroy();
            }
            else 
            {
                echo "Algo salió mal"; 
                session_unset();
                session_destroy();   
                header("location: ./session.php");
            }
        }
}            
else 
{
    header("location: ./session.php");    
}
echo"</body>
</html>";
?>