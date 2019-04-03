<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>galeria index</title>
</head>
<body>
<header>
<div class="contenedor">
<h1 class="titulo">Subir foto </h1>
</div>
</header>
<div class="contenedor">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="post" enctype="multipart/form-data" class="formulario">

	<label for="foto">Seleciona tu foto</label>
			<input type="file" name="foto" id="foto">

			<label for="titulo">Titulo de la foto</label>
			<input type="text" name="titulo" id="titulo">

			<label for="texto">Descripcion:</label>
			<textarea name="texto" name="texto" id="texto" placeholder="Ingresa una descripcion de la imagen"></textarea>
<!--  si errores está seteada  mostrar errores-->
            <?php if(isset($errores)):?>
            <p class='error'><?php echo $errores ?> </p>
            <?php endif?>

            <input class="submit" type="submit" value="Subir Foto">

</form>
<footer>
		<p class="copyright">Galeria creada por Carlos Arturo - FalconMasters</p>
	</footer>
</body>
</html>