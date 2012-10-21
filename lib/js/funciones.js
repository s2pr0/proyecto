

//funcion encargada de crear el objeto ajax
(function conectar(){
  try{
    conexion = new XMLHttpRequest();
  }catch(error1){
    try{
      conexion = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(error2){
      try{
        conexion = new ActiveXObject("Microsoft.XMLHTTP");
      }catch(error3){
        conexion = false;
      }
    }
  }
  return conexion;
})();
var url;

/*funcion que se encarga de cambiar el contenido*/
function cambio(div){
  div=div.id;
  if(!div){
    url="contenido/inicio.php";
    }else{
      url="contenido/"+div+".php";
    }

  conexion.onreadystatechange=function(){
    if (conexion.readyState==4 && conexion.status==200){
      document.getElementById('contenido').innerHTML=conexion.responseText;
    }
  }
  conexion.open("POST",url,true);
  conexion.send();
}

function barra()
{
  texto='<form id="Form" method="POST" onsubmit="logeo(this)"><input class="texto" type="text" name="usuario" placeholder="Usuario" required /><input class="texto" type="password" name="clave" placeholder="Clave" required /><input id="boton-login" type="submit" value="Ingresar" />'; 
  document.getElementById('usuario').innerHTML=texto;
} 


//iniciar session en php
function logeo(div)
{
  var usuario=div.usuario.value;
  var clave=div.clave.value
    conexion.onreadystatechange=function(){
      if (conexion.readyState==4 && conexion.status==200) {
        document.getElementById('usuario').innerHTML=conexion.responseText;
      }
    }
    conexion.open('POST','contenido/session.php',true);
    conexion.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    conexion.send('usuario='+usuario+'&clave='+clave);
}
// cerrar session de php
function cerrar()
{
  texto='<p id="login-top" onclick="barra()">Iniciar Session</p>';
  document.getElementById('usuario').innerHTML=texto;


  conexion.onreadystatechange=function(){
    if (conexion.readyState==4 && conexion.status==200){
      alert(conexion.responseText);
    }
  }

  conexion.open("POST","contenido/cerrar.php",true);
  conexion.send();
}

