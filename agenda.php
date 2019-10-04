<?php
	session_start();
?>
<html>
	<head>
		<title>Agenda</title>
		<style type="text/css">
			#formulario{
				background-color: blue;
				width: 20%;
				float:left;
			}
			#datos{
				background-color: grey;
				float: left;
				width: 80%;
			}
		</style>
	</head>
	<body>
		<div id="formulario">
			<form method="post" action="agenda.php">
				<p>Nombre</p><input type="text" name="nombre">
				<p>Correo</p><input type="email" name="correo">
				<br><br>
				<input type="submit" name="guardar" value="guardar datos">
			</form>
		</div>
		<div id="datos">
			<h3>Agenda</h3>
				<?php
					if(!isset($_SESSION["agenda"])){
						$_SESSION["agenda"]= array();
					}
					else
					{
						$agenda=$_SESSION["agenda"];
						if($_POST["guardar"]){
							$agenda[$_POST["nombre"]]=$_POST["correo"];
							foreach ($agenda as $key => $value){
								echo $agenda;
							}
						}
					}
				?>
		</div>
	</body>
</html>