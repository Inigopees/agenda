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
							$nombre=strtolower($_POST["nombre"]);
							$correo=strtolower($_POST["correo"]);
							if($nombre=="" && $correo==""){
								echo "inserte datos en los campos por favor.";
							}elseif(array_key_exists($nombre,$agenda)){
								if($correo==""){
									unset($agenda[$nombre]);
									foreach ($agenda as $key => $value){
										echo "Nombre: ".$key."<br>";
										echo "Correo: ".$value."<br>";
										echo "<hr>";
									}
								}
								else
								{
									$agenda[$nombre]=$correo;
									foreach ($agenda as $key => $value){
										echo "Nombre: ".$key."<br>";
										echo "Correo: ".$value."<br>";
										echo "<hr>";
									}
								}
							}
							else
							{
								$agenda[$nombre]=$correo;
								foreach ($agenda as $key => $value){
									echo "Nombre: ".$key."<br>";
									echo "Correo: ".$value."<br>";
									echo "<hr>";
								}

							}
						}
						$_SESSION["agenda"]=$agenda;
					}

					
					?>
		</div>
	</body>
</html>