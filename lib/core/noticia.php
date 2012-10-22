<?php 
include 'config.php';

class noticia{
    public $autor;
    public $titulo;
    public $noticia;
    public $fecha;
    public $consulta;
    public $postArray;
    public $numTotalRegistros;
    public $numTotalPaginas;
    public $pagina;

    public function mostrar($inId=null){
        if(!empty($inId)){
            $consulta = "select * from noticias where id=".$inId." and estado=true;";
            $result=mysql_query($consulta);
            if($result>=1){
                $datos=mysql_fetch_assoc($result);
                $this->autor=$datos['autor'];
                $this->titulo=$datos['titulo'];
                $this->noticia=$datos['noticia'];
                $this->fecha=$datos['fecha'];
            }else{

            }
        }
    }


    public function prevista($autor, $titulo, $noticia){
          if(!empty($inAutor)){
            $this->autor=$inAutor;
        }
        if(!empty($inTitulo)){
            $this->titulo=$inTitulo;
        }
        if(!empty($inNoticia)){
            $this->noticia=$inNoticia;
        }
        $autor=$this->autor;
        $titulo=$this->titulo;
        $noticia=$this->noticia;
    }

    function __construct($inId=null, $inEtiquetas=null, $pagina=null){
        //verificando que la variable no esté vacía
        if(!empty($pagina)){
            //inicializo las variables
            $inicio = 0; 
            $this->pagina = 1;
        }else{
            $this->pagina = $pagina;
            $inicio = ($this->pagina - 1)*10;
        }
        if(!empty($inId)){
            $consulta = mysql_query("SELECT * FROM noticia WHERE id = ".$inId." ORDER BY id DESC");
        }else{
            $consulta = mysql_query("SELECT * FROM noticia ORDER BY id DESC LIMIT ".$inicio.", 10;");
        }

    $this->postArray = array();
    while ($fila = mysql_fetch_assoc($consulta)){
        $Post = new Post($fila["id"], $fila['titulo'], $fila['noticia'], $fila['estado'], $fila["idUser"], $fila['fecha']);
        array_push($postArray, $Post);
    }
    return $postArray;
    }
        
    public function valores($inAutor=null, $inTitulo=null, $inNoticia=null){
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

    //regresa el numero total de resulados por consulta
    public function getNumTotalRegistros(){
        $this->numTotalRegistros = mysql_num_rows($this->consulta);
        return $this->numTotalRegistros;
    }
    //regresa el numero total de paginas a mostrar
    public function getNumTotalPaginas(){
        $this->numTotalPaginas = $this->numTotalRegistros/10;
        return $this->numTotalPaginas;
    }
    //regresa el numero de pagina
    public function getNumPagina(){
        return $this->pagina;
    }


    public function setNoticia(){
    	$this->consulta = mysql_query("INSERT INTO noticias VALUES (NULL, '{$this->autor}','{$this->titulo}','{$this->noticia}')");
    	if ($this->consulta){
    		printf("agregado");
    	}else{
    		printf("error");
    	}
    }
    public */
}
?>