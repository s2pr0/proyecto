<?php 
include 'config.php';

class noticia{
    public $autor;
    public $titulo;
    public $noticia;
    public $consulta;
        
    public function __construct(){
        if(!empty($_GET['autor'])){
			$this->autor = $_GET['autor'];
		}
		if(!empty($_GET['titulo'])){
			$this->titulo = $_GET['titulo'];
		}
		if(!empty($_GET['noticia'])){
			$this->noticia = $_GET['noticia'];
		}
    }
    public function setNoticia(){
    	$this->consulta = mysql_query("INSERT INTO noticias VALUES (NULL, '{$this->autor}','{$this->titulo}','{$this->noticia}')");
    	if ($this->consulta){
    		printf("agregado");
    	}else{
    		printf("error");
    	}
    }
}
?>