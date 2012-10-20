<?
include "../lib/core/login.php";
$user = $_POST['usuario'];
$pass = $_POST['clave'];

$login = new login($user,$clave);
$login->iniciar();


?>