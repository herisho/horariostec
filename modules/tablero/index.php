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
$currents = $db->select('tablero', '*');

?>

<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/ico" href="../../img/logo.ico">
	<title>HorariosTec</title>

	<!-- CSS -->
	<!-- ----------------------------------------------------------------------------------------------------------------->
	<link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- <link href="css/index.css" rel="stylesheet"> -->
	<!-- ----------------------------------------------------------------------------------------------------------------->
	<style>
		table{
			font-size: 30px;
		}
		.carrera {
			font-style: italic;
		}
	</style>


	<!-- JS scripts -->
	<!------------------------------------------------------------------------------------------------------------------->
	<!-- jQuery -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container-fluid">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<div class="pull-left">
		  		<img src="../../img/logo_blanco.png" style="width:50px;height:50px; margin-right: 5px; margin-top: 10px;" class="" alt="Tec Logo">
	  		</div>
		  	<h2 class="pull-left"><b>HorariosTec</b></h2>
		  	<div class="clearfix"></div>
		  </div>
		  <div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title"><b>PBB</b></h3>
						</div>
						<table class="table table-striped table-condensed">
							<thead>
								<tr>
									<th class="text-center">Turno</th>
								</tr>
							</thead>
							<tbody>
							<?php

							foreach($currents as $current)
							{
								if($current['carrera'] == 'PBB'){
									echo'
								<tr>
									<td class="nombre text-center">'. $current['nombre'] .' '. $current['apellido'] . '</td>
								</tr>
									';
								}
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-warning">
						<div class="panel-heading">
							<h3 class="panel-title"><b>PTM</b></h3>
						</div>
						<table class="table table-striped table-condensed">
							<thead>
								<tr>
									<th class="text-center">Turno</th>
								</tr>
							</thead>
							<tbody>
							<?php

							foreach($currents as $current)
							{
								if($current['carrera'] == 'PTM'){
									echo'
								<tr>
									<td class="nombre text-center">'. $current['nombre'] .' '. $current['apellido'] . '</td>
								</tr>
									';
								}
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
