<? 
include 'config.php';

class login{
	public $user;
	public $pass;
	private $consulta;
	private $status;
	private $datos;

	function __construct($user,$pass)
	{
		$this->user=$user;
		$this->pass=$pass;
	}

	function iniciar()
	{
		$this->consulta = mysql_query("SELECT * FROM users WHERE usuario='{$this->user}' ");
		$this->status = mysql_num_rows($this->consulta);
		$this->datos = mysql_fetch_assoc($this->consulta);

		if($this->status >= 1)
		{
			if($this->pass == $this->datos['clave'])
			{
				echo 'password correcta';
				$_SESSION['Admin'] = 1;
			}
			else
			{
				echo 'password incorrecta';
			}
		}
		else
		{
			echo 'El usuario ( ',$this->user,' ) que introdujo no existe en la base de datos';
		}
		
		

	}

}

?>