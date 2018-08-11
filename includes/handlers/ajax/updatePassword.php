<?php
include("../../config.php");
if(!isset($_POST['username'])) {
	echo "ERROR: Could not set username";
	exit();
}
if(!isset($_POST['oldPassword']) || !isset($_POST['newPassword1'])  || !isset($_POST['newPassword2'])) {
	echo "Error: 2";
	exit();
}
if($_POST['oldPassword'] == "" || $_POST['newPassword1'] == ""  || $_POST['newPassword2'] == "") {
	echo "Por favor llena todos los campós";
	exit();
}
$username = $_POST['username'];
$oldPassword = $_POST['oldPassword'];
$newPassword1 = $_POST['newPassword1'];
$newPassword2 = $_POST['newPassword2'];
$oldMd5 = md5($oldPassword);
$passwordCheck = mysqli_query($con, "SELECT * FROM usuarios WHERE username='$username' AND password='$oldMd5'");
if(mysqli_num_rows($passwordCheck) != 1) {
	echo "Contraseña incorrecta";
	exit();
}
if($newPassword1 != $newPassword2) {
	echo "Tus contraseñas no coinciden";
	exit();
}
if(preg_match('/[^A-Za-z0-9]/', $newPassword1)) {
	echo "Tu nueva contraseña debe contener solo letras y numeros";
	exit();
}
if(strlen($newPassword1) > 30 || strlen($newPassword1) < 5) {
	echo "Tu contraseña debe tener entre 5 y 30 caracteres";
	exit();
}
$newMd5 = md5($newPassword1);
$query = mysqli_query($con, "UPDATE usuarios SET password='$newMd5' WHERE username='$username'");
echo "Contraseña actualizada correctamente";
?>