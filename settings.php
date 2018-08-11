<?php  
include("includes/includedFiles.php");
?>
<div class="entityInfo">
	<div class="centerSection">
		<div class="userInfo">
			<h1><?php echo $userLoggedIn->getFirstAndLastName(); ?></h1>
		</div>
		<div class="buttonItems">
			<button class="button morado" onclick="openPage('updateDetails.php')">Detalles del usuario</button>
			<button class="button morado" onclick="logout()">Cerrar Sesion</button>
		</div>
	</div>
</div>