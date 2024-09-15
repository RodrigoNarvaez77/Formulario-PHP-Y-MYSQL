<?php
	require 'Conexion.php';
	$where = "";
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor'";
		}
	}
	$sql = "SELECT * FROM personas $where";
	$resultado = $conn->query($sql);	
?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script> 
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> 
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> 
                <link href="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.css" rel="stylesheet">
               <script src="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.js"></script>
                <meta charset="UTF-8">
        </head>
	<body>
		<div class="container">
                <div class="row">
                    <h2 style="text-align:center;">CRUD</h2>
		</div>	
		<div class="row">
                    <a href="nuevo.php" class="btn btn-primary">Nuevo Registro</a>		
		    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <b>Nombre: </b><input type="text" id="campo" name="campo" />
                        <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
		    </form>
                </div>	
			<br>
		<div class="row table-responsive">
                    <table class="table table-striped">
			<thead>
                            <tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Telefono</th>
				<th></th>
				<th></th>
			    </tr>
			</thead>		
			<tbody>
                            <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
				<tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['correo']; ?></td>
                                    <td><?php echo $row['telefono']; ?></td>
                                    <td><a href="modificar.php?id=<?php echo $row['id']; ?>">Modificar<span class="glyphicon glyphicon-pencil"></span></a></td>
                                    <td><a href="#" data-href="Eliminar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete">eliminar<span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
                            <?php } ?>
			</tbody>
		    </table>
		</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">		
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>			
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>		
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>
                <!--Termina Modal-->
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
		
	</body>
</html>
