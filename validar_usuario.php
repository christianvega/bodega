<?php
session_start();
include_once 'conex.php';

//caturamos nuestros datos que fueron enviados desde el formulario mediante el metodo POST
//y los almacenamos en variables
$usuario = $_POST["usuario"];   
$password = sha1($_POST["password"]);
$sistema = $_POST["nombre_sistema"];
			 			
//consulta de mysql con la que indicamos que necesitamos que seleccione
$sql ="SELECT * from usuario WHERE usuario= '$usuario'";
$result = mysqli_query($con,$sql);
if($row = mysqli_fetch_array($result))
{     
//Si el usuario es correcto ahora validamos su contraseña
 if($row["password"] == $password)
 {
							
//caputuramos perfil usuario				
 $sql="SELECT cod_sistema FROM sistema WHERE nombre_sistema = '$sistema'";
 $result = mysqli_query($con,$sql);
 while ($row = mysqli_fetch_array($result)) {

							$cod_sistema =$row['cod_sistema'];
                            }	
							
 $sql="SELECT perfil_usuario FROM acceso_usuario WHERE usuario  = '$usuario' and cod_sistema='$cod_sistema'";
 $result = mysqli_query($con,$sql);
 while ($row = mysqli_fetch_array($result)) {
                                
				          $perfil =$row['perfil_usuario'];
						  }	
 if( $perfil >=1)
 {					
  //Creamos sesión
  session_start();  
  //Almacenamos el nombre de usuario en una variable de sesión usuario
  $_SESSION["autentica"] = "SIP"; 
  $_SESSION['usuario'] = $usuario;  
  $_SESSION['perfil'] = $perfil; 
  //Redireccionamos a la pagina: index.php
  
						
header('Location: http://10.2.100.85/rr/pages/admin-usuario/frmusuario.php'); 
 } else  {
							?>
   <script languaje="javascript">
    alert("Acceso denegado!!!");
    location.href = "index.php";
   </script>
  <?php
  }
 }
 else
 { 
  //En caso que la contraseña sea incorrecta enviamos un msj y redireccionamos a login.php
  ?>
   <script languaje="javascript">
    alert("Contrasena Incorrecta intente nuevamente");
    location.href = "index.php";
   </script>
  <?php
            
 }
}
else
{
 //en caso que el nombre de administrador es incorrecto enviamos un msj y redireccionamos a login.php
?>
 <script languaje="javascript">
  alert("El nombre de usuario es incorrecto!!");
  location.href = "index.php";
 </script>
<?php   
        
}
mysqli_free_result($result);
?>