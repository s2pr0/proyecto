<? 
include('config.php');

$nombre = $_GET['nombre'];
$correo = $_GET['correo'];
$comentario = $_GET['comentario'];
$idn = $_GET['noticia'];

$agregar = mysql_query("INSERT INTO comentarios (id,idnoticia,nombre,email,comentario) VALUES (NULL,'{$idn}','{$nombre}','{$correo}','{$comentario}')");

if($agregar)
{
	echo "Bien se Agrego tu comentario";
}
else
{
	echo "ERROR: al agregar tu comentario";
}
?>