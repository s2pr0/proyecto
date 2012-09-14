<?php 
class comentario{
    public $nombre;
    public $correo;
    public $noticia;
    public $comentario;
    public $consulta;
        
    public function __construct(){
        if(!empty($_GET['nombre'])){
			$this->nombre = $_GET['nombre'];
		}
		if(!empty($_GET['correo'])){
			$this->correo = $_GET['correo'];
		}
		if(!empty($_GET['noticia'])){
			$this->noticia = $_GET['noticia'];
		}
        if(!empty($_GET['comentario'])){
            $this->comentario = $_GET['comentario'];
        }
    }
    public function setComentario(){
    	$this->consulta = mysql_query("INSERT INTO comentarios VALUES (NULL,'{$this->noticia}','{$this->nombre}','{$this->correo}','{$this->comentario}')");
    	if ($this->consulta){
    		echo "Comentario agregado";
    	}else{
    		echo "Oops, ha ocurrido un error";
    	}
    }
}
?>