<?php  
include("../../config.php");
if(!isset($_POST['username'])){
	echo "Error: ";
	exit();
}
if(isset($_POST['email']) && $_POST['email']!= ""){
	$username = $_POST['username'];
	$email = $_POST['email'];
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "Email invalido";
		exit();
	}
	$emailCheck = mysqli_query($con, "SELECT email FROM usuarios WHERE email = '$email' AND username !='$username'");
	if(mysqli_num_rows($emailCheck) > 0){
		echo "Email ocupado";
		exit();
	}
	$updateQuery = mysqli_query($con,"UPDATE usuarios SET email = '$email' WHERE username = '$username'");
	echo "Se actualizo correctamente el email";
}
else{
		echo "Debes proveer un email";
	}
?>