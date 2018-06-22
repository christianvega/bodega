<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema ventas</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
<br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default"style= "background-color:#ffffff;box-shadow:8px 8px;border-radius: 24px;width: 400px; ">
                  
				  
                    <div class="panel-body">
                        <form action="bodega/validar_usuario.php" method="post">
                            <fieldset>
                                <div class="form-group">
								      <font style=" font:bold 44px 'Aleo'; 
									  1px 15px #1773c6; color:#1773c6;"><center>Acceso Sistemas</center></font>
									</div>
									<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input class="form-control" placeholder="Nombre usuario" onkeypress="return soloLetras(event)" name="usuario" type="text" onpaste="alert('No puedes pegar');return false"autocomplete="off"value=""required>
                                </div>
                                <div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value=""required>
                                </div>
							 <div class='form-group'>
                              <select id="" name="nombre_sistema" class='form-control' title=""required>
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
                               <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Recuerdame
                                    </label>
                                </div> -->
								
                                <!-- Change this to a button or input when using this as a form -->
								<hr>
                                <input type="submit" class="btn btn-primary center-block" value="Ingresar" id="enviar" name="enviar">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
