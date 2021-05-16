<?php
    require_once("./config.php");
    $con=dataBaseConection();
    echo"
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset='UTF-8'>
            <title>Registro</title>
            <link rel='icon' href='https://images-na.ssl-images-amazon.com/images/I/51FhO1SEQyL._AC_.jpg' type='image/jpg'>
        </head>
        <body>";
    if((isset($_SESSION["nAccount"]))||(isset($_POST["regist"])))
    {
        if((isset($_POST["regist"])))
        {
            $name=(isset($_POST["name"]) && $_POST["name"] != "")? $_POST["name"]:"Inválido";
            $apellPat=(isset($_POST["aPat"]) && $_POST["aPat"] != "")? $_POST["aPat"]:"Inválido";
            $apellMat=(isset($_POST["aMat"]) && $_POST["aMat"] != "")? $_POST["aMat"]:"Inválido";
            $area=(isset($_POST["area"]) && $_POST["area"] != "")? $_POST["area"]:"Inválido";
            $numCuenta=(isset($_POST["nCuenta"]) && $_POST["nCuenta"] != "")? $_POST["nCuenta"]:"Inválido";
            $carrera=(isset($_POST["carrera"]) && $_POST["carrera"] != "")? $_POST["carrera"]:"Inválido";

            $registInfo="INSERT INTO alumno (Ncuenta, Nombre, ApellidoP, ApellidoM, Area) VALUES ('.$numCuenta.', '".$name."', '".$apellPat."', '".$apellMat."', '.$area.')";
            $personalInfo=mysqli_query($con, $registInfo);
            if($personalInfo)
            {
                session_name("exist");
                session_start();
                $_SESSION["nAccount"]=$numCuenta;
                header("location: ./Calificaciones.php");
            }
            else
            {
                echo"
                <h1>Algo salió mal, por favor intenta de nuevo</h1>
                <br>
                <a href='./session.php'>Regresar a ingresar número de cuenta</a>";
            }
        }
    }
    elseif((isset($_POST["start"])))
    {
        $id=(isset($_POST["cuenta"]) && $_POST["cuenta"] != "")? $_POST["cuenta"]:"Inválido";
        $checkUser="SELECT Ncuenta FROM alumno WHERE Ncuenta=".$id."";

        if ($r=mysqli_query($con,$checkUser))
        {
            $rowcount=mysqli_num_rows($r);
        }
        if($rowcount==0)
        {
            echo "    
                <h2>Por favor, inicia sesión</h2>
                <form action='Register.php' method='POST'>
                    <fieldset>
                        <legend>Rellena los siguientes campos</legend>
                        <label for='name'>
                            Nombre: <input type='text' name='name' placeholder='Nombre(s)' required>
                        </label>
                        <br><br>
                        <label for='aPat'>
                            Apellido Paterno: <input type='text' name='aPat' placeholder='Apellido Paterno' required>
                        </label>
                        <br><br>
                        <label for='aMat'>
                            Apellido Materno: <input type='text' name='aMat' placeholder='Apellido Materno' required>
                        </label>
                        <br><br>
                        <label for='area'>Área que cursaste en la prepa: 
                            <select name='area' reqired>
                                <option value='' disabled>-Selecciona-</option>
                                <option value='1'>Área 1: Ciencias fisicomatemáticas e ingenierías</option>
                                <option value='2'>Área 2: Ciencias biológicas y de la salud</option>
                                <option value='3'>Área 3: Ciencias sociales</option>
                                <option value='4'>Área 4: Artes y humanidades</option>
                            </select>
                        </label>
                        <br><br>
                        <label for='carrera'>Carrera que quieres: 
                            <select name='carrera' required>
                                <option value='' disabled>-Selecciona-</option>";
                                $getNames="SELECT Nombre FROM carrera";
                                $consult=mysqli_query($con, $getNames);
                                while($row=mysqli_fetch_array($consult, MYSQLI_NUM))
                                {
                                    echo "<option value='".$row[0]."'>".$row[0]."</option>";
                                }
                            echo"
                            </select>
                        </label>
                        <br><br>
                        <label for='nCuenta'>
                            <input type='hidden' name='nCuenta' value='".$id."'>
                        </label>
                        <label for='regist'> 
                            <button type='submit' name='regist' value='ini'>Registrarse</button>
                        </label>
                    </fieldset>
                </form>
            ";
        }
        else
        {
            session_name("exist");
            session_start();
            $_SESSION["account"]=$id;
            header("location: ./consultoria.php");
        }
    }
    elseif(!(isset($_POST["start"])))
    {
        header("location: ./session.php");
    }
    echo"    
        </body>
    </html>";
    
?>