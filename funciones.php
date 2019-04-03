<?php
/*funcion para conectar a database*/ 
function conexion($tabla, $usuario, $pass){
    try{

    $conexion = new PDO("mysql:host=localhost;dbname=$tabla", $usuario, $pass);
    return $conexion;



    } catch ( PDOException $e){
        return false;
    }
}


?>