<?php  
	ob_start();
	session_start();
	$timezone = date_default_timezone_set("America/Mexico_City");
	$con = mysqli_connect("localhost", "root", "", "corchea");
	if(mysqli_connect_errno()) {
		echo "Error de conexion: " . mysqli_connect_errno();
	}
?>