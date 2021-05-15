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
    //exit();
?>