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
$registros = $db->select('registros', '*', ['AND'=>['paso' => '0', 'llego' => '1']]);
$currents = $db->select('tablero', '*');

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
		#cleanTable tr td{
			/*line-height: 0px;
			min-height: 0px;
			height: 0px;*/
			padding: 0 !important;
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-9">
				<table class="table table-striped" id="recordsTable">
					<thead>
						<tr>
							<td>Matricula</td>
							<td>Nombre</td>
							<td>Apellido</td>
							<td>Carrera</td>
							<td>Nivel</td>
							<td>Turno</td>
							<td>Pasar</td>
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
							<td id="checkIn-' . $registro['id'] . '">
								<button href="#" class="btn btn-sm btn-info pasoBtn" onclick="pasarRegistro('. $registro['id'] . ')">Pasar</button>
							</td>
						</tr>
						';
					}

					?>
					</tbody>
				</table>
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-2">
				<table class="table table-condensed table-bordered table-striped" id="cleanTable">
					<thead>
						<tr>
							<th class="text-center">Alumno</td>
							<th class="text-center">Limpiar</td>
						</tr>
					</thead>
					<tbody id="cleanTableBody">
						<?php
						foreach($currents as $current){
							echo'
						<tr>
							<td class="text-center"style="vertical-align: middle; font-style: italic;">'. $current['nombre'] . ' ' . $current['apellido'] . '</td>
							<td class="text-center"><button href="#" class="btn btn-sm btn-link cleanBtn" onclick="limpiarTablero(\'' . $current['apellido'] . '\')">Limpiar</button></td>
						</tr>		
							';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modals -->
	<!-- Editar registro-->            
        <div class="modal fade"  id="clean-modal" tabindex="-1" role="dialog" 
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                    	<h4 class="modal-title" id="myModalLabel">
                            Tablero Limpiado
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Cerrar</span>
                        </button>                        
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body"> 
                    	<h5>La carrera seleccionada fue limpiada correctamente!</h3>
                	</div>                    	
                </div>
            </div>
        </div>
</body>
</html>
