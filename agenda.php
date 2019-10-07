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
					$nombre=strtolower($_POST["nombre"]);
					$correo=strtolower($_POST["correo"]);

					if(!isset($_SESSION["agenda"])){
						$_SESSION["agenda"]= array();
					}
					else
					{
						$agenda=$_SESSION["agenda"];
						if($_POST["guardar"]){
							$agenda[$nombre]=$correo;
							//$agenda[limpiar_String($nombre)]=limpiar_String($correo);
							foreach ($agenda as $key => $value){
								echo "Nombre: ".$key."<br>";
								echo "Correo: ".$value."<br>";
								echo "<hr>";
							}
						}
						$_SESSION["agenda"]=$agenda;
					}

					function limpiar_String($string){
 
    					$string = trim($string);
 
    					$string = str_replace(
        					array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        					array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        					$string
        				);
 						
					    $string = str_replace(
					        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
					        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
					     	$string
					    );
					 
					    $string = str_replace(
					        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
					        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
					        $string
					    );
 
					    $string = str_replace(
					        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
					        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
					        $string
					    );
 
					    $string = str_replace(
					        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
					        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
					        $string
					    ); 
    					$string = str_replace(
					        array("\", "¨", "º", "-", "~",
					             "#", "@", "|", "!", """,
					             "·", "$", "%", "&", "/",
					             "(", ")", "?", "'", "¡",
					             "¿", "[", "^", "<code>", "]",
					             "+", "}", "{", "¨", "´",
					             ">", "< ", ";", ",", ":",
					             ".", " "),
					        '',
					        $string
    					);
 						
 						return $string;
 					}
					?>
		</div>
	</body>
</html>