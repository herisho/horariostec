<?php

// If you installed via composer, just use this code to requrie autoloader on the top of your projects.
require('../../vendor/autoload.php');
 
// Using Medoo namespace
use Medoo\Medoo;

// Initialize
$db = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'id5758812_horariostec',
    'server' => 'localhost',
    'username' => 'id5758812_horariostec',
    'password' => 'horariostec'
]);

 
// Enjoy
$registros = $db->select('registros', '*');
?>

<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/ico" href="../../img/logo.ico">
	<title>HorariosTec Admin</title>

	<!-- CSS -->
	<!-- ----------------------------------------------------------------------------------------------------------------->
	<link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	<style>
		.container-full {
		  margin: 0 auto;
		  width: 100%;
		}
		#crearRegistroBtn {
		  margin-bottom: 40px;
		}
	</style>

	<!-- JS scripts -->
	<!------------------------------------------------------------------------------------------------------------------->
	<!-- jQuery -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- My js -->
    <script src="js/index.js"></script>
</head>
<body>
	<?php
		include "../../layout/topnav.php";
	?>
	<button href="#" data-target="#register-edit" data-new="true" data-toggle="modal" class="btn btn-info" data-id="" id="crearRegistroBtn">Crear Registro</button>
	<table class="table table-striped" id="recordsTable">
		<thead>
			<tr>
				<td>Matricula</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Carrera</td>
				<td>Nivel</td>
				<td>Turno</td>
				<td>Llego</td>
				<td>Paso</td>
				<td>Editar</td>
			</tr>
		</thead>
		<tbody id="recordsTableBody">
		<?php

		foreach($registros as $registro)
		{
			echo'
			<tr>
				<td id="matricula-' . $registro['id'] . '">' . $registro['matricula'] . '</td>
				<td id="nombre-' . $registro['id'] . '">' . $registro['nombre'] . '</td>
				<td id="apellido-' . $registro['id'] . '">' . $registro['apellido'] . '</td>
				<td id="carrera-' . $registro['id'] . '">' . $registro['carrera'] . '</td>
				<td id="tipo-' . $registro['id'] . '">' . $registro['tipo'] . '</td>
				<td id="turno-' . $registro['id'] . '">' . $registro['turno'] . '</td>
				<td id="llego-' . $registro['id'] . '">
			';
			if($registro['llego']) echo '&check;';
			echo '
				</td>
				<td id="paso-' . $registro['id'] . '">
			'; 
			if($registro['paso']) echo '&check;';
			echo '
				</td>
				<td id="edit-' . $registro['id'] . '">
					<button href="#" data-target="#register-edit" data-new="false" data-toggle="modal" class="btn btn-info" data-id="' . $registro['id'] . '">Editar</button>
				</td>
			</tr>
			';
		}

		?>
		</tbody>
	</table>

	<!-- Modals -->
	<!-- Editar registro-->            
        <div class="modal fade"  id="register-edit" tabindex="-1" role="dialog" 
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                    	<h4 class="modal-title" id="myModalLabel">
                            Crear / Editar Registro
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Cerrar</span>
                        </button>                        
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">    
                    	<form class="form" id="editForm" name="editForm">                    	                   
                    	    <div class="form-group">
                    	    	<label class="" for="matricula">Matricula</label>
                    	    	<input type="text" class="form-control" id="matriculaEdit" placeholder="" name="matricula" required>
                	    	</div>
                	    	<div class="form-group">
                    	    	<label class="" for="nombre">Nombre(s)</label>
                    	    	<input type="text" class="form-control" id="nombreEdit" placeholder="" name="nombre" required>
                	    	</div>
                	    	<div class="form-group">
                    	    	<label class="" for="apellido">Apellido</label>
                    	    	<input type="text" class="form-control" id="apellidoEdit" placeholder="" name="apellido" required>
                	    	</div>
                	    	<div class="form-group">
                    	    	<label class="" for="carrera">Carrera</label>
                    	    	<input type="text" class="form-control" id="carreraEdit" placeholder="" name="carrera" required>
                	    	</div>
                	    	<div class="form-group">
                    	    	<label class="" for="tipo">Nivel</label>
                    	    	<input type="text" class="form-control" id="tipoEdit" placeholder="" name="tipo">	
                	    	</div>
                	    	<div class="form-group">
                    	    	<label class="" for="turno">Turno</label>
                    	    	<input type="datetime-local" class="form-control" id="turnoEdit" placeholder="" name="turno" required>
                	    	</div>
                	    	<div class="form-group">                	    	
                	    		<label class="checkbox-inline"><input type="checkbox" name="llego" value="true" id="llegoEdit">&nbsp;Llego&#9;</label>
	    						<label class="checkbox-inline"><input type="checkbox" style="margin-left: 30px;" name="paso" value="true" id="pasoEdit">&nbsp;Paso</label>
                    	    </div>
                    	    <input type="hidden" name="IdEdit" id="IdEdit"  value=""/>
                    	    <input type="hidden" name="isNew" id="isNew"  value="false"/>				
	                	    <input class="btn btn-success float-right" type="submit" value="Guardar">
	                	</form>
                	</div>                    	
                </div>
            </div>
        </div>
</body>
</html>
