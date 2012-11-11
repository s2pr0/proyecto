<? 
include 'config.php';

class login{
	public $user;
	public $pass;
	private $consulta;
	private $status;
	private $datos;
	private $msj;

	function __construct($user=null,$pass=null)
	{
		
		if(!empty($user) || !empty($pass))
		{
			$this->user=$user;
			$this->pass=$pass;
		}
	}

	function iniciar()
	{
		$this->consulta = mysql_query("SELECT * FROM habitantes WHERE correo='{$this->user}' ");
		$this->status = mysql_num_rows($this->consulta);
		$this->datos = mysql_fetch_assoc($this->consulta);

		if($this->status >= 1)
		{
			if($this->pass == $this->datos['clave'])
			{

				session_start();	
				$_SESSION['Tipo'] = $this->datos['tipo'];
				$_SESSION['Nombre'] = $this->datos['nombre'];
				echo '<section id="usuario"><p id="login-top" onclick="cerrar()">Session iniciada como '.$_SESSION['Nombre'].'. Click para Cerrar Session</p></section>';
			}
			else
			{
				alert('Password Incorrecta');
			}
		}
		else
		{
			$this->msj = "El usuario '{$this->user}' no existe en la base de datos";
			alert($this->msj);
		}
	}
}	

?>

