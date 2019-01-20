<?php
	//establecemos conexion con el servidor postgresSQL
	$dbconn=pg_connect("host=localhost port=5432 dbname=bd_2018 user=carlos1 password=chispa2089 options='--client_encoding=UTF8'") or die("Error al conectar: ".pg_last_error());

	//Revisamos el estado de la conexion en caso de errores
	/*if(!$dbconn){
		echo "Error al conectar";
	}else{
		echo "Conexión establecida";
	}*/
?>
