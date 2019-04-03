<?php 
/* llamamos a las ruatas a imagenes de la base de datos 
por lo que debemos solicitar la base de datos que esta en funciones
*/
require 'funciones.php';
/* Creamos la variable que nos mostrara el contenido*/
$fotos_por_pagina = 4;
/*mostrar en que pagina estamos 
si la variable 'p' está seteada guarda su valor en un entero si no colocalo en 1
*/
$pagina_actual =(isset($_GET['p']) ? (int)$_GET['p'] : 1);
$inicio = $pagina_actual > 1 ? $pagina_actual * $fotos_por_pagina - $fotos_por_pagina : 0;


//Hacemos la conexion a la  base de datos.

$conexion = conexion('galeria_practica','root','');
if (!$conexion){
    die();
} else {
  $statement = $conexion->prepare("
 SELECT SQL_CALC_FOUND_ROWS * FROM fotos LIMIT $inicio, $fotos_por_pagina 
  ");
  //ejecutamos la accion:
$statement->execute();
//guarda en la variable  todas las direcciones obtenidas con  fetchAll
$fotos = $statement->fetchAll();
//condicional por si no hay fotos:
if(!$fotos){
    header('Location: index.php');


} ;
//Haciendo la paginación:

$statement=$conexion->prepare("
SELECT FOUND_ROWS() as total_filas
");
$statement->execute();
$total_post = $statement->fetch()['total_filas'];
$total_paginas=ceil ($total_post / $fotos_por_pagina);

};
/* SELECT * FROM fotos WHERE id = :id ORDER BY id DESC*/ 


require 'views/index.view.php';
?>
