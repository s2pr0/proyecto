<?php 

include ('config.php');
include ('plantillas.php');

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
    private $plantilla;
    
   

    /*
    *metodo encargado de mostrar una noticia en una pagina
    */
    public function mostrar($inId=null)
    {
        $this->plantilla= new plantilla();
        if(!empty($inId))
        {
            $consulta = "select * from noticias where id=".$inId;
            $result=mysql_query($consulta);
            
            if($result>=1)
            {
                $datos=mysql_fetch_assoc($result);
                $autor=$datos['autor'];
                $titulo=$datos['titulo'];
                $noticia=$datos['noticia'];
                $fecha=$datos['fecha'];
                
                /*Instaciamos la clase para las plantillas del diseño*/
                $this->plantilla->plantilla_noticia($autor,$titulo,$fecha,$noticia);
    
            

            }
            else{
                echo "Esta noticia no existe!";
            }
        }
        else
        {
            $consulta = mysql_query("SELECT * FROM noticias");
            if($consulta >= 1 )
            {
                while($result = mysql_fetch_assoc($consulta))
                {
                    $this->plantilla->plantilla_noticias($result['autor'],$result['titulo'],$result['fecha'],$result['noticia'],$result['id']); 
                } 
           }
        }
    }

/*
    public function agregar($autor,$titulo,$fecha,$noticia)
    {
        if(!empty($autor))
        {
           if(!empty($titulo))
           {
                if(!empty($fecha))
                {
                    if(!empty($noticia))
                    {
                        $consulta = "INSERT INTO noticias values('NULL',".$autor.",".$titulo.",".$noticia.",".$fecha.")";
                        $result= mysql_query($consulta); or die ('<section class="ERROR">Oops, ha ocurrido un error al agregar la noticia...</section>')
                    }    
                    else
                    {
                        echo '<section class="ERROR"> Oops, ha ocurrido un error, el campo (Noticia) no puede estar vacio.</section>';
                    }
                }
                else
                {
                    echo '<section class="ERROR"> Oops, ha ocurrido un error, el campo (Fecha) no puede estar vacio.</section>';
                }
            }
            else
            {
                echo '<section class="ERROR"> Oops, ha ocurrido un error, el campo (Titulo) no puede estar vacio.</section>';
            }     

        }
        else
        {
            echo '<section class="ERROR"> Oops, ha ocurrido un error, el campo (Autor) no puede estar vacio.</section>';
        }

    }


*/
////////////////////// NO SE QUE COÑO HACE ESTO DE AQUI ABAJO ----- MANUEL CAGON!!     
    /*
    *Metodo que se usará para previsulizar resultados de busqueda
    */
    public function prevista($inId=null,$inAutor=null,$inTitulo=null,$inNoticia=null){
        if (!empty($inId)){
            $preview['id']=$inId;
        }
        if(!empty($inAutor)){
            $preview['autor']=$inAutor;
        }
        if(!empty($inTitulo)){
            $preview['titulo']=$inTitulo;
        }
        if(!empty($inNoticia)){
            $preview['noticia']=$inNoticia[500];
        }
        return $preview;
    }


    /*
    *Metodo que se encargará de mostrar los resultados en la pagina
    */
    public function resultadosPagina($inId=null, $inEtiquetas=null, $pagina=null){
        //Verificando que la variable no esté vacía
        if (!empty($pagina)){
            //inicializo las variables
            $inicio = 0;
            $this->pagina = 1;
        }else{
            $this->pagina = $pagina;
            $inicio = ($this->pagina - 1)*10;
        }

    }

}
?>