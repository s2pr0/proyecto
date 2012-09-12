<?
	include('lib/publicado.php');

	$idn = $_GET['noticia'];

	$consulta = mysql_query("SELECT * FROM noticias WHERE id='{$idn}'");
	$retorna = mysql_fetch_array($consulta, MYSQL_ASSOC);

?>
<!DOCTYPE html>
<html lang="Es_VE">
<head>
<title> <?  printf("%s", $retorno['titulo']); ?> </title>
</head>
<body>
<? printf ("%s  - autor: %s <br /> <br /> %s <br /> <br />",$retorna['titulo'], $retorna['autor'],$retorna['noticia']); ?>

<hr>
<form action="lib/agregar_comentario.php">
	<input type="text" name="nombre" placeholder="Nombre y Apellido" required/>
	<input type="email" name="correo" placeholder="Correo Electronico" required />
	<input type="text" name="comentario" placeholder="Aquí tú comentario" required />
	<select name="noticia">
		<option SELECTED><?echo $idn;?> </option>
	<input class="boton" type="submit" value="Enviar Comentario" /> 
</form>
<hr>

<? comentarios($idn); ?>

</body>
</html>
