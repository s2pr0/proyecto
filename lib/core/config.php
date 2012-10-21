<?php 
/*archivo de configuraciones globales de conexión a base de datos*/

$servidor = 'localhost'; // Servidor donde se encuentra la base de datos
$usuario = 'root'; // Usuario de la base de datos
$clave = '1234'; // Clave del usuario de la base de datos
$bd = 'consejo'; // nombre de la base de datos

$conecta = mysql_connect($servidor,$usuario,$clave) or die ("Error al conectar a mysql");
mysql_select_db($bd, $conecta) or die ("Base de datos '{$bd}'");


?>