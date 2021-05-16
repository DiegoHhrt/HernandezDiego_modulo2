<?php
    define("USER", "root");
    define("HOST", "localhost");
    define("PASSWORD", "");
    define("DATABASE", "consultoriakiki");
    function dataBaseConection()
    {
        $conection=mysqli_connect(HOST, USER, PASSWORD, DATABASE);
        if(!$conection)
        {
            mysqli_connect_error();
            mysqli_connect_errno();
            echo "Failed conection to db";
        }
        
        return $conection;
    }
    if((isset($_POST["exit"])))
    {
        session_unset();
        session_destroy();
        header("location: ./session.php");
    }
    elseif((isset($_POST["delete"])))
    {
        $conex=dataBaseConection();
        $delAccount="DELETE FROM alumno WHERE Ncuenta=".$_SESSION["account"]."";

        $deletion=musqli_query($conex, $delAccount);
        if($deletion)
        {
            session_unset();
            session_destroy();
            header("location: ./session.php");
        }
        exit();
    }
?>