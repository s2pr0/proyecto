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

/*Encargada de transferir los datos por ajax
function registro(id){
  id=id.id;
  formulario=document.getElementById(id);
  
  nombre=formulario.nombre.value,apellido=formulario.apellido.value,email=formulario.email.value,plan=formulario.plan.value;

    conexion.onreadystatechange=function(){
      if (conexion.readyState==4 && conexion.status==200) {
        document.getElementById('contenido').innerHTML=conexion.responseText;
      }
    }
    conexion.open('POST','contenido/mail.php',true);
    conexion.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    conexion.send('nombre='+nombre+'&apellido='+apellido+'&email='+email+'&plan='+plan);
  }*/

function login(objeto){
  objeto=objeto;
  usuario=objeto.usuario.value;
  clave=objeto.clave.value;
  url='contenido/session.php';
    conexion.onreadystatechange=function(){
      if (conexion.readyState==4 && conexion.status==200) {
        document.getElementById('contenido').innerHTML=conexion.responseText;
        
      }
    }
    conexion.open('POST',url,true);
    conexion.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    conexion.send('usuario='+usuario+'&clave='+clave);
  }
