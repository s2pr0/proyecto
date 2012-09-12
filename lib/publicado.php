<?php
include("config.php");

function noticias($noticia){

	if($noticia == 0 )
	{	

		$consulta = mysql_query("SELECT * FROM noticias ORDER BY id DESC LIMIT 5");

		while ($retorna = mysql_fetch_array($consulta, MYSQL_ASSOC)) {
		printf ("%s autor: %s <hr>",$retorna['titulo'], $retorna['autor']);
		}
	}
	else
	{
		$consulta = mysql_query("SELECT * FROM noticias WHERE id='{$noticia}'");

		while ($retorna = mysql_fetch_array($consulta, MYSQL_ASSOC)) {
		printf ("%s autor: %s <hr>",$retorna['titulo'], $retorna['autor']);
		}
	}	


};

function comentarios($noticia){

	$consulta = mysql_query("SELECT * FROM comentarios WHERE idnoticia={$noticia} ORDER BY id DESC");

	while ($retorno = mysql_fetch_array($consulta,MYSQL_ASSOC)){
	printf("%s <br> %s <br /><hr>", $retorno['nombre'], $retorno['comentario']);	
	}

};


?>