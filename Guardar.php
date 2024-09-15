<?php
	require 'Conexion.php';
	
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$estado_civil = $_POST['estado_civil'];
	$hijos = isset($_POST['hijo']) ? $_POST['hijos'] : 0;
	$intereses = isset($_POST['intereses']) ? $_POST['intereses'] : null;
	
	$arrayIntereses = null;
	
	$num_array = count($intereses);
	$contador = 0;
	
	if($num_array>0){
		foreach ($intereses as $key => $value) {
			if ($contador != $num_array-1)
			$arrayIntereses .= $value.' ';
			else
			$arrayIntereses .= $value;
			$contador++;
		}
	}
	
	$sql = "INSERT INTO personas (nombre, correo, telefono, estado_civil, hijos, intereses) VALUES ('$nombre', '$email', '$telefono', '$estado_civil', '$hijos', '$arrayIntereses')";
	$resultado = $conn->query($sql);
	
?>
 
<html lang="es">
	<head>	
	    <meta name="viewport" content="width=device-width, initial-scale=1">
            <script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script> 
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> 
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> 
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					<a href="index.php" class="btn btn-default">Regresar</a>
                                        <div class="form-group">
				</div>
                                                
				</div>
			</div>
		</div>
	</body>
</html>