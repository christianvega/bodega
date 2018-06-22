<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ingreso Bodega</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="bodega/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="bodega/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="bodega/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	
   <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
	</script>
   
</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Administración Bodega : Iniciar Sesión</h2>
                
				<img src="bodega/img/serviu_anto.PNG"/>
				
            </div>
        </div>
		<br/>
         <div class="row ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
				<strong>   Ingrese sus datos </strong>  
					</div>
					<div class="panel-body">
						<form role="form" action="bodega/validar_usuario.php" method="post" >
							<br />
							<div class="form-group">
								<input class="form-control" placeholder="Nombre usuario" onkeypress="return soloLetras(event)" name="usuario" type="text" onpaste="alert('No puedes pegar');return false"autocomplete="off"value=""required />
							</div>
							<div class="form-group">
								<input class="form-control"  placeholder="Contraseña" name="password" type="password" value=""required />
							</div>
							<div class="form-group">
								<select name="nombre_sistema" class='form-control'>
									<option value="0">Seleccione Sistema</option>
										  <?php include('conex.php');
										  $sql = "SELECT * FROM sistema";
										  $result = mysqli_query($con,$sql);
										  while ($row = mysqli_fetch_array($result)) {
										echo "<option value='" . $row['nombre_sistema'] . "'>" . $row['nombre_sistema'] . "</option>";
									}
									mysqli_close($con); ?>
								</select>
							</div>
							<input type="submit" class="btn btn-primary center-block" value="Ingresar" id="enviar" name="enviar">
						</form>
					</div>
				</div>
			</div>
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
