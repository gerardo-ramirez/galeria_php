<?php 

require 'funciones.php' ;
/*Creamos la conexion a la base de datos importando de funciones.php la conexion
guardamos en otra variable llamada conexion.
*/
$conexion = conexion('galeria_practica', 'root', '');

if(!$conexion){
    header('Location: error.php');
    die();
}
//traduccion  si se envia por el metodo post y no este vacio el archivo ($_SERVER,($_FILES, son variables superglobales)
if ($_SERVER['REQUEST_METHOD'] == 'POST' &&  !empty($_FILES)){

    
    /* checkeamos que sea  un archivo de imagen y no texto etc.
    */ 
    $check =@getimagesize($_FILES['foto']['tmp_name']);
    if($check!==false){
        $carpeta_destino = 'fotos/';
        $archivo_subido = $carpeta_destino .$_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

        $statament = $conexion->prepare('
        INSERT INTO fotos (titulo, imagen, texto)
        VALUES (:titulo, :imagen, :texto)
        ');
        $statament->execute(array(
            ':titulo'=>$_POST['titulo'],
            ':imagen'=>$_FILES['foto']['name'],
            ':texto'=>$_POST['texto']
        ));
        header ('Location: index.php');
    }else{
        //vamos a usar esa variable en  subr.view.php
        $errores ='el archivo no es una imagen o es muy pesado';
    }

}



require 'views/subir.view.php';
?>