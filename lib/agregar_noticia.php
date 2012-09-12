<?php 
include('config.php');

$autor = $_GET['autor'];
$titulo = $_GET['titulo'];
$noticia = $_GET['noticia'];

$consulta = mysql_query("INSERT INTO noticias (id, autor, titulo, noticia) VALUES (NULL, '{$autor}','{$titulo}','{$noticia}')");

if($consulta){
	printf("agregado");
}
else{
	printf("error");
}

?>