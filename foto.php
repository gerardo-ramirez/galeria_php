<?php 

require 'funciones.php';
//conectamos a  base de datos:
$conexion = conexion('galeria_practica', 'root', '');
if(!$conexion) {
    header('Location: error.php');
    die();
}
//si se envia valor por get id guardalo en la varuable id.
$id =isset($_GET['id']) ? (int)$_GET['id'] : false; 
if(!$id){
    header('Location: index.php');
}
$statement = $conexion->prepare("SELECT * FROM fotos WHERE id = :id");
$statement->execute(array(':id' => $id));

$foto = $statement->fetch();

if(!$foto){
    header('Location: index.php');
};
require 'views/foto.view.php';
?>